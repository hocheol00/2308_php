<template>
	<div class="form-structor">
			<div class="signup">
				<router-link to="/"><h2 class="form-title" id="signup">감성 호구</h2></router-link>
				<div class="form-holder">
					<input type="email" class="input" id="email" name="email" placeholder="Email"/>
					<input type="password" class="input" id="password" name="password" placeholder="Password"/>
					<h2>{{ email }}</h2>
				</div>
					<button class="submit-btn1" @click="login">로그인</button>
					<router-link to="/regist" class="submit-btn1">회원가입</router-link>
					<!-- <button class="submit-btn1" type="button" onclick="location.href='{{route('user.register.get')}}'">회원가입</button> -->
			</div>
		</div>
</template>
<script>
export default {
	name: 'LoginComponent',
	data() {
		// return {
		// 	email: '',
		// 	password: '',
		// }
	},
	created() {
		this.$store.commit('setFlgTapUI', 1);
	},
	methods: {
		login(){
			this.$store.dispatch('actionLogin');
		},
	}
}
</script>
<style>
	
</style>