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

setInterval(function(){
    $('.status').animateCss('flipInX');
}, 300);

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
