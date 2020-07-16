import Vue from 'vue';
import router from './router';
import App from './components/App';
import BootstrapVue from 'bootstrap-vue' 
// import VueLoading from 'vue-loading-template'


require('./bootstrap');

Vue.use(BootstrapVue)
// Vue.use(VueLoading, /** options **/)

const app = new Vue({
    el: '#app',
    router, 
    components: {
        App
    },
});
