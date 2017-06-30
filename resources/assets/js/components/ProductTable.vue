<template lang="html">
    <table class="table table-striped">
        <thead>
            <tr>
                <th v-for="head in header" :style="head.width">{{ head.name }}</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="n in numbers[entries-1]">
                <product-row @subtotal="addToTotal" :products="products" :num="n"></product-row>
            </template>
        </tbody>
        <tfoot>
            <tr>
                <td></td><td></td><td></td><td></td>
                <td>
                    <b>Total:</b>
                </td>
                <td>
                    $ {{ total }}
                    <input type="hidden" name="total" :value="total">
                </td>
            </tr>
        </tfoot>
    </table>
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
            subtotals: [0, 0, 0, 0, 0],
            numbers: [1, 2, 3, 4, 5],
            total: 0,
        };
    },
    props: ['products', 'entries'],

    methods: {
        addToTotal(total, num) {
            this.subtotals[num - 1] = total;

            this.total = this.subtotals.reduce(function (total, value) {
                return total + value;
            }, 0);
        }
    },
}
</script>

<style lang="css">
</style>
