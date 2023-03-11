<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\DiscountCode;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function show()
    {
        return view('cart.show');
    }

    public function update(Request $request)
    {
        $request->validate([
            'method' => 'required|in:push,pop,destroy',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'integer|min:1|max:99|nullable|required_if:method,push'
        ]);

        $method = $request->input('method');
        $productId = $request->input('product_id');

        if (!Product::find($productId)) {
            return response()->json([
                'error' => 'Producto no encontrado'
            ]);
        }
        try {
            switch ($method) {
                case 'push':
                    $this->push($productId, $request->input('quantity'));
                    return $this->api(true, 'Producto agregado al carrito');
                case 'pop':
                    $this->pop($productId);
                    return $this->api(true, 'Unidad eliminada del carrito');
                case 'destroy':
                    $this->destroyItem($productId);
                    return $this->api(true, 'Producto eliminado del carrito');
            }
        } catch (Exception $e) {
            return response()->json([
                'errors' => ["error" => $e->getMessage()]
            ]);
        }

        return response()->json([
            'error' => 'Error al actualizar el carrito'
        ]);
    }

    /**
     * @throws Exception
     */
    public function push(int $productId, int $quantity = 1)
    {
        $cart = $this->getCart();
        $product = Product::find($productId);
        if ($product->stock < $quantity) {
            throw new Exception('No hay suficiente stock para agregar el producto al carrito');
        }

        if (empty($cart['products'][$productId]))
            $cart['products'][$productId] = 0;

        if ($product->stock < $cart['products'][$productId] + $quantity) {
            throw new Exception('No hay suficiente stock para agregar el producto al carrito');
        }
        $cart['products'][$productId] = $cart['products'][$productId] + $quantity;
        $this->setCart($cart);


    }

    private function getCart()
    {
        if (empty(auth()->user()->shopping_cart)) {
            $this->setCart(['products' => [], 'discounts' => []]);
        }

        return json_decode(auth()->user()->shopping_cart, true);
    }

    private function setCart(array $cart)
    {
        auth()->user()->shopping_cart = json_encode($cart);
        auth()->user()->save();
    }

    public function api($success = false, $message = "")
    {
        $cart = $this->getCart();
        if (empty($cart['products'])) {
            $this->setCart(['products' => [], 'discounts' => null]);
            $cart = $this->getCart();
        }
        $products = Product::whereIn('id', array_keys($cart['products']))->where('is_active', '=', '1')
            ->select('id', 'name', 'description', 'price', 'image')->get();

        //Map products image to attachment route

        $products->map(function ($product) {
            $product->image = route('attachment.show', $product->image, false);
        });

        $cartArray = ['products' => [], 'discounts' => null];
        foreach ($products as $product) {
            $cartArray['products'][] = ['product' => $product, 'quantity' => $cart['products'][$product->id], 'total' => $product->price * $cart['products'][$product->id]];
        }

        $cartArray['total'] = 0;
        foreach ($cartArray['products'] as $product) {
            $cartArray['total'] += $product['total'];
        }

        if (!empty($cart['discounts'])) {
            $discount = DiscountCode::where('code', "=", $cart['discounts'])->where('is_active', "=", "1")->select('id', 'code', 'value', 'value_type')->first();
            if ($discount) {
                $preDiscount = $cartArray['total'];
                switch ($discount->value_type) {
                    case 'percent':
                        $cartArray['total'] = round($cartArray['total'] - ($cartArray['total'] * $discount->value / 100), 2);
                        break;
                    case 'amount':
                        $cartArray['total'] = $cartArray['total'] - $discount->value;
                        break;
                }
                if ($cartArray['total'] < 0) {
                    $cartArray['total'] = 0;
                }
                $cartArray['discounts'] = ['discount' => $discount, 'pre_discount' => $preDiscount, 'total' => $cartArray['total']];
            }
        }

        $cartArray['productCount'] = 0;
        foreach ($cart['products'] as $product) {
            $cartArray['productCount'] += $product;
        }

        if ($success) {
            return response()->json([
                'success' => $message,
                'cart' => $cartArray
            ], 200, [], JSON_NUMERIC_CHECK);
        }

        return response()->json([
            'cart' => $cartArray
        ], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * @throws Exception
     */
    public function pop(int $productId)
    {
        $cart = $this->getCart();
        $product = Product::find($productId);
        if ($product->stock < 1) {
            unset($cart['products'][$productId]);
            throw new Exception('Se ha eliminado el producto del carrito porque no hay suficiente stock');
        }
        if (empty($cart['products'][$productId])) {
            throw new Exception('No se ha encontrado el producto en el carrito');
        }

        if ($product->stock < $cart['products'][$productId] - 1) {
            $cart['products'][$productId] = $product->stock;
            $this->setCart($cart);
            throw new Exception('Se ha puesto el producto en el carrito a la cantidad máxima disponible');
        }

        $newQuantity = $cart['products'][$productId] - 1;
        if ($newQuantity <= 0) {
            unset($cart['products'][$productId]);
        } else {
            $cart['products'][$productId] = $newQuantity;
        }
        $this->setCart($cart);


        return response()->json([
            'cart' => $cart
        ]);
    }

    public function destroyItem(int $productId)
    {
        $cart = $this->getCart();
        if (!empty($cart['products'][$productId])) {
            unset($cart['products'][$productId]);
        }
        $this->setCart($cart);


        return response()->json([
            'cart' => $cart
        ]);
    }

    public function addDiscount(Request $request)
    {
        $request->validate([
            'discount_code' => 'required|exists:discount_codes,code'
        ], [
            'discount_code.exists' => 'El código de descuento no existe'
        ]);
        $cart = $this->getCart();
        $discount = DiscountCode::where('code', "=", $request->input('discount_code'))->first();
        if ($discount->is_active == 0) {
            return redirect()->route('cart.show')->withErrors(['El código de descuento no está activo']);
        }
        if ($discount->uses_left <= 0) {
            return redirect()->route('cart.show')->withErrors(['El código de descuento ya no tiene usos disponibles']);
        }
        $cart['discounts'] = $request->input('discount_code');
        $this->setCart($cart);
        session()->flash('message', 'Código de descuento agregado');
        return redirect()->route('cart.show');
    }

    public function removeDiscount(Request $request)
    {
        $cart = $this->getCart();
        $cart['discounts'] = null;
        $this->setCart($cart);
        return redirect()->route('cart.show');
    }

    public function destroy()
    {
        $this->setCart(['products' => [], 'discounts' => null]);
        return redirect()->route('cart.show');
    }

    public function checkout(Request $request)
    {
        if (empty($this->getCart()['products'])) {
            return redirect()->route('cart.show')->withErrors(['No hay productos en el carrito']);
        }

        $request->validate([
            //Date format validation and date must be after or equal to today format "31/12/2023"
            'date' => 'required|date_format:d/m/Y|after_or_equal:today',

        ]);


        $cart = $this->getCart();
        if (empty($cart['products'])) {
            $this->setCart(['products' => [], 'discounts' => null]);
            $cart = $this->getCart();
        }
        $products = Product::whereIn('id', array_keys($cart['products']))->where('is_active', '=', '1')
            ->select('id', 'name', 'description', 'price', 'stock')->get();

        $cartArray = ['products' => [], 'discounts' => null];
        foreach ($products as $product) {
            if ($product->stock < $cart['products'][$product->id]) {
                $cart['products'][$product->id] = $product->stock;
                $this->setCart($cart);
                return redirect()->route('cart.show')->withErrors(['No hay suficiente stock del producto ' . $product->name]);
            }
            $cartArray['products'][] = ['product' => $product, 'quantity' => $cart['products'][$product->id], 'total' => $product->price * $cart['products'][$product->id]];
        }

        $cartArray['total'] = 0;
        foreach ($cartArray['products'] as $product) {
            $cartArray['total'] += $product['total'];
        }

        if (!empty($cart['discounts'])) {
            $discount = DiscountCode::where('code', "=", $cart['discounts'])->where('is_active', "=", "1")->select('id', 'code', 'value', 'value_type', 'uses_left')->first();
            if ($discount) {
                if ($discount->uses_left <= 0) {
                    $cart['discounts'] = null;
                    $this->setCart($cart);
                    return redirect()->route('cart.show')->withErrors(['El código de descuento ya no tiene usos disponibles']);
                }
                $preDiscount = $cartArray['total'];
                switch ($discount->value_type) {
                    case 'percent':
                        $cartArray['total'] = round($cartArray['total'] - ($cartArray['total'] * $discount->value / 100), 2);
                        break;
                    case 'amount':
                        $cartArray['total'] = $cartArray['total'] - $discount->value;
                        break;
                }
                if ($cartArray['total'] < 0) {
                    $cartArray['total'] = 0;
                }
                $cartArray['discounts'] = ['discount' => $discount, 'pre_discount' => $preDiscount, 'total' => $cartArray['total']];
            }
        }

        $order = new Order();
        $order->user_id = auth()->user()->id;
        if (!empty($cart['discounts'])) {
            $discount->uses_left = $discount->uses_left - 1;
            $discount->save();
            $order->discount_code_id = $cartArray['discounts']['discount']->id;
            $order->subtotal = $cartArray['discounts']['pre_discount'];
        } else {
            $order->subtotal = $cartArray['total'];
        }
        $order->date = Carbon::createFromFormat('d/m/Y', $request->input('date'))->format('Y-m-d');
        $order->total = $cartArray['total'];
        $order->status = 'received';
        $order->save();


        foreach ($cartArray['products'] as $product) {
            $orderDetail = new OrderDetails();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $product['product']->id;
            $orderDetail->quantity = $product['quantity'];
            $orderDetail->price = $product['product']->price;
            $orderDetail->save();
            $product['product']->stock = $product['product']->stock - $product['quantity'];
            $product['product']->save();
        }
        session()->flash('message', 'Pedido realizado con éxito');
        Mail::to(auth()->user()->email)->send(new OrderMail($order));
        $this->setCart(['products' => [], 'discounts' => null]);
        return redirect()->route('order.index');
    }


}
