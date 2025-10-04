import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import createI18nInstance from './i18n'

// Import Bootstrap CSS (minified) and the JS bundle (includes Popper)
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import 'bootstrap-icons/font/bootstrap-icons.css'
// Import app-wide styles and CSS variables
import './assets/styles/main.css'

const i18n = createI18nInstance()

createApp(App).use(router).use(i18n).use(createPinia()).mount('#app')
