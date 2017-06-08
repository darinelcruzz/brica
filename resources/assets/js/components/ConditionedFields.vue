<template lang="html">
  <div class="conditioned-fields">
      <div class="form-group">
          <label>{{ independent }}</label>
          <select class="form-control" v-model="selected">
            <option v-for="ioption in ioptions">{{ ioption }}</option>
          </select>
      </div>

      <div v-if="disable(selected)" class="form-group">
          <label>{{ dependent }}</label>
          <select class="form-control" :disabled="disabled">
            <option v-for="doption in doptions">{{ doption }}</option>
          </select>
      </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            independent: 'Diseño',
            dependent: 'Elige',
            ioptions: [
                'Existente',
                'Nuevo'
            ],
            doptions: [
                'XAS123',
                'DEW379',
                'XAS998',
                'LKH332',
                'BVZ101'
            ],
            selected: '',
        }
    },
    methods: {
        disable(option) {
            if (option == 'Existente') {
                return true;
            }

            return false;
        }
    }
}
</script>

<style lang="css">
</style>
