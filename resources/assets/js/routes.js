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
                meta:{forVisitors:true},
                component: require('./views/auth/Register')
            },
            {
                path: '/login',
                name: 'login',
                meta:{forVisitors:true},
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
                component: require('./views/dashboard/contacts/Index')
            },
            {
                path: '/contacts/create',
                component: require('./views/dashboard/contacts/form.vue')
            },
            {
                path: '/contacts/:id/edit',
                component: require('./views/dashboard/contacts/form.vue'),
                meta: {mode: 'edit'}
            },
        ]
    }
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active',
    mode: 'history'
})
