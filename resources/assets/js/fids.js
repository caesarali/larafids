require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');
window.moment = require('moment');

Vue.component('departures', require('./components/Departures.vue'));
Vue.component('arrivals', require('./components/Arrivals.vue'));
Vue.component('runningtext', require('./components/Runningtext.vue'));

const app = new Vue({
    el: '#app.fids'
});

function datetime()
{
    let time = moment().format("HH:mm");
    let day = moment().format("dddd");
    let date = moment().format("D MMMM, YYYY");
    document.getElementById("time").innerHTML = time;
    document.getElementById("day").innerHTML = day;
    document.getElementById("date").innerHTML = date;
    requestAnimationFrame(datetime);
}

requestAnimationFrame(datetime);
