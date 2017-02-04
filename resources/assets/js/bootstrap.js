import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueSweetAlert from 'vue-sweetalert'

window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(VueSweetAlert);

window.axios = axios;
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};
