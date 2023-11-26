<template class="template">
    <div class="row">
        <div class="col-12">
            <GChart
                :settings="{ packages: ['corechart' , 'table', 'map'] , language: 'pt-BR'}"
                type="PieChart"
                :data="JSON.parse(JSON.stringify(this.ChartData))"
                :options="chartOptions"
                :width="400"
                :height="500"
            />
        </div>
    </div>
  </template>

  <script>
  import { GChart } from 'vue-google-charts';


  export default {
    components: {
      GChart,
    },
    props :{
        title : {
            required : true,
            type : String
        },
        responses : {
            required : true,
            type : String
        }
    },

    data() {
      return {
        ChartData:  [] ,
        chartOptions: {
          title: this.title,
          is3D: true,
        },
      };
    },

    computed: {
        getGoogleChartData() {
            return JSON.parse(JSON.stringify(this.googleChartData));
        }
    },

    mounted(){
        const dados = JSON.parse(this.responses);
        // Montando o array no formato desejado para o Google Charts
        const googleChartData = [['Resposta', 'Quantidade']];
        // Iterando sobre os dados fornecidos para adicionar ao array no formato desejado
        for (const chave in dados) {
            if (dados.hasOwnProperty(chave)) {
                const item = dados[chave];
                googleChartData.push([item.text, parseInt(item.count_value)]);
            }
        }
        this.ChartData = googleChartData;
    }
  };
  </script>
<style>
    .template{
        max-width: 90%;
    }
</style>
