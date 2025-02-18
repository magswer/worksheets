// import { createApp } from 'vue';
// import App from '../views/App.vue';

// const appElement = document.getElementById('app');
// if (appElement) {
//     createApp(App).mount('#app');
// }

import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

import { createApp } from 'vue';
import App from '../views/App.vue';

createApp(App).mount('#vue-app');
