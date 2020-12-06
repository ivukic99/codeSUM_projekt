import Vue from 'vue';
import Router from 'vue-router';

import Landing from '../views/Landing.vue';
import Auth from '../views/auth/Auth.vue';
import Home from '../views/Home.vue';

Vue.use(Router);

const routes = [
    {
        path: '/',
        name: 'Naslovnica',
        component: Landing
    },
    {
        path: '/auth',
        name: 'Auth',
        component: Auth
    },
    {
        path: '/naslovnica',
        name: 'Pocetna',
        component: Home
    },
]

export default new Router({
    mode: 'history',
    routes
});