<template>
    <div id="jobDetailModal" class="jobDetailModal  modal fade" tabindex="-1" role="dialog"  aria-labelledby="jobDetailModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ this.job.title }}</h5>
                        <button type="button" class="close"  data-dismiss="modal" @click.prevent="closeJobDetail()" data-target="#jobDetailModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="table-responsive ">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column"> 
                                                    <span class="heading d-block">Escolaridade:</span>
                                                    <span class="subheadings">
                                                     {{ Object(this.job.school_levels).title }}</span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="heading d-block">Curso: </span>
                                                    <span class="subheadings">{{ this.job.course }}</span> </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column"> 
                                                    <span class="heading d-block">Tipo:</span>
                                                    <span class="subheadings">
                                                     {{ this.job.desc_type }}</span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="heading d-block">Período: </span>
                                                    <span class="subheadings">{{ this.job.period }}</span> </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column"> 
                                                    <span class="heading d-block">PNE:</span>
                                                    <span class="subheadings">
                                                     {{ this.job.desc_pne }}</span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="heading d-block">Vaga Interna: </span>
                                                    <span class="subheadings">{{ this.job.desc_internal }}</span> </div>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td>
                                                <div class="d-flex flex-column"> 
                                                    <span class="heading d-block">Quantidade:</span>
                                                    <span class="subheadings">
                                                     {{ this.job.quantity }}</span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="heading d-block">Salário: </span>
                                                    <span class="subheadings">{{ this.job.salary }}</span> </div>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <!-- <td>
                                                <div class="d-flex flex-column"> 
                                                    <span class="heading d-block">Sexo:</span>
                                                    <span class="subheadings">
                                                     {{ this.job.desc_sex }}</span> </div>
                                            </td> -->
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="heading d-block">Cidade: </span>
                                                    <span class="subheadings">{{ Object(this.job.cities).title }}</span> </div>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td colspan="2">
                                                <div class="d-flex flex-column"> 
                                                    <span class="heading d-block">Perfil:</span>
                                                    <span class="subheadings">
                                                     {{ this.job.profile }}</span> </div>
                                            </td>
                                         </tr>
                                         <tr>
                                            <td colspan="2">
                                                <div class="d-flex flex-column"> 
                                                    <span class="heading d-block">Observações:</span>
                                                    <span class="subheadings">
                                                     {{ this.job.notes }}</span> </div>
                                            </td>
                                         </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"  @click.prevent="closeJobDetail()" data-target="#jobDetailModal" >Fechar</button>
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
            job : []
        }
    },
    methods: {
        closeJobDetail(){
            $('#jobDetailModal').modal('hide');
        },

        getData(job_id){
            this.$data.job = {};
            axios.get(this.root_url+"admin/job/jobjson/"+job_id).then((response) => {
                    this.$data.job = response.data;
                    $('#jobDetailModal').modal('show');
            });
        },
    },
        
    created : function(){
        var _this  = this;
        emitter.on('open-job', function (job_id) {
            _this.getData(job_id);
        });
    }
}
</script>

<style>
    .jobDetailModal{
         z-index: 999999 !important;
    }

    .modal-dialog{
        width: 75%;
        max-width: 1024px;
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