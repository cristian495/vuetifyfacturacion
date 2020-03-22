
import Home from './views/Home.vue';
import Login from './views/Login.vue';

export  const  routes = [
    {
        path: "/",
        component: Home,
        meta:{
            requiresAuth: true
        }
    },
    {
        path: "/login",
        component: Login,
    }
]