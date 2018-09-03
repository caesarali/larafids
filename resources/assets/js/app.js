require('./bootstrap');
require('./fids');

window.Vue = require('vue');

import VueProgressBar from 'vue-progressbar';

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '2px'
});

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('progressbar', require('./components/Progressbar.vue'));

const app = new Vue({
    el: '#app'
});
