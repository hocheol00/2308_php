<template>
	<div id="wrapper">
		<HeaderComponent></HeaderComponent>
		<router-view></router-view> 
		<FooterComponent></FooterComponent>
	</div>
</template>

<script>
import HeaderComponent from '../components/HeaderComponent.vue';
import FooterComponent from '../components/FooterComponent.vue';

export default {
	name: 'AppComponent',
	components: {
		HeaderComponent,
		FooterComponent,
	}
}
</script>
<style>
	
</style>