<template lang="html">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ title }}</h3>
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
                              <tr v-for="row in rows">
                                <td v-for="value in row">{{ value }}</td>
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
    data() {
        return {
            title: 'Prueba',
            rows: [
                ['1', 'Prof. Cooper Hauck', 'Enim maxime enim consequatur ut impedit.',
                'autorizado', 'Saturday 3 June, 2017'],
                ['1', 'Prof. Cooper Hauck', 'Enim maxime enim consequatur ut impedit.',
                'autorizado', 'Saturday 3 June, 2017'],
                ['1', 'Prof. Cooper Hauck', 'Enim maxime enim consequatur ut impedit.',
                'autorizado', 'Saturday 3 June, 2017'],
            ]
        }
    }
}
</script>

<style lang="css">
</style>
