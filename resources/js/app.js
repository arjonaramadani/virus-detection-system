import Vue from 'vue';
import router from './router';
import App from './components/App';
import BootstrapVue from 'bootstrap-vue' 

require('./bootstrap');

Vue.use(BootstrapVue)

const app = new Vue({
    el: '#app',
    router, 
    components: {
        App
    },
});
