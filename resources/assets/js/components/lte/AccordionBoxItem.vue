<template lang="html">
    <div class="panel box box-primary">
      <div class="box-header with-border">
        <h4 class="box-title">
          <a data-toggle="collapse" data-parent="#accordion" :href="'#' + title">
            {{ title }}
          </a>
        </h4>
      </div>
      <div :id="title" class="panel-collapse collapse">
        <div class="box-body">
          <slot></slot>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    props: ['title']
}
</script>

<style lang="css">
</style>
