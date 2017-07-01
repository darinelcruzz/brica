<template lang="html">
    <div class="box box-warning box-solid collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ title }}</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse">
                  <i class="fa fa-plus"></i>
              </button>
            </div>
        </div>

        <div class="box-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: ['title'],
}
</script>
