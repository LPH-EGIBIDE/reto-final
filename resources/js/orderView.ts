import utils from "./utils";
// @ts-ignore
import * as mdb from "mdb-ui-kit";
import alerts from "./alerts";


function displayModal(){
    let modal = new mdb.Modal(document.getElementById('order-modal') as HTMLElement);
    modal.show();
}

function productTemplate(product:any){
    return `<div class="d-flex justify-content-between">
                <p class="fw-bold mb-0"><small class="fw-light">(${product.quantity}x)</small> ${product.name}</p>
                <p class="text-muted mb-0">€<span class="order-modal-product-price">${product.total}</span></p>
            </div>`
}

function init(){
    let products = document.querySelectorAll('.order-info-btn');
    products.forEach((product) => {
        product.addEventListener('click', (e:Event) => {
            let id = product.getAttribute('data-order-id');
            if (id) {
                //alerts.showInfoAlert("Cargando", "Cargando información del pedido");
                getOrderInfo(parseInt(id));
            }
        });
    });
}

function getOrderInfo(id:number):any{
    alerts.showInfoAlert("Cargando", "Cargando información del pedido con id: "+id);
    let form = document.getElementById('order-controls') as HTMLFormElement;
    if (form) {
        let orderId = document.getElementById('order-id') as HTMLInputElement;
        orderId.value = id.toString();
        utils.formToFetch(form, (data: any) => {
            if (data.success) {
                loadModalItems(data);
                displayModal();
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

function loadModalItems(order:any):void{
    let modal = document.getElementById('order-modal') as HTMLElement;
    let modalProducts = modal.querySelector('.order-modal-products') as HTMLElement;
    let modalDiscount = modal.querySelector('.order-modal-discount') as HTMLElement;
    let modalTotal = modal.querySelector('.order-modal-total') as HTMLElement;
    let modalDate = modal.querySelector('.order-modal-date') as HTMLElement;
    let modalSubtotal = modal.querySelector('.order-modal-subtotal') as HTMLElement;
    modalProducts.innerHTML = '';
    order.products.forEach((product:any) => {
        modalProducts.insertAdjacentHTML('beforeend', productTemplate(product));
    });
    modalSubtotal.innerHTML = order.subtotal;
    modalDiscount.innerHTML = String(order.subtotal - order.total);
    modalTotal.innerHTML = order.total;
    modalDate.innerHTML = order.date;
}

export default {init};
