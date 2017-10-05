
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('product-table', require('./components/ProductTable.vue'));
Vue.component('product-row', require('./components/ProductRow.vue'));

Vue.component('item-table', require('./components/ItemTable.vue'));
Vue.component('item-row', require('./components/ItemRow.vue'));

Vue.component('row-woc', require('./components/lte/SingleElementRow.vue'));
Vue.component('solid-box', require('./components/lte/SolidBox.vue'));

Vue.component('data-table', require('./components/lte/DataTable.vue'));
Vue.component('data-table-com', require('./components/lte/SmallDataTable.vue'));

Vue.component('accordion-item', require('./components/lte/AccordionBoxItem.vue'));


const app = new Vue({
    el: '#app',
    data: {
        entries: 1,
        type: 'produccion',
        products: [],
        product_id: 1,
        client_id: null,
        quantity: 0,
        selected: '',
        selectedDesign: '',
        checked: [],
        hclient: "",
    },
    methods: {
        disable(option) {
            return option == 'existente';
        }
    },
    created() {
        axios.get('/products').then(response => {
            this.products = response.data;
        });
    }

});
