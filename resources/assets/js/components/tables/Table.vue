<template lang="html">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabla</h3>
                </div>

                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Descripción</th>
                                <th>Status</th>
                                <th>Fecha Inicio</th>
                            </tr>
                        </thead>
                        <tbody>
                              <tr v-for="order in orders">
                                <td>{{ order.id }}</td>
                              </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['orders']
}
</script>

<style lang="css">
</style>
