<template>
	<div class="form-structor">
		<div class="signup">
			<h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
			<div class="form-holder">
				<input type="text" class="input" id="name" name="name" placeholder="이름" />
				<input type="email" class="input" id="email" name="email" placeholder="이메일" />
				<input type="password" class="input" id="password" name="password" placeholder="비밀번호" />
				<input type="password" class="input" id="passwordchk" name="passwordchk" placeholder="비밀번호 확인" />
			</div>
		<button class="submit-btn1">가입하기</button>
		</div>
	</div>
</template>
<script>
export default {
	name: 'RegistComponent',
	created() {
		this.$store.commit('setFlgTapUI', 1);
	}
}
</script>
<style>
	
</style>