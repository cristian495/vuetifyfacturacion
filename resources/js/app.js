require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Vuetify from 'vuetify';
import {routes} from './routes';
import StoreData from './store';
import MainApp from './views/MainApp.vue';

Vue.use(VueRouter);
Vue.use(Vuex)
Vue.use(Vuetify);

const store = new Vuex.Store(StoreData)


const router = new VueRouter({
    mode: 'history',
    routes,
});

router.beforeEach((to,from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    const currentUser = store.state.currentUser;

    if(requiresAuth && !currentUser){
        next ('/login');        
    } else if (to.path == '/login' && currentUser){
        next ('/');
    }else {
        next ();
    }
});
/*
router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    const currentUser = store.state.currentUser;

    if(requiresAuth && !currentUser) {
        next('/login');
    } else if(to.path == '/login' && currentUser) {
        next('/');
    } else {
        next();
    }
})
*/
const app = new Vue({
    el: '#app',
    router,
    store,
    vuetify: new Vuetify(),
    components: {
        'main-app':MainApp,
    },
});
