import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./Front'),
        children: [
            {
                path: '',
                name: 'home',
                component: require('./views/Home')
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
        ]
    },
    {
        path: '/dashboard',
        meta: { requiresAuth: true },
        component: require('./Dashboard'),
        children: [
            {
                path: '',
                name: 'dashboard',
                component: require('./views/dashboard/Index')
            },
            {
                path: 'contacts',
                name: 'contacts',
                component: require('./views/dashboard/Contacts')
            }
        ]
    }
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active',
    mode: 'history'
})
