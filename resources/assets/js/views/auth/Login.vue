<template>
    <div class="column is-half box">
        <h3 class="title">Login To Dashboard</h3>
        <div class="notification is-warning" v-if="errors.has('error')" v-show="isVisible">
            <button class="delete" @click="hideModal"></button>
            There was an error, unable to sign in with those credentials.
        </div>
        <form @submit.prevent="login" @keydown="errors.clear($event.target.name)">
            <p class="control has-icon">
                <input class="input" :class="{ 'is-danger': errors.has('email') }" name="email" type="email"
                       placeholder="Email" v-model="email">
                <span class="icon is-small">
                    <i class="fa fa-envelope"></i>
                </span>
                <span class="help is-danger" v-if="errors.has('email')" v-text="errors.get('email')"></span>
            </p>
            <p class="control has-icon">
                <input class="input" :class="{ 'is-danger': errors.has('password') }" name="password" type="password"
                       placeholder="Password" v-model="password">
                <span class="icon is-small">
                    <i class="fa fa-lock"></i>
                </span>
                <span class="help is-danger" v-if="errors.has('password')" v-text="errors.get('password')"></span>
            </p>
            <p class="control">
                <button class="button is-success">
                    Login
                </button>
            </p>
            <p class="has-text-centered">
                <router-link :to="{ name: 'register' }">Register</router-link>
                |
                <router-link to="#">Need helps?</router-link>
            </p>
        </form>
    </div>
</template>

<script>

import auth from '../../auth.js';
import {Errors} from '../../errors.js';

export default {

    data() {
        return {
            email: '',
            password: '',
            errors: new Errors(),
            isVisible: true
        }
    },

    methods: {
        login() {
            auth.login(this.email, this.password, this.errors)
        },

        hideModal() {
            this.isVisible = false;
        }
    }
}

</script>
