import * as mdb from 'mdb-ui-kit';

function generateAlert(color: string, title: string, message: string, id: string){
    return `<div class="toast fade mx-auto" id="${id}" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="true" data-mdb-delay="2000" data-mdb-position="top-right" data-mdb-append-to-body="true" data-mdb-stacking="true" data-mdb-width="350px" data-mdb-color="${color}">
              <div class="toast-header">
                <strong class="me-auto">${title}</strong>
                <button type="button" class="btn-close" data-mdb-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">${message}</div>
            </div>`;
}

function showSuccessAlert(title: string, message: string){
    const id = "alert-"+Math.random().toString(36).substring(7);
    const alert = generateAlert('success', title, message, id);
    document.body.insertAdjacentHTML('beforeend', alert);
    const element = document.getElementById(id);
    const toast = new mdb.Toast(element);
    toast.show();
}

function showErrorAlert(title: string, message: string){
    const id = "alert-"+Math.random().toString(36).substring(7);
    const alert = generateAlert('danger', title, message , id);
    document.body.insertAdjacentHTML('beforeend', alert);
    const element = document.getElementById(id);
    const toast = new mdb.Toast(element);
    toast.show();
}

function showInfoAlert(title: string, message: string){
    const id = "alert-"+Math.random().toString(36).substring(7);
    const alert = generateAlert('info', title, message , id);
    document.body.insertAdjacentHTML('beforeend', alert);
    const element = document.getElementById(id);
    const toast = new mdb.Toast(element);
    toast.show();
}

function showWarningAlert(title: string, message: string){
    const id = "alert-"+Math.random().toString(36).substring(7);
    const alert = generateAlert('warning', title, message , id);
    document.body.insertAdjacentHTML('beforeend', alert);
    const element = document.getElementById(id);
    const toast = new mdb.Toast(element);
    toast.show();
}

function showPrimaryAlert(title: string, message: string){
    const id = "alert-"+Math.random().toString(36).substring(7);
    const alert = generateAlert('primary', title, message , id);
    document.body.insertAdjacentHTML('beforeend', alert);
    const element = document.getElementById(id);
    const toast = new mdb.Toast(element);
    toast.show();
}

function testAlerts(){
    showPrimaryAlert('Primary', 'This is a primary alert');
    showSuccessAlert('Success', 'This is a success alert');
    showErrorAlert('Error', 'This is a error alert');
    showInfoAlert('Info', 'This is a info alert');
    showWarningAlert('Warning', 'This is a warning alert');
}

export default {showSuccessAlert, showErrorAlert, showInfoAlert, showWarningAlert, showPrimaryAlert, testAlerts};