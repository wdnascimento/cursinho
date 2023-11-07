<template>
    <a  @click.prevent="this.clickEvent()" class="link-primary cursor" alt="Ver Cadastro"> <i class="fas fa-eye"></i></a>
</template>

<script>

var emitter = require('tiny-emitter/instance');

export default {
    props :  {
        student_id: { type: String, required: true },
        selective_process_id: { type: String, required: true },
    },
    methods: {
        clickEvent() {
            emitter.emit('open-payment', this.student_id, this.selective_process_id);
        }
    },
}
</script>

<style>
    .cursor{
        cursor: pointer !important;
    }

</style>
