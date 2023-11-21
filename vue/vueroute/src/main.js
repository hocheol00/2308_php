import { createApp } from 'vue'
import App from './App.vue'
// import Edit from './Edit.vue'
import router from './router.js'

createApp(App)
	.use(router)
	.mount('#app')
