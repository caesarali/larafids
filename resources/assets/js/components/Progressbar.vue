<template>
    <vue-progress-bar></vue-progress-bar>
</template>

<script>
    export default {
        created () {
            this.$Progress.start()
        },
        mounted () {
            this.$Progress.finish()
        }
    }
</script>
