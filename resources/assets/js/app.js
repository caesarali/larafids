require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    methods: {
        confirm: function (event) {
            event.preventDefault();
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    event.target.submit()
                }
            });
        }
    }
});
