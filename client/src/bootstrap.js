import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueSweetAlert from 'vue-sweetalert';
import auth from './auth.js';
import {Errors} from './errors.js';
import cookie from "cookie";

window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(VueSweetAlert);

window.auth = auth;
window.Errors = Errors;
window.axios = axios;
require('axios-base-url')('http://localhost:8000');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': cookie.parse(document.cookie)['XSRF-TOKEN'],
    'Authorization': 'Bearer ' + localStorage.getItem('id_token'),
};
