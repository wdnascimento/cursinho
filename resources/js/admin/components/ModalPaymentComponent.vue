<template>
    <div id="observationModal" class="observationModal modal fade" tabindex="-1" role="dialog"  aria-labelledby="observationModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Informações de Pagamento</h5>
                    <button type="button" class="close"  data-dismiss="modal" @click.prevent="closeModal()" data-target="#observationModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-0">

                            <div class="col-12 w-100">
                                <form>
                                    <div class="form-group">
                                        <label for="notes">Situação Atual</label>
                                        <input type="hidden" v-model="this.$data.form.id" name="id">
                                        <input type="hidden" v-model="this.$data.form.selective_process_id" name="selective_process_id">
                                        <input type="hidden" v-model="this.$data.form.student_id" name="student_id">
                                        <textarea name="payment" class="form-control w-100" placeholder="Observações" rows="2" v-model="this.$data.form.payment" >
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn py-2 btn-primary"  @click.prevent="this.save()" >Salvar</button>
                                    </div>
                                </form>
                            </div>

                    </div>
                    <div class="row g-0">
                        <div class="col-12">
                            <h6 class="py-2">Histórico</h6>
                            <div class="table-responsive">
                                <table v-if="this.$data.observations !== null" class="table">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Observação</th>
                                            <th>Por</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <tr v-for="(items , i) in this.$data.paymentLogs" :key="i">
                                            <td>{{ dateFormated(items.date)}}</td>
                                            <td>{{ items.payment}}</td>
                                            <td>{{ items.user}}</td>
                                         </tr>
                                    </tbody>
                                </table>
                                <h6 v-else>Nenhuma Observação registrada.</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"  @click.prevent="closeModal()" data-target="#observationModal" >Fechar</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import axios from 'axios';
var emitter = require('tiny-emitter/instance');

export default {
    props : {
        root_url : {
            type: String,
            default : '',
            required : true
        },
    },
    data : function (){
        return {
            paymentLogs : null,
            form : {
                id : '',
                selective_process_id : '',
                student_id : '',
                payment : '',
            }
        }
    },
    methods: {
        setPaymentStatus(value){
            $('#payment_status_'+this.$data.form.student_id).html(value);
        },

        closeModal(){
            this.$data.form.id      = '';
            this.$data.form.payment = '';
            this.$data.paymentLogs  = null ;
            $('#observationModal').modal('hide');
        },

        dateFormated: function (value) {
            if(value != null && value != ""){
                const date = new Date(value) ;
                return date.toLocaleDateString(['pt-BR'], {month: '2-digit', day: '2-digit', year: 'numeric'})  ;
            }
            return '';
        },


        getData(student_id, selective_process_id){
            this.$data.form.student_id = student_id;
            this.$data.form.selective_process_id = selective_process_id;
            axios.get(this.root_url+"api/student-payment/"+student_id+"/process/"+selective_process_id).then((response) => {
                if(response){
                    this.$data.form.id      = response.data.id;
                    this.$data.form.payment = '';
                    this.$data.paymentLogs  = response.data.payment_logs;
                    $('#observationModal').modal('show');
                }else{
                    this.$data.form.id      = '';
                    this.$data.form.payment = '';
                    this.$data.paymentLogs  = null ;
                }
            }).catch( (error) => {
                this.$toast.info('Erro!! Fazer login novamente');
                $('#form_filtro').submit();
            });

        },

        save(){
            if(this.$data.form.id != '' && this.$data.form.payment != ''){
                // INSERE UM NOVO CADASTRO
                axios.post(this.root_url+'api/student-payment',
                    this.$data.form
                    ,{
                        headers: {
                            'Content-type': 'application/json',
                        }
                    }).then((response) => {
                        this.$toast.info('Dados atualizados com sucesso.');
                        this.setPaymentStatus(this.$data.form.payment);
                        this.closeModal();
                    })
                    .catch( (error) => {
                        if(error.response.status === 422){
                            this.$toast.info('Preencha os campos listados acima');
                        }else{
                            this.$toast.info(error.response.data.message);
                        }
                        this.$data.error = error.response.data.errors;

                    });
            }else{
                this.$toast.info('Preencha a nova situação');
            }
        },

    },

    created(){
        var _this  = this;
        emitter.on('open-payment', function (student_id,selective_process_id) {
            _this.$data.student_id = student_id;
            _this.$data.selective_process_id = selective_process_id;
            _this.getData(student_id,selective_process_id);
        });

    }

}
</script>

<style>
    .observationModal{
        z-index: 999999 !important;
    }



    .close:focus {
        outline: 1px dotted #fff !important
    }

    .modal-title {
        color: #fff
    }

    .modal-header {
        background: red;
        color: #fff !important
    }

    .fa-close {
        color: #fff
    }

    .heading {
        font-weight: 500 !important
    }

    .subheadings {
        color: #808080;
    }
</style>





