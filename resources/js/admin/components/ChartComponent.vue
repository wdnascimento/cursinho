<template class="template">
    <div class="row">
        <div class="col-12">
            <GChart
                type="PieChart"
                :data="JSON.parse(JSON.stringify(this.googleChartData))"
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
        googleChartData:  [] ,
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
        const jsonData = JSON.parse(this.responses);
        const tmp = Object.values(jsonData).map(item => [item.text, item.count_value]);
        tmp.unshift(['Resposta', 'Quantidade']);
        this.googleChartData = Array.from(tmp);
    }
  };
  </script>
<style>
    .template{
        max-width: 90%;
    }
</style>
