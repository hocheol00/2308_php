import { createWebHistory, createRouter } from "vue-router";
import MainComponent from '../components/MainComponent.vue';
import DetailComponent from '../components/DetailComponent.vue';
import LoginComponent from '../components/LoginComponent';
import RegistComponent from '../components/RegistComponent';

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
	{
		path: '/login',
		component: LoginComponent,
	},
	{
		path: '/regist',
		component: RegistComponent,
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;