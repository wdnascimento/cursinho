require('../bootstrap');

import { createApp } from 'vue';



// import ButtonStudentComponent from './components/ButtonStudentComponent';
import ButtonPaymentComponent from './components/ButtonPaymentComponent';
// import ButtonJobComponent from './components/ButtonJobComponent';
import ModalPaymentComponent from './components/ModalPaymentComponent';

// import JobModalComponent from './components/JobModalComponent';
// import ObservationModalComponent from './components/ObservationModalComponent';

import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const app = createApp({});

app.use(VueToast);

//register the component

app.component('button-payment-component', ButtonPaymentComponent);
// app.component('student-modal-component', StudentModalComponent);
// app.component('button-job-component', ButtonJobComponent);
app.component('modal-payment-component', ModalPaymentComponent);

// app.component('job-modal-component', JobModalComponent);
// app.component('observation-modal-component', ObservationModalComponent);

app.mount('#app');
