<template>
    <a id="btn-payment" @click.prevent="this.clickEvent()" class="cursor"  data-toggle="tooltip" title="Mudar Status de Pagamento">
        <i class="fas fa-exchange-alt"></i>
    </a>
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

    created(){
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    }
}
</script>

<style>
    .cursor{
        cursor: pointer !important;
    }

</style>
