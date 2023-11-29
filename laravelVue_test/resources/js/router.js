import { createWebHistory, createRouter } from "vue-router";
import MainComponent from '../components/MainComponent.vue';
import DetailComponent from '../components/DetailComponent.vue';

const routes = [
	{
		path: '/',
		redirect: '/main',
	},
	{
		path: '/main',
		component: MainComponent,
	},
	{
		path: '/detail/:id',
		component: DetailComponent,
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;