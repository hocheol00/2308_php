<template>
	<!-- Main -->
	<div id="main">
		<div class="inner">
			<h1>{{ $store.state.boardData.name }}</h1>
			<!-- <h2>{{ $route.params.id }}</h2> -->
			<div class="post-img" :style="{backgroundImage : `url('${$store.state.boardData.img}')`}"></div>
			<h2>{{ $store.state.boardData.content }}</h2>
			<!-- <h2>{{ $store.state.BoardId }}</h2> -->
			
		</div>
	</div>
</template>
<script>
export default {
	name: 'DetailComponent',
	created() {
		// sotre의 action 호출
		
	},
	beforeCreate() {
		this.$store.dispatch('actionGetBoardList', this.$route.params.id);
		// this.$store.commit('setBoardId', this.data.id);
	},
	methods: {

	},

}
</script>
<style>
	.post-img{ 
		width: 800px;
		height: 800px;
	}
</style>