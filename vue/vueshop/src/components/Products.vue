<template>
	<div>
		<h4 @click="$emit('OpenModal',data)" :style="sty_color_blue">{{ data.Name }}</h4>
		<p>{{ data.price }}</p>
		<button @click="$emit('OnePlus',productKey)">허위 매물 신고</button><br>
		<span>신고 수 : {{ data.reportCnt }}</span>
	</div>
</template>
<script>


export default {
	name: 'products',

	props: {
		data: Object,
		productKey: Number,
	}
}

</script>
<style>
	
</style>