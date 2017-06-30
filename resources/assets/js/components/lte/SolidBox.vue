<template lang="html">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{ title }}</h3>
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
