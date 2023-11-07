<template>
    <div id="observationModal" class="observationModal modal fade" tabindex="-1" role="dialog"  aria-labelledby="observationModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Observações - {{ this.$data.cpf }} - {{ this.$data.name }}</h5>
                    <button type="button" class="close"  data-dismiss="modal" @click.prevent="closeModal()" data-target="#observationModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-0">
                        
                            <div class="col-12 w-100">
                                <form>
                                    <div class="form-group">
                                        <label for="notes">Observações</label>
                                        <input type="hidden" v-model="this.$data.form.resume_id" name="resume_id">
                                        <textarea name="observation" class="form-control w-100" placeholder="Observações" rows="2" v-model="this.$data.form.observation" >
                                            Possuir ampla experiência na função e disponibilidade de horários.
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
                            <div class="table-responsive">
                                <table v-if="this.$data.observations !== null" class="table">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Observação</th>
                                            <th>Por</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <tr v-for="(items , i) in this.$data.observations" :key="i">
                                            <td>{{ dateFormated(items.created_at)}}</td>
                                            <td>{{ items.observation}}</td>
                                            <td>{{ items.add_by}}</td>
                                            <td><button type="button" class="btn close" @click.stop="this.delete(items.id)" ><strong>X</strong></button></td>
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
            observations : null,
            form : {
                observation : '',
                resume_id : '',
                cpf : '',
                name : ''
            }
        }
    },
    methods: {


        closeModal(){
            this.$data.observations = null
            $('#observationModal').modal('hide');
        },

        dateFormated: function (value) {
            if(value != null && value != ""){
                const date = new Date(value) ;
                return date.toLocaleDateString(['pt-BR'], {month: '2-digit', day: '2-digit', year: 'numeric'})  ;
            }
            return '';
        },


        getData(resume_id){
            this.$data.form.resume_id = resume_id;
            axios.get(this.root_url+"admin/observation/resume/"+resume_id).then((response) => {
                if(!response.data.length){
                    this.$data.observations = null
                }else{
                    this.$data.observations = response.data
                   
                }
                $('#observationModal').modal('show');
            });
        },

        save(){
            if(this.$data.form.resume_id != '' && this.$data.form.observation != ''){
                // INSERE UM NOVO CADASTRO
                axios.post(this.root_url+'admin/observation/store',
                    this.$data.form
                    ,{
                        headers: {
                            'Content-type': 'application/json',
                        }
                    }).then((response) => {
                        this.getData(this.$data.form.resume_id);
                        this.$toast.info('Dados atualizados com sucesso.');
                        this.$data.form.observation = "";
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
                this.$toast.info('Preencha a observação');
            }
        },

        delete(id){
            if(id != ''){
                // INSERE UM NOVO CADASTRO
                axios.delete(this.root_url+'admin/observation/destroy/'+id
                    ,{
                        headers: {
                            'Content-type': 'application/json',
                        }
                    }).then((response) => {
                        this.getData(this.$data.form.resume_id);
                        this.$toast.info('Dados atualizados com sucesso.');
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
                this.$toast.info('Observação não identificada');
            }
        }

        
    },

    created(){
        var _this  = this;
        emitter.on('some-event', function (resume_id,cpf,name) {
            _this.getData(resume_id);
            _this.$data.cpf = cpf;
            _this.$data.name = name ;
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





