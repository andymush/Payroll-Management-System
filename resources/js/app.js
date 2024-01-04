import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();


import { createApp } from 'vue';
import ComponentA from './components/ComponentA.vue';
import ComponentB from './components/ComponentB.vue';

const app = createApp({});

app
  .component('ComponentA', ComponentA)
  .component('ComponentB', ComponentB);

app.mount("#app");