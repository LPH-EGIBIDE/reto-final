
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

export default {formToFetch};
