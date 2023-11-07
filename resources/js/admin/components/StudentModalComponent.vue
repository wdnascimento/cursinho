<template>
    <div>
        <div id="ResumeModal" class="ResumeModal modal fade" tabindex="-1" role="dialog"  aria-labelledby="ResumeModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">{{  this.resume.user_name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" @click.prevent="closeResume()" data-target="#ResumeModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div v-if="this.$data.resume != {}" class="container">
                            <div class="row">
                                <h5 class="w-100 text-center">{{ this.resume.user_name }}</h5>
                                <div class="col-12 text-center">
                                    <p>
                                    Nascimento: {{ dateFormated(this.resume.birth_date) }} ({{ this.resume.get_age}} anos) - {{this.resume.desc_marital_status}}
                                    <br>  {{ this.resume.logradouro }}, {{ this.resume.numero }}, {{ this.resume.bairro }}, {{ this.resume.localidade }}, {{ this.resume.uf }}
                                    <br>  <strong>CEP:</strong> {{ this.resume.cep }} <span v-if="(this.resume.complemento != '')"  >  - <strong>Complemento:</strong> {{ this.resume.complemento}} </span>
                                    <br>  <strong>Telefone:</strong> {{ this.resume.phone }} - <strong>Celular: </strong> {{ this.resume.cellphone }} - <strong>Email: </strong> {{ this.resume.user_email }}
                                    <br>  <strong>Possui CNH?</strong> {{ this.resume.desc_cnh }} <span v-if="(this.resume.cnh == 1)"  >  - <strong>Categoria:</strong> {{ this.resume.cnh_category }} </span>
                                    <br>  <strong>Fumante:</strong> {{ this.resume.desc_smoker }} - <strong>PNE:</strong> {{ this.resume.desc_pne }} - <strong>Aposentado:</strong> {{ this.resume.desc_retired }}
                                    <br>  <strong>Atualizado em:</strong> {{ dateFormated(this.resume.updated_at) }}
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <h5 >Objetivos</h5>
                                <div class="col-12">

                                    <p v-for="(item , i) in this.resume.occupations" :key="i">
                                        {{ item.desc_occupation }}<br>
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <h5 >Síntese das Qualificações</h5>
                                <div class="col-12">
                                    <p class="text-justify">
                                    {{ this.resume.small_resume }}<br>
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <h5 >Formação Acadêmica</h5>
                                <div class="col-12">
                                    <p v-for="(item , i) in this.resume.scholarities"  :key="i">
                                        <strong>{{ item.desc_school_level}}</strong>
                                        <br><strong>Curso:</strong> {{ item.course}}, <strong>Instituição:</strong> {{ item.entity}}
                                        <strong>, Início:</strong> {{ item.start_year}} - <strong>Término:</strong> {{ item.end_year }}, <strong>Concluído:</strong> {{ item.desc_finished}} <br>
                                    </p>
                                </div>
                            </div>

                            <div class="row" >
                                <h5 >Cursos</h5>
                                <div class="col-12">
                                    <p v-for="(item , i) in this.resume.courses"  :key="i">
                                        <strong>{{ item.title}}</strong> - <strong>Instituição:</strong> {{ item.entity}}, <strong> Ano:</strong> {{ item.indate}}, <strong> Carga Horária:</strong> {{ item.workload}}
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <h5 >Experiências Profissionais</h5>
                                <div class="col-12">
                                    <p v-for="(item , i) in this.resume.experiencies"  :key="i" class="text-justify pt-3">
                                        <h6><strong>Empresa: {{ item.company}}</strong></h6>
                                        <strong>Função:</strong> {{ item.role}}<br>
                                        <strong>Entrada:</strong> {{  dateFormated(item.entry_date) }}, <strong>Saída:</strong> {{ dateFormated(item.departure_date) }}, <strong>Salário:</strong> {{ item.salary}}<br>
                                        <strong>Atividades Desempenhadas:</strong> {{ item.tasks }}<br>
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <h5 >Pretensão Salarial</h5>
                                <div class="col-12">
                                    <p>
                                    {{ this.resume.desc_salary_expectation}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"  @click.prevent="closeResume()" data-target="#ResumeModal" >Fechar</button>
                    </div>
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
    data(){
        return {
           resume : {}
        }
    },
    methods: {
        closeResume(){
            $('#ResumeModal').modal('hide');
        },

        dateFormated: function (value) {
            if(value != null && value != ""){
                const date = new Date(value) ;
                return date.toLocaleDateString(['pt-BR'], {month: '2-digit', day: '2-digit', year: 'numeric'})  ;
            }
            return '';
        },

        getData(resume_id){
            this.$data.resume = {};
            axios.get(this.root_url+"admin/resumejson/"+resume_id).then((response) => {
                    this.$data.resume = response.data;
                    $('#ResumeModal').modal('show');
            });
        },


    },
    created : function(){

        var _this  = this;
        emitter.on('open-student', function (resume_id) {
            _this.getData(resume_id);
        });
    }
}
</script>

<style>
    .ResumeModal{
        z-index: 999999 !important;
    }

    .modal-dialog{
        width: 75%;
        max-width: 1024px;
    }

    .h5{
        font-weight: 300 ;
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
