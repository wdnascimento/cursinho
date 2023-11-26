<template class="template">
    <div class="row">
        <div class="col-12">
            <GChart
                type="PieChart"
                :data="this.googleChartData"
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

    created(){
        const jsonData = JSON.parse(this.responses);
        const googleChartData = Object.values(jsonData).map(item => [item.text, item.count_value]);
        googleChartData.unshift(['Resposta', 'Quantidade']);
        this.$data.googleChartData = googleChartData ;
    }
  };
  </script>
<style>
    .template{
        max-width: 90%;
    }
</style>
