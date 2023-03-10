// @ts-ignore
import { Chart } from 'mdb-ui-kit';
class PedidosSemanales extends HTMLElement {
    #data = {
        type: 'bar',
        data: {
            labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
            datasets: [
                {
                    label: 'Pedidos',
                    data: [2112, 2343, 2545, 3423, 2365, 1985, 987],
                },
            ],
        },
    };

    constructor() {
        super();

        // Create a shadow root
        const shadow = this.attachShadow({ mode: 'open' });

        // Create a canvas element
        const canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'chart');

        // Append the canvas to the shadow root
        shadow.appendChild(canvas);
    }

    connectedCallback() {
       this.loadData()

    }
    loadData(){
        // Load data from an API
        fetch('/admin/pedidos/estadisticas').then((response) => {
            response.json().then((data) => {
                this.#data.data.datasets[0].data = data.data;
                new Chart(this.shadowRoot?.getElementById('chart'), this.#data);
            });
        }).catch((error) => {
            console.error(error);
        });
    }
}


export default PedidosSemanales;