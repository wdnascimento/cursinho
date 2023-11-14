<template>
    <div>
        <div id="StudentModal" class="StudentModal modal fade" tabindex="-1" role="dialog"  aria-labelledby="StudentModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">{{  this.student.user_name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" @click.prevent="closeResume()" data-target="#StudentModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div v-if="this.$data.student != {}" class="container">
                            <div class="row">
                                <h5 class="w-100 text-center">{{ this.student.user_name }}</h5>
                                <div class="col-12 text-center">
                                    <p>
                                    Nascimento: {{ dateFormated(this.student.birth_date) }} ({{ this.student.get_age}} anos) - {{this.student.desc_marital_status}}
                                    <br>  {{ this.student.logradouro }}, {{ this.student.numero }}, {{ this.student.bairro }}, {{ this.student.localidade }}, {{ this.student.uf }}
                                    <br>  <strong>CEP:</strong> {{ this.student.cep }} <span v-if="(this.student.complemento != '')"  >  - <strong>Complemento:</strong> {{ this.student.complemento}} </span>
                                    <br>  <strong>Telefone:</strong> {{ this.student.phone }} - <strong>Celular: </strong> {{ this.student.cellphone }} - <strong>Email: </strong> {{ this.student.user_email }}
                                    <br>  <strong>Possui CNH?</strong> {{ this.student.desc_cnh }} <span v-if="(this.student.cnh == 1)"  >  - <strong>Categoria:</strong> {{ this.student.cnh_category }} </span>
                                    <br>  <strong>Fumante:</strong> {{ this.student.desc_smoker }} - <strong>PNE:</strong> {{ this.student.desc_pne }} - <strong>Aposentado:</strong> {{ this.student.desc_retired }}
                                    <br>  <strong>Atualizado em:</strong> {{ dateFormated(this.student.updated_at) }}
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <h5 >Objetivos</h5>
                                <div class="col-12">

                                    <p v-for="(item , i) in this.student.occupations" :key="i">
                                        {{ item.desc_occupation }}<br>
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <h5 >Síntese das Qualificações</h5>
                                <div class="col-12">
                                    <p class="text-justify">
                                    {{ this.student.small_resume }}<br>
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <h5 >Formação Acadêmica</h5>
                                <div class="col-12">
                                    <p v-for="(item , i) in this.student.scholarities"  :key="i">
                                        <strong>{{ item.desc_school_level}}</strong>
                                        <br><strong>Curso:</strong> {{ item.course}}, <strong>Instituição:</strong> {{ item.entity}}
                                        <strong>, Início:</strong> {{ item.start_year}} - <strong>Término:</strong> {{ item.end_year }}, <strong>Concluído:</strong> {{ item.desc_finished}} <br>
                                    </p>
                                </div>
                            </div>

                            <div class="row" >
                                <h5 >Cursos</h5>
                                <div class="col-12">
                                    <p v-for="(item , i) in this.student.courses"  :key="i">
                                        <strong>{{ item.title}}</strong> - <strong>Instituição:</strong> {{ item.entity}}, <strong> Ano:</strong> {{ item.indate}}, <strong> Carga Horária:</strong> {{ item.workload}}
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <h5 >Experiências Profissionais</h5>
                                <div class="col-12">
                                    <p v-for="(item , i) in this.student.experiencies"  :key="i" class="text-justify pt-3">
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
                                    {{ this.student.desc_salary_expectation}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"  @click.prevent="closeResume()" data-target="#StudentModal" >Fechar</button>
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
            student : {} ,
            student_id : null ,
            selective_process_id : null
        }
    },
    methods: {
        closeResume(){
            $('#StudentModal').modal('hide');
        },

        dateFormated: function (value) {
            if(value != null && value != ""){
                const date = new Date(value) ;
                return date.toLocaleDateString(['pt-BR'], {month: '2-digit', day: '2-digit', year: 'numeric'})  ;
            }
            return '';
        },

        getData(student_id, selective_process_id){
            axios.get(this.root_url+"api/student-print/"+student_id+"/process/"+selective_process_id).then((response) => {
                if(response){
                    console.log(response);
                    this.$data.student = response.data;
                    $('#StudentModal').modal('show');
                }else{
                    this.$data.student = null;
                }
            }).catch( (error) => {
                this.$toast.info('Erro!! Fazer login novamente');
                // $('#form_filtro').submit();
            });

        },

    },
    created : function(){
        var _this  = this;
        emitter.on('open-student-register', function (student_id,selective_process_id) {
            _this.$data.student_id = student_id;
            _this.$data.selective_process_id = selective_process_id;
            _this.getData(student_id,selective_process_id);
        });
    }
}
</script>

<style>
    .StudentModal{
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
