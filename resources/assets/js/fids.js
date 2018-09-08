require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');
window.moment = require('moment');

Vue.component('departures', require('./components/Departures.vue'));
Vue.component('arrivals', require('./components/Arrivals.vue'));
Vue.component('runningtext', require('./components/Runningtext.vue'));

const app = new Vue({
    el: '#app.fids',
    created() {
        Echo.channel(`fids-development`)
            .listen('RescheduleEvent', (e) => {
                console.log(e.update);
        });
        $.fn.extend({
            animateCss: function(animationName, callback) {
                var animationEnd = (function(el) {
                    var animations = {
                        animation: 'animationend',
                        OAnimation: 'oAnimationEnd',
                        MozAnimation: 'mozAnimationEnd',
                        WebkitAnimation: 'webkitAnimationEnd',
                    };
                    for (var t in animations) {
                        if (el.style[t] !== undefined) {
                            return animations[t];
                        }
                    }
                })(document.createElement('div'));
                this.addClass('animated ' + animationName).one(animationEnd, function() {
                    $(this).removeClass('animated ' + animationName);
                    if (typeof callback === 'function') callback();
                });

                return this;
            },
        });
    }
});

function datetime() {
    let time = moment().format("HH:mm");
    let day = moment().format("dddd");
    let date = moment().format("D MMMM, YYYY");
    document.getElementById("time").innerHTML = time;
    document.getElementById("day").innerHTML = day;
    document.getElementById("date").innerHTML = date;
    requestAnimationFrame(datetime);
}

requestAnimationFrame(datetime);
