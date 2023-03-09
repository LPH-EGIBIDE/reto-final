import alerts from "./alerts";
function formGrabber() {
    //Get forms with class cart-product-form and add event listener
    let forms = document.querySelectorAll('.cart-product-form');
    forms.forEach(form => {
        if (form instanceof HTMLFormElement) {
            form.addEventListener('submit', (event) => {
                event.preventDefault();
                formToFetch(form, (data: any) => {
                    if (data.success) {
                        alerts.showSuccessAlert("Exito", data.success);
                        setNavbarCartCount(data.cart.productCount)
                    } else if (data.errors) {
                        for (const key in data.errors) {
                            alerts.showErrorAlert("Error", data.errors[key]);
                        }
                    } else {
                        alerts.showErrorAlert("Error", "Ha ocurrido un error inesperado");
                    }
                }, (error:string) => {
                    console.error(error)
                });
            });
        }
    });

}

function setNavbarCartCount(count: number) {
    let navbarCartCount = document.getElementById('navbar-cart-count');
    if (navbarCartCount) {
        navbarCartCount.innerHTML = count.toString();
    }
}

function formToFetch(form: HTMLFormElement, callback: Function, errorCallback: Function) {
    //Get form action
    const action = form.getAttribute('action') || '';
    //Get form method
    const method = form.getAttribute('method') || 'POST';
    //Get form data
    const data = new FormData(form);
    //Send data to fetch
    fetch(action, {
        method: method,
        body: data,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        callback(data);
    }).catch(error => {
        errorCallback(error);
    })
}

function fetchCart() {
    fetch('/carrito/api', {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        setNavbarCartCount(data.cart.productCount)
        fillCart(data);
    }).catch(error => {
        console.error(error);
    })
}

function fillCart(data: any) {
    let cart = document.getElementById('cart') as HTMLDivElement;
    let cartList = document.getElementById('cart-list') as HTMLDivElement;
    if (cart && cartList) {
        cart.innerHTML = '';
        cartList.innerHTML = '';
        data.cart.products.forEach((product: any) => {
            let cartItemHtml = cartItem(product.product, product.quantity, product.total);
            cart.innerHTML += cartItemHtml;
            let cartListItemHtml = cartListItem(product.product, product.total);
            cartList.innerHTML += cartListItemHtml;
        });
        if (data.cart.discounts != null){
            document.getElementById('cart-discount')!.innerHTML = String("-"+Math.round((data.cart.discounts.pre_discount - data.cart.discounts.total) * 100) / 100);
            hideDiscountInput(data.cart.discounts.discount);
        }
        document.getElementById('cart-total')!.innerHTML = String(Math.round(data.cart.total * 100) / 100);
        productControls();
    }
}

function productControls() {
    let decrement = document.querySelectorAll('.product-decrement');
    decrement.forEach(decrement => {
        if (decrement instanceof HTMLButtonElement) {
            decrement.addEventListener('click', (event) => {
                event.preventDefault();
                let productId : number= parseInt(decrement.getAttribute('data-product-id') || "0");
                productEdit(productId, "pop");
            });
        }
    });
    let increment = document.querySelectorAll('.product-increment');
    increment.forEach(increment => {
        if (increment instanceof HTMLButtonElement) {
            increment.addEventListener('click', (event) => {
                event.preventDefault();
                let productId : number= parseInt(increment.getAttribute('data-product-id') || "0");
                productEdit(productId, "push");
            });
        }
    });
    let remove = document.querySelectorAll('.product-remove');
    remove.forEach(remove => {
        if (remove instanceof HTMLButtonElement) {
            remove.addEventListener('click', (event) => {
                event.preventDefault();
                let productId : number= parseInt(remove.getAttribute('data-product-id') || "0");
                productEdit(productId, "destroy");
            });
        }
    });
}

function productEdit(productId: number, method:string) {
    let form = document.getElementById('product-controls') as HTMLFormElement;
    if (form) {
        let productIdInput = form.querySelector('input[name="product_id"]')! as HTMLInputElement;
        productIdInput.value = productId.toString();
        let methodInput = form.querySelector('input[name="method"]')! as HTMLInputElement;
        methodInput.value = method;
        formToFetch(form, (data: any) => {
            if (data.success) {
                alerts.showSuccessAlert("Exito", data.success);
                fetchCart();
            } else if (data.errors) {
                for (const key in data.errors) {
                    alerts.showErrorAlert("Error", data.errors[key]);
                }
            } else {
                alerts.showErrorAlert("Error", "Ha ocurrido un error inesperado");
            }
        }, (error:string) => {
            console.error(error)
        });
    }



}

function hideDiscountInput(discount: any) {
    let discountInput = document.getElementById('discount-input') as HTMLFormElement;
    if (discountInput) {
        discountInput.classList.add('d-none');
    }
    let discountApplied = document.getElementById('discount-input-applied') as HTMLFormElement;
    if (discountApplied) {
        let appliedInput = discountApplied.querySelector('input[name="discount_code"]')! as HTMLInputElement;
        appliedInput.value = discount.code;
        discountApplied.classList.remove('d-none');
    }
}

function cartListItem(product: any,total: number){
    return `<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                  ${product.name}
                  <span>${total}€</span>
                </li>`;
}


function cartItem(product: any, quantity: number, total: number){
    return `<div class="row">
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                  <!-- Image -->
                  <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                    <img src="${product.image}" class="w-100 h-100" alt="${product.name}" />
                    <a href="#!">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                    </a>
                  </div>
                  <!-- Image -->
                </div>

                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                  <!-- Data -->
                  <p><strong>${product.name}</strong></p>
                  <p>Descripción: ${product.description}</p>
                  <button type="button" class="btn btn-primary btn-sm me-1 mb-2 product-remove" data-product-id="${product.id}"data-mdb-toggle="tooltip" title="Eliminar producto">
                    <i class="fas fa-trash"></i>
                  </button>
                  <!-- Data -->
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                  <!-- Quantity -->
                  <div class="d-flex mb-4" style="max-width: 300px">
                    <button class="btn btn-primary px-3 me-2 product-decrement" data-product-id="${product.id}">
                      <i class="fas fa-minus"></i>
                    </button>

                    <div class="form-outline">
                      <input id="form1" name="quantity" value="${quantity}" type="text" readonly  class="form-control" />
                    </div>

                    <button class="btn btn-primary px-3 ms-2 product-increment" data-product-id="${product.id}">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <!-- Quantity -->

                  <!-- Price -->
                  <p class="text-start text-md-center">
                    <strong>€${total}</strong>
                  </p>
                  <!-- Price -->
                </div>
              </div>
        <hr class="my-4" />`;
}

function init() {
    fetchCart();
    formGrabber();

}

export default {
    init
}
