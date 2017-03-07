<template>
    <div class="column is-4 is-offset-4 box">

        <h3 class="title">Register New User</h3>

        <form @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
            <p class="control has-icon">
                <input class="input" :class="{ 'is-danger': errors.has('name') }" name="name" type="text" placeholder="Username" v-model="name">
                <span class="icon is-small">
                    <i class="fa fa-user"></i>
                </span>
                <span class="help is-danger" v-if="errors.has('name')" v-text="errors.get('name')"></span>
            </p>
            <p class="control has-icon">
                <input class="input" :class="{ 'is-danger': errors.has('email') }" name="email" type="email" placeholder="Email" v-model="email">
                <span class="icon is-small">
                    <i class="fa fa-envelope"></i>
                </span>
                <span class="help is-danger" v-if="errors.has('email')" v-text="errors.get('email')"></span>
            </p>
            <p class="control has-icon">
                <input class="input" :class="{ 'is-danger': errors.has('password') }" name="password" type="password" placeholder="Password" v-model="password">
                <span class="icon is-small">
                    <i class="fa fa-lock"></i>
                </span>
                <span class="help is-danger" v-if="errors.has('password')" v-text="errors.get('password')"></span>
            </p>
            <p class="control has-icon">
                <input class="input" :class="{ 'is-danger': errors.has('password_confirmation') }" name="password_confirmation" type="password" placeholder="Confirm Password" v-model="password_confirmation">
                <span class="icon is-small">
                    <i class="fa fa-repeat"></i>
                </span>
                <span class="help is-danger" v-if="errors.has('password_confirmation')" v-text="errors.get('password_confirmation')"></span>
            </p>
            <p class="control">
                <button class="button is-success" :class="{ 'is-disabled': errors.any() }">
                    Register
                </button>
            </p>
            <p class="has-text-centered">
                <router-link :to="{ name: 'login' }">Login</router-link>
                |
                <router-link to="#">Need helps?</router-link>
            </p>
        </form>

    </div>
</template>

<style>
    .swal2-spacer {
        background-color: transparent !important;
    }
</style>

<script>
    export default {
        data () {
            return {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                errors: new Errors()
            }
        },

        methods: {
            onSubmit() {
                axios.post('/api/register', this.$data)
                    .then(this.onSuccess)
                    .catch(error => this.errors.record(error.response.data));
            },

            onSuccess(response) {
                this.$swal(
                    response.data.message,
                    'You can go and login now!',
                    'success'
                )

                this.$router.push({
                    name: 'login'
                })
            }
        }
    }
</script>
