<template>
	<!-- Header -->
	<header id="header">
		<div class="inner">
		<!-- Logo -->
			<a href="index.html" class="logo">
				<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">요즘 감성, 요즘 가구</span>
			</a>
		<!-- Nav -->
			<nav>
				<ul>
					<li><a href="#menu">Menu</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Menu -->
	<nav id="menu">
		<h2>Menu</h2>
		<ul>
			<li><router-link to="/main">HOME</router-link></li>
			<li><router-link to="/main">login</router-link></li>
		</ul>
	</nav>
</template>
<script>
export default {
	name: 'HeaderComponent',
}
</script>
<style>
	
</style>