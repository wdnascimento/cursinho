<template class="template">
    <div class="row">
        <div class="col-12">
            <GChart
                type="PieChart"
                :data="chartData"
                :options="chartOptions"
                :width="400"
                :height="300"
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

        googleChartData: null ,
        chartOptions: {
          title: this.title,
          is3D: true,
        },
      };
    },

    computed: {
        chartData() {
            return this.googleChartData;
        },
    },
    created(){
        // Convertendo a string JSON para um objeto JavaScript
        const jsonData = JSON.parse(this.responses);
        // Formatando os dados no formato aceito pelo Google Charts (array de arrays)
        const googleChartData = Object.values(jsonData).map(item => [item.text, item.count_value]);
        googleChartData.unshift(['Resposta', 'Quantidade']);
        this.googleChartData = googleChartData ;
    }
  };
  </script>
<style>
    .template{
        max-width: 90%;
    }
</style>
