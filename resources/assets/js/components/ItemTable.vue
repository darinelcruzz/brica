<template lang="html">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th v-for="head in header" :style="head.width">{{ head.name }}</th>
                </tr>
            </thead>
            <tbody>
                <item-row :products="products" :num="1"
                    @subtotal="addToTotal">
                </item-row>
                <item-row :products="products" :num="2"
                    @subtotal="addToTotal">
                </item-row>
                <item-row :products="products" :num="3"
                     @subtotal="addToTotal">
                </item-row>
                <item-row :products="products" :num="4"
                    @subtotal="addToTotal">
                </item-row>
                <item-row :products="products" :num="5"
                    @subtotal="addToTotal">
                </item-row>
            </tbody>
            <tfoot>
                <tr v-if="discount > 0 || retainer > 0">
                    <td colspan="4"></td>
                    <td>Subtotal:</td>
                    <td>$ {{ total }}</td>
                </tr>
                <tr v-if="discount > 0">
                    <td colspan="4"></td>
                    <td>Descuento:</td>
                    <td>$ {{ discount*total }}</td>
                </tr>
                <tr v-if="retainer > 0">
                    <td colspan="4"></td>
                    <td>Anticipo:</td>
                    <td>$ {{ retainer }}</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td><b>Total:</b></td>
                    <td>
                        $ {{ total - retainer - discount*total }}
                        <input type="hidden" name="total" :value="total - retainer - discount*total">
                    </td>
                </tr>

            </tfoot>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            header: [
                { name:'#', width: 'width: 5%' },
                { name:'Cantidad', width: 'width: 15%' },
                { name:'Unidad', width: 'width: 10%' },
                { name:'Material', width: 'width: 30%' },
                { name:'Precio unitario', width: 'width: 15%' },
                { name:'Importe', width: 'width: 20%' },
            ],
            articles: [
                1, 0, 0, 0, 0
            ],
            subtotals: [0, 0, 0, 0, 0],
            total: 0,
            products: {},
        };
    },
    props: ['retainer', 'discount'],

    methods: {
        addToTotal(total, num) {
            this.subtotals[num - 1] = total;

            this.total = this.subtotals.reduce(function (total, value) {
                return total + value;
            }, 0);
        }
    },
    created() {
        axios.get('/hercules/products').then(response => {
            this.products = response.data;
        });
    }
}
</script>
