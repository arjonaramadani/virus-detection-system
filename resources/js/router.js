import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from './components/ExampleComponent'
import Register from './components/Register'
import Login from './components/Login'
import AboutUs from './components/AboutUs'
import Covid from './components/Covid'
import Survey from './components/Survey'
import Dashboard from './components/Dashboard'


Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: ExampleComponent },
        { path: '/register', component: Register },
        { path: '/login', component: Login },
        { path: '/about-us', component: AboutUs },
        { path: '/covid', component: Covid },
        { path: '/survey', component: Survey },
        { path: '/dashboard', component: Dashboard },
    ],
    mode: 'history'
});