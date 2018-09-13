<template>
    <nav class="navbar navbar-bottom navbar-expand-md navbar-dark fixed-bottom text-white bg-gradient">
        <marquee scrollamount="15">
            <h1 class="marquee"><span v-html="runningtext"></span></h1>
        </marquee>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                runningtext: '',
                lastUpdate: '',
            }
        },
        mounted() {
            this.loadData();
            setInterval(function () {
                this.loadData();
            }.bind(this), 10000);
        },
        methods: {
            loadData: function () {
                axios.get('/api/runningtext').then(response => {
                    if (this.lastUpdate != response.data.lastUpdate.date) {
                        this.runningtext = response.data.text
                        this.lastUpdate = response.data.lastUpdate.date
                    }
                })
            }
        }
    }
</script>

