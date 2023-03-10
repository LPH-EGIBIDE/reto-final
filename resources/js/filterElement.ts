//Gets a form called filterForm and a table called itemTable and makes a query to the action endpoint with the form data
//and then replaces the table with the new data.
//TypeScript
let paginationActive = true;
function filterElement(filterForm: HTMLFormElement, itemTable: HTMLTableSectionElement) {
    let formData = new FormData(filterForm);
    let url = filterForm.action;
    let xhr = new XMLHttpRequest();
    let pageInput: HTMLLinkElement;
    let pageHidden: HTMLInputElement;
    if (paginationActive) {
        pageInput = document.getElementById('page') as HTMLLinkElement;
        pageHidden = document.getElementById('pageForm') as HTMLInputElement;
    }
    const queryString = new URLSearchParams((<string[][] | Record<string, string> | string | URLSearchParams>formData));
    url += '?' + queryString.toString();
    xhr.open('GET', url, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(xhr.responseText);
            if (paginationActive) {
                pageInput.innerText = data.page.toString();
                pageHidden.value = pageInput.innerText;
            }
            if (data.page <= Math.ceil(data.total / data.per_page)) {
                if (data.data.length > 0) {
                    itemTable.innerHTML = generateTableRows(data.data);
                    document.getElementById('noItems')?.classList.add('d-none');
                } else if (data.page == 0) {
                    itemTable.innerHTML = "";
                    document.getElementById('noItems')?.classList.remove('d-none');
                }
            }

        }
    };
    xhr.send(formData);
}

function generateTableRows(items: any[]): string{
    let tableRows = '';
    let totalItems = paginationActive ? items.length : 4;
    for (let i = 0; i < totalItems; i++) {
        let item = items[i];
        let row = document.createElement('tr');
        row.classList.add('align-middle');

        for (let n = 0; n < Object.keys(item).length ; n++) {
            let key = Object.keys(item)[n];
            if (n === 0) {
                let cell = document.createElement('th');
                cell.innerText = item[key];
                row.appendChild(cell);
                continue;
            }
            if (n == Object.keys(item).length - 1) {
                //View button cell
                //Try to get a template button and clone it, if not create a new one
                let template = document.getElementById('actionButtonTemplate') as HTMLTemplateElement;
                let cell = document.createElement('td');
                if (template) {
                    let div = document.createElement('div');
                    let button = template.content.cloneNode(true) as Node;
                    div.appendChild(button);
                    let link = div.querySelector('a') as HTMLAnchorElement;
                    link.href = item[key];
                    cell.appendChild(div);
                    row.appendChild(cell);
                } else {
                    let button = document.createElement('a');
                    button.classList.add('btn', 'btn-primary');
                    button.innerHTML = '<i class="fa-solid fa-eye pe-2"></i>Ver';
                    button.href = item[key];
                    cell.appendChild(button);
                    row.appendChild(cell);
                }
                continue;
            }
            let cell = document.createElement('td');
            cell.innerText = item[key];
            row.appendChild(cell);
        }
        tableRows += row.outerHTML;
    }
    return tableRows;
}

function initFilterElement() {
    let filterForm = document.getElementById('filterForm') as HTMLFormElement;
    let itemTable = document.getElementById('itemTable') as HTMLTableSectionElement;

    try{
        let nextButton = document.getElementById('nextPage') as HTMLLinkElement;
        let previousButton = document.getElementById('previousPage') as HTMLLinkElement;
        nextButton.addEventListener('click', nextPage);
        previousButton.addEventListener('click', previousPage);
    } catch (e) {
        console.log("No pagination buttons found");
        paginationActive = false;
    }

    //On form element change keyup or change
    filterForm.addEventListener('change', function () {
        onFilterChange(filterForm, itemTable);
    });
    filterForm.addEventListener('keyup', function () {
        onFilterChange(filterForm, itemTable);
    });
    filterForm.addEventListener('submit', function (e) {
        e.preventDefault();
        onFilterChange(filterForm, itemTable);
    });
    filterElement(filterForm, itemTable);
}

function onFilterChange(filterForm: HTMLFormElement, itemTable: HTMLTableSectionElement) {
    let pageHidden = document.getElementById('pageForm') as HTMLInputElement;
    pageHidden.value = '1';
    filterElement(filterForm, itemTable);
}

function onPageChange() {
    let filterForm = document.getElementById('filterForm') as HTMLFormElement;
    let itemTable = document.getElementById('itemTable') as HTMLTableSectionElement;
    filterElement(filterForm, itemTable);
}

function nextPage() {
    let pageHidden = document.getElementById('pageForm') as HTMLInputElement;
    pageHidden.value = parseInt(pageHidden.value) >= 1 ? (parseInt(pageHidden.value) + 1).toString() : '1';
    onPageChange();
}

function previousPage() {
    let pageHidden = document.getElementById('pageForm') as HTMLInputElement;
    pageHidden.value = parseInt(pageHidden.value) > 1 ? (parseInt(pageHidden.value) - 1).toString() : '1';
    onPageChange();
}

window.addEventListener('load', initFilterElement);
