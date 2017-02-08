import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        name: 'home',
        component: require('./views/Home')
    },
    {
        path: '/contacts',
        name: 'contacts',
        meta: { requiresAuth: true },
        component: require('./views/Contacts')
    },
    {
        path: '/register',
        name: 'register',
        component: require('./views/auth/Register')
    },
    {
        path: '/login',
        name: 'login',
        component: require('./views/auth/Login')
    }
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active',
    mode: 'history'
})
