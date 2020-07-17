import Vue from 'vue';
import router from './router';
import App from './components/App';
import BootstrapVue from 'bootstrap-vue' 
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import Vuelidate from 'vuelidate'
// import VueLoading from 'vue-loading-template'


require('./bootstrap');

Vue.use(Vuelidate)
Vue.use(BootstrapVue)
Vue.use(VueFormWizard)
// Vue.use(VueLoading, /** options **/)

const app = new Vue({
    el: '#app',
    router, 
    components: {
        App
    },
});
