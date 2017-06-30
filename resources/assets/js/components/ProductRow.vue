<template lang="html">
    <tr>
        <td>
            {{ num }}
        </td>
        <td>
            <input type="number" name="quantity[]" min="1" v-model="quantity" @change="saveTotal">
        </td>
        <td>
            {{ products[product_id - 1].unity }}
        </td>
        <td>
            <select class="" name="material[]" v-model="product_id" @change="saveTotal">
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
        <td>
            <div>
                <a v-if="num < 5" @click="add">
                    <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
                </a>
                <a v-if="num > 1" @click="remove">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
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
        saveTotal() {
            this.total = this.products[this.product_id - 1].price * this.quantity;
            this.$emit('subtotal', this.total, this.num);
        },
        remove() {
            this.$emit('removeRow', this.num - 1);
        },
        add() {
            this.$emit('addRow', this.num);
        }
    },
}
</script>

<style lang="css">
</style>
