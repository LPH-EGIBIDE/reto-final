function orderProducts(products: HTMLElement[], order: string) {
    switch (order) {
        case 'asc':
            products.sort((a, b) => {
                const aPrice: string = a.getAttribute('data-product-price') as string;
                const bPrice: string = b.getAttribute('data-product-price') as string;
                if (!aPrice || !bPrice) {
                    return 0;
                }
                return parseFloat(aPrice) - parseFloat(bPrice);
            });
            break;
        case 'desc':
            products.sort((a, b) => {
                const aPrice: string = a.getAttribute('data-product-price') as string;
                const bPrice: string = b.getAttribute('data-product-price') as string;
                if (!aPrice || !bPrice) {
                    return 0;
                }
                return parseFloat(bPrice) - parseFloat(aPrice);
            });
            break;
        default:
            break;
    }
    return products;
}

function getProducts(): HTMLElement[] {
    return Array.from(document.querySelectorAll('.product-order-by'));
}

function init() {
    let orderBySelect: HTMLElement[];
    orderBySelect = document.querySelectorAll('input[name="menorMayor"]') as unknown as HTMLElement[];
    if (orderBySelect.length > 0) {
        orderBySelect.forEach((element) => {
            console.log("Adding event listener to element: " + element);
            element.addEventListener('change', (event: Event) => {

                const target = event.target as HTMLInputElement;
                console.log("Event triggered "  + target.value);
                const products = getProducts();
                const orderedProducts = orderProducts(products, target.value);
                const productContainer = document.querySelector('#product-container') as HTMLElement;
                if (productContainer && orderedProducts.length > 0) {
                    productContainer.innerHTML = '';
                    orderedProducts.forEach((product) => {
                        productContainer.appendChild(product);
                    });
                }
            });
        });
    }
    console.log('Filtrator is ready!');
}

window.addEventListener('load', init);