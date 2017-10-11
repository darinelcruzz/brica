<template lang="html">
    <div :class="[size]">
		<div :class="['small-box', color]">
			<div class="inner">
				<slot></slot>
			</div>
			<div class="icon">
				<i :class="[fa, icon]"></i>
			</div>
		</div>
	</div>
</template>

<script>
export default {
    props: ['color', 'icon', 'size']
}
</script>
