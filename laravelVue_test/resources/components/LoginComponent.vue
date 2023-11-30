<template>
	<div class="form-structor">
			<div class="signup">
				<!-- <h2 class="form-title" id="signup">Log in</h2> -->
				<div class="form-holder">
					<input type="email" class="input" id="email" name="email" placeholder="Email" />
					<input type="password" class="input" id="password" name="password" placeholder="Password" />
				</div>
					<button class="submit-btn1">로그인</button>
					<router-link to="/regist" class="submit-btn1">회원가입</router-link>
					<!-- <button class="submit-btn1" type="button" onclick="location.href='{{route('user.register.get')}}'">회원가입</button> -->
			</div>
		</div>
</template>
<script>
export default {
	name: 'LoginComponent',
	created() {
		this.$store.commit('setFlgTapUI', 1);
	}
}
</script>
<style>
	
</style>