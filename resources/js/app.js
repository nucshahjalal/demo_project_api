// import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import './bootstrap'
import { createApp } from 'vue'
import App from './App.vue'
import VehicleListVue from './VehicleListVue.vue'

createApp(App).mount('#app')
createApp(VehicleListVue).mount('#vehicleListVue')


