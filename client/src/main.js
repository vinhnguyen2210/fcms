import './bootstrap';
import App from './App.vue';
import router from './routes';
import auth from './auth';

router.beforeEach(
    (to,from,next) => {
        if (to.matched.some(record => record.meta.forVisitors)) {
            if ( localStorage.getItem('id_token') != null) {
                next({
                    name: 'dashboard'
                })
            } else next()
        }
        else if (to.matched.some(record => record.meta.requiresAuth)) {
            if (localStorage.getItem('id_token') == null) {
                next({
                    name: 'login'
                })
            } else next()
        }
        else  next()
    }
);

const app = new Vue({
    el: '#app',
    components: { App },
    template: '<app></app>',
    router: router,
    mounted() {
        auth.check()
    }
});
