<template>
	<div id="wrapper">
		<HeaderComponent v-if="$store.state.flgTapUI === 0"></HeaderComponent>
		<router-view></router-view> 
		<FooterComponent v-if="$store.state.flgTapUI === 0"></FooterComponent>
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