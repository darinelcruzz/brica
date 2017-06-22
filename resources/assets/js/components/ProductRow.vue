<template lang="html">
    <tr>
        <td>
            {{ num }}
        </td>
        <td>
            <input type="number" name="quantity[]" min="1" v-model="quantity" @input="saveTotal(products, num)">
        </td>
        <td>
            {{ products[product_id - 1].unity }}
        </td>
        <td>
            <select class="" name="material[]" v-model="product_id">
                <option v-for="product in products" :value="product.id">
                    {{ product.name }}
                </option>
            </select>
        </td>
        <td>
            $ {{ products[product_id - 1].price }}
        </td>
        <td>
            $ {{ products[product_id - 1].price * quantity }}
        </td>
    </tr>
</template>

<script>
export default {
    data() {
        return {
            product_id: 1,
            quantity: 1,
            total: 0,
        };
    },
    props: ['products', 'num'],
    methods: {
        saveTotal(products, num) {
            this.total = products[this.product_id - 1].price * this.quantity;
            this.$emit('subtotal', this.total, num);
        }
    }
}
</script>

<style lang="css">
</style>
