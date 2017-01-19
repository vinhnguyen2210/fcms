import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/Home')
    },
    {
        path: '/contacts',
        component: require('./views/Contacts')
    }
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
})
