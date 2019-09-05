<template lang="html">
    <tr>
        <td>{{ num }}</td>
        <td>
            <div class="input-group input-group-sm">
                <input class="form-control" type="number" name="quantity[]" min="0" step="0.1" v-model.number="quantity" @change="saveTotal">
            </div>
        </td>
        <td>{{ item.unity }}</td>
        <td>
            <select name="products[]" v-model="item" @change="saveTotal" class="form-control">
                <option v-for="product in products" :value="product">
                    {{ product.description }}
                </option>
            </select>
        </td>
        <td>{{ item.price | currency }}</td>
        <td>
            <input type="hidden" name="subtotal[]" :value="total">
            <input type="hidden" name="item[]" :value="item.id">
            {{ total | currency }}
        </td>
    </tr>
</template>

<script>
export default {
    data() {
        return {
            item: {
                id: 0,
                description: '',
                unity: '',
                price: 0,
            },
            quantity: 0,
        };
    },
    props: ['products', 'num'],
    methods: {
        saveTotal() {
            this.$emit('subtotal', this.total, this.num);
        },
    },
    computed: {
        total() {
            return this.item.price * this.quantity;
        },
    }
}
</script>
