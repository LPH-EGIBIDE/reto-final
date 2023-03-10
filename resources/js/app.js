import cart from "./cart";
import orderView from "./orderView";
import PedidosSemanales from "./pedidosSemanales";

// Inicializa o componente
customElements.define('doughnut-chart', PedidosSemanales);
window.addEventListener('load', function () {
    cart.init();
    orderView.init();
});
