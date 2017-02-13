import './bootstrap';
import App from './App.vue';
import router from './routes';
import auth from './auth';

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (auth.user.authenticated == false) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next()
    }
});

const app = new Vue({
    el: '#root',
    components: { App },
    template: '<app></app>',
    router: router
});
