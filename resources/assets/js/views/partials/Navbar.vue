<template>
    <nav class="nav has-shadow custom-color">
        <div class="container">
            <div class="nav-left">
                <router-link class="nav-item" :to="{ name: 'home' }">
                    <img src="/images/logo.png" alt="FCMS logo">
                </router-link>
            </div>
            <span class="nav-toggle">
              <span></span>
              <span></span>
              <span></span>
            </span>
            <div class="nav-right nav-menu">
                <router-link class="nav-item is-tab" :to="{ name: 'register' }" v-if="!auth.user.authenticated">Register</router-link>
                <router-link class="nav-item is-tab" :to="{ name: 'login' }" v-if="!auth.user.authenticated">Login</router-link>
                <a class="nav-item is-tab" v-if="auth.user.authenticated">
                    <figure class="image is-16x16" style="margin-right: 8px;">
                        <img src="http://bulma.io/images/jgthms.png">
                    </figure>
                    Hi, {{ auth.user.profile.name }}
                </a>
                <a class="nav-item is-tab" v-if="auth.user.authenticated" href="javascript:void(0)" @click="logout">
                    <span class="icon is-small">
                        <i class="fa fa-sign-out"></i>
                    </span>
                    Logout
                </a>
            </div>
        </div>
    </nav>
</template>
<style>
    nav.custom-color {
        background: #f9f9f9;
    }
</style>
<script>

import auth from '../../auth.js'

export default {

    data() {
        return {
            auth: auth
        }
    },

    methods: {
        logout() {
            auth.logout()
        }
    },

    mounted() {
        auth.check()
    }
}

</script>
