<template>
	<div id="wrapper">
		<HeaderComponent></HeaderComponent>
		<!-- <router-view></router-view> --> 
		<MainComponent></MainComponent>

		<FooterComponent></FooterComponent>
	</div>
</template>

<script>
import HeaderComponent from './HeaderComponent.vue';
import FooterComponent from './FooterComponent.vue';
import MainComponent from './MainComponent.vue';

export default {
	name: 'AppComponent',
	
	components: {
		HeaderComponent,
		FooterComponent,
		MainComponent,
	}
}
</script>
<style>
	
</style>