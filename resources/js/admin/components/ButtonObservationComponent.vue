<template>
    <a  @click.prevent="this.clickEvent()" class="btn btn-danger btn-xs"><span class="fas fa-info px-1"></span> </a>
</template>

<script>

var emitter = require('tiny-emitter/instance');

export default {
    props :  {
        student_id: { type: String, required: true },
        name: { type: String, required: true },
    },
    methods: {
        clickEvent() {
            this.$emit('submit')
            emitter.emit('some-event', this.student_id, this.cpf,this.name);
        }
    },


}
</script>

<style>

</style>
