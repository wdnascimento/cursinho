<template>
    <a  @click.prevent="this.clickEvent()" class="link-primary cursor"> {{ this.title}} </a>
</template>

<script>

var emitter = require('tiny-emitter/instance');

export default {
    props :  {
        job_id: { type: String, required: true },
        title: { type: String, required: true },
    },
    methods: {
        clickEvent() {
            emitter.emit('open-job', this.job_id);
        }
    },   
    
}
</script>

<style>
    .cursor{
        cursor: pointer !important;
    }

</style>