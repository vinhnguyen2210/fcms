import './bootstrap';
import App from './App.vue';
import router from './routes';

const app = new Vue({
    el: '#root',
    components: { App },
    template: '<app></app>',
    router
});
