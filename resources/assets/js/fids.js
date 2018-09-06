require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');
window.moment = require('moment');

Vue.component('departures', require('./components/Departures.vue'));
Vue.component('arrivals', require('./components/Arrivals.vue'));
Vue.component('runningtext', require('./components/Runningtext.vue'));

const app = new Vue({
    el: '#app.fids',
    data: {
        date: null,
        day: null,
    },
    methods: {
        updateDate() {
            this.day = moment().format("dddd");
            this.date = moment().format("D MMMM, YYYY");
        }
    },
    created() {
        this.updateDate();
        setInterval(() => this.updateDate(), 1000 * 60 * 60 * 24);
    }
});

function clock()
{
    var now = new Date();
    var mins = ('0' + now.getMinutes()).slice(-2);
    var hr = now.getHours();
    var Time = hr + ":" + mins;
    document.getElementById("time").innerHTML = Time;
    requestAnimationFrame(clock);
}

requestAnimationFrame(clock);
