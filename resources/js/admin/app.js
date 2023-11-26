require('../bootstrap');

import { createApp } from 'vue';

import ButtonStudentComponent from './components/ButtonStudentComponent';
import ButtonPaymentComponent from './components/ButtonPaymentComponent';

import ModalPaymentComponent from './components/ModalPaymentComponent';
import ModalStudentComponent from './components/ModalStudentComponent';
import ChartComponent from './components/ChartComponent';

import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

// import { GChart } from 'vue-google-charts';

const app = createApp({});

app.use(VueToast);
// app.use(GChart);

//register the component
app.component('button-payment-component', ButtonPaymentComponent);
app.component('button-student-component', ButtonStudentComponent);

app.component('modal-payment-component', ModalPaymentComponent);
app.component('modal-student-component', ModalStudentComponent);
app.component('chart-component', ChartComponent);

app.mount('#app');
