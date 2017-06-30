<template lang="html">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th v-for="head in header" :style="head.width">{{ head.name }}</th>
                </tr>
            </thead>
            <tbody>
                <product-row :products="products" :num="1"
                    @addRow="addRow" @subtotal="addToTotal">
                </product-row>
                <product-row v-if="articles[1]" :products="products" :num="2"
                    @addRow="addRow" @removeRow="removeRow" @subtotal="addToTotal">
                </product-row>
                <product-row v-if="articles[2]" :products="products" :num="3"
                     @addRow="addRow" @removeRow="removeRow" @subtotal="addToTotal">
                </product-row>
                <product-row v-if="articles[3]" :products="products" :num="4"
                    @addRow="addRow" @removeRow="removeRow" @subtotal="addToTotal">
                </product-row>
                <product-row v-if="articles[4]" :products="products" :num="5"
                    @subtotal="addToTotal" @removeRow="removeRow">
                </product-row>
            </tbody>
            <tfoot>
                <tr>
                    <td></td><td></td><td></td><td></td>
                    <td>
                        <b>Total:</b>
                    </td>
                    <td>
                        $ {{ total }}
                        <input type="hidden" name="amount" :value="total">
                    </td>
                    <td></td>
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
                { name: 'Acción', width: 'width: 5%'}
            ],
            articles: [
                1, 0, 0, 0, 0
            ],
            subtotals: [0, 0, 0, 0, 0],
            total: 0,
        };
    },
    props: ['products'],

    methods: {
        addToTotal(total, num) {
            this.subtotals[num - 1] = total;

            for (var i = 0; i < this.subtotals.length; i++) {
                this.subtotals[i] = this.subtotals[i] * this.articles[i];
            }

            this.total = this.subtotals.reduce(function (total, value) {
                return total + value;
            }, 0);
        },
        removeRow(num) {
            this.articles[num] = 0;
            this.addToTotal(0, num);
        },
        addRow(num) {
            this.articles[num] = 1;
        }
    },
}
</script>
