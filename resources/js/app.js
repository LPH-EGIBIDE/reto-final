import cart from "./cart";
import orderView from "./orderView";
import PedidosSemanales from "./pedidosSemanales";
import.meta.glob([ '../images/**', ]);


customElements.define('pedidos-chart', PedidosSemanales);
window.addEventListener('load', function () {
    cart.init();
    orderView.init();
});
