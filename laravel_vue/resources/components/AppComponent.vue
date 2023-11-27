<template>
	<div>
		<h1>APP VUE 컴포넌트</h1>
		<h2>{{  $store.state.testStr }}</h2>
		<h2>라라벨 데이터 name : {{  laravelData.name }}</h2>
		<h2>라라벨 데이터 id : {{  laravelData.id }}</h2>
		<ul>
			<li><a href="/">루트</a></li>
			<li><a href="/login">로그인</a></li>
			<li><a href="/board">보드</a></li>
		</ul>
		<!-- vue의 라우터로 이동 (왠만하면 사용x 주의해야함) -->
		<!-- 서버로 통신이 아닌 웹에서 리랜더링 -->
		<!-- 데이터 받아올려면 ajax 사용 -->
		<router-link to="/login" >라우터 로그인</router-link>
		<router-link to="/board" >보드 로그인</router-link>
		<router-view></router-view>
	</div>
</template>
<script>
export default {
	name: 'AppComponent',
	props: {
		laravelData: Object,
	},
	beforeCreate() {
		this.$store.commit('setLaravelData', this.laravelData);
	},
}
</script>
<style>
	
</style>