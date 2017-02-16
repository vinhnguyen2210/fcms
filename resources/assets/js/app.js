import './bootstrap';
import App from './App.vue';
import router from './routes';
import auth from './auth';

router.beforeEach(
    (to,from,next) => {
        if (to.matched.some(record => record.meta.forVisitors)) {
            if (auth.user.authenticated == true) {
                next({
                    name: 'dashboard'
                })
            } else next()
        }
        else if (to.matched.some(record => record.meta.requiresAuth)) {
            if (auth.user.authenticated == false) {
                next({
                    name: 'login'
                })
            } else next()
        }
        else  next()
    }
);

const app = new Vue({
    el: '#root',
    components: { App },
    template: '<app></app>',
    router: router,
    mounted() {
        auth.check()
    }
});
