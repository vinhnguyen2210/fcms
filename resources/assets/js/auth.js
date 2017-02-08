import router from './routes';

export default {

    user: {
        authenticated: false,
        profile: null
    },

    login(email, password, errors) {
        axios.post(
            'api/login', {
                email: email,
                password: password,
                errors: errors
            })
            .then(response => {
                localStorage.setItem('id_token', response.data.meta.token);
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token');

                this.user.authenticated = true;
                this.user.profile = response.data.data;

                router.push({
                    name: 'home'
                })
            })
            .catch(error => errors.record(error.response.data));
    },

    check() {
        if (localStorage.getItem('id_token') !== null) {
            axios.get(
                'api/user',
            ).then(response => {
                this.user.authenticated = true;
                this.user.profile = response.data.data;
            })
        }
    },

    logout() {
        localStorage.removeItem('id_token');
        this.user.authenticated = false;
        this.user.profile = null;

        router.push({
            name: 'login'
        })
    }
}
