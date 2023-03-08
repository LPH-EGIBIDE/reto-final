<?php

namespace App\Http\Controllers;

use App\Models\DiscountCode;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        return view('cart.show');
    }

    private function getCart()
    {
        if (empty(auth()->user()->shopping_cart)) {
            $this->setCart(['products'=>[], 'discounts' => []]);
        }

        return json_decode(auth()->user()->shopping_cart, true);
    }

    private function setCart(array $cart)
    {
        auth()->user()->shopping_cart = json_encode($cart);
        auth()->user()->save();
    }

    public function push(int $productId, int $quantity = 1)
    {
        $cart = $this->getCart();
        if (empty($cart['products'][$productId]))
            $cart['products'][$productId] = 0;
        $cart['products'][$productId] = $cart['products'][$productId] + $quantity;
        $this->setCart($cart);


    }

    public function pop(int $productId)
    {
        $cart = $this->getCart();
        if (!empty($cart['products'][$productId])) {
            $newQuantity = $cart['products'][$productId] - 1;
            if ($newQuantity <= 0) {
                unset($cart['products'][$productId]);
            } else {
                $cart['products'][$productId] = $newQuantity;
            }
        }
        $this->setCart($cart);


        return response()->json([
            'cart' => $cart
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'method' => 'required|in:push,pop',
            'product_id' => 'required|integer',
            'quantity' => 'integer|min:0|max:99|nullable|required_if:method,push'
        ]);

        $method = $request->input('method');
        $productId = $request->input('product_id');

        if (!Product::find($productId)) {
            return response()->json([
                'error' => 'Producto no encontrado'
            ]);
        }

        switch ($method) {
            case 'push':
                $this->push($productId, $request->input('quantity'));
                return $this->api(true, 'Producto agregado al carrito');
            case 'pop':
                $this->pop($productId);
                return $this->api(true, 'Producto eliminado del carrito');
        }
        return response()->json([
            'error' => 'Error al actualizar el carrito'
        ]);
    }

    public function addDiscount(Request $request)
    {
        $request->validate([
            'discount_code' => 'required|exists:discount_codes,code'
        ]);
        $cart = $this->getCart();
        $cart['discounts'][] = $request->input('discount_code');
        $this->setCart($cart);
        return redirect()->route('cart.show');
    }

    public function removeDiscount(Request $request)
    {
        $request->validate([
            'discount_code' => 'required|exists:discount_codes,code'
        ]);
        $cart = $this->getCart();
        $cart['discounts'] = array_diff($cart['discounts'], [$request->input('discount_code')]);
        $this->setCart($cart);
        return redirect()->route('cart.show');
    }

    public function destroy()
    {
        $this->setCart(['products' => [], 'discounts' => []]);
        return redirect()->route('cart.show');
    }

    public function checkout()
    {
        $cart = $this->getCart();
        $products = Product::whereIn('id', array_keys($cart['products']))->get();
        $cartArray = [];
        $discountArray = [];
        foreach ($products as $product) {
            $cartArray[] = ['product' => $product, 'quantity' => $cart[$product->id]];
        }
        foreach ($cart['discounts'] as $discount) {
            $discount = DiscountCode::where('code', $discount)->select('id', 'code', 'discount')->first();
            if ($discount) {
                $discountArray[] = ['discount' => $discount];
            }
        }
        $cartArray = ['products' => $cartArray, 'discounts' => $discountArray];
        return view('cart.checkout', compact('cartArray'));
    }


    public function api($success = true, $message = "")
    {
        $cart = $this->getCart();
        $products = Product::whereIn('id', array_keys($cart['products']))->where('is_active', '=', '1')
            ->select('id', 'name', 'price', 'image')->get();

        //Map products image to attachment route

        $products->map(function($product ){
            $product->image = route('attachment.show', $product->image, false);
        });

        $cartArray = ['products' => [], 'discounts' => []];
        foreach ($products as $product) {
            $cartArray['products'][] = ['product' => $product, 'quantity' => $cart['products'][$product->id], 'total' => $product->price * $cart['products'][$product->id]];
        }

        $cartArray['total'] = 0;
        foreach ($cartArray['products'] as $product) {
            $cartArray['total'] += $product['total'];
        }
        $cart['discounts'] = $cart['discounts'] ?? [];
        foreach ($cart['discounts'] as $discount) {
            $discount = DiscountCode::where('code', $discount)->select('id', 'code', 'discount')->first();
            if ($discount) {
                $preDiscount = $cartArray['total'];
                switch ($discount->value_type) {
                    case 'percent':
                        $cartArray['total'] = $cartArray['total'] - ($cartArray['total'] * $discount->value / 100);
                        break;
                    case 'amount':
                        $cartArray['total'] = $cartArray['total'] - $discount->value;
                        break;
                }
                $cartArray['discounts'][] = ['discount' => $discount, 'reduction' => $preDiscount - $cartArray['total']];
            }
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




}
