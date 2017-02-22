<template>
    <div class="column is-4 is-offset-1">
        <h3 class="title">{{title}}</h3>
        <div class="panel-body">
            <form class="form" @submit.prevent="save" @keydown="errors.clear($event.target.name)">

                <label class="label">Contact Name</label>
                <p class="control has-icon has-icon-right">
                    <input class="input" :class="{ 'is-danger': errors.has('contact_name') }" type="text" placeholder="Enter Contact Name" v-model="form.contact_name">
                    <span class="icon is-small">
                        <i class="fa fa-user"></i>
                    </span>
                    <span class="help is-danger"
                          v-if="errors.has('contact_name')"
                          v-text="errors.get('contact_name')">
                    </span>
                </p>

                <label class="label">Email</label>
                <p class="control has-icon has-icon-right">
                    <input class="input" type="email" placeholder="Enter Contact Email" v-model="form.email_address">
                    <span class="icon is-small">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <span class="help is-danger"
                          v-if="errors.has('email_address')"
                          v-text="errors.get('email_address')">
                    </span>
                </p>

                <label class="label">Job Title</label>
                <p class="control has-icon has-icon-right">
                    <input class="input" type="text" placeholder="Enter Contact Job Title" v-model="form.job_title">
                    <span class="icon is-small">
                        <i class="fa fa-id-card"></i>
                    </span>
                </p>

                <label class="label">Company</label>
                <p class="control has-icon has-icon-right">
                    <input class="input" type="text" placeholder="Enter Contact Job Company" v-model="form.company">
                    <span class="icon is-small">
                        <i class="fa fa-building"></i>
                    </span>
                </p>

                <label class="label">Website</label>
                <p class="control has-icon has-icon-right">
                    <input class="input" type="text" placeholder="Enter Your Website Url" v-model="form.website">
                    <span class="icon is-small">
                        <i class="fa fa-globe"></i>
                    </span>
                    <span class="help is-danger"
                          v-if="errors.has('website')"
                          v-text="errors.get('website')">
                    </span>
                </p>

                <label class="label">Mobile</label>
                <p class="control has-icon has-icon-right">
                    <input class="input" type="text" placeholder="Enter Your Mobile Number" v-model="form.mobile">
                    <span class="icon is-small">
                        <i class="fa fa-phone"></i>
                    </span>
                    <span class="help is-danger"
                          v-if="errors.has('mobile')"
                          v-text="errors.get('mobile')">
                    </span>
                </p>

                <label class="label">Biography</label>
                <p class="control has-icon has-icon-right">
                    <textarea class="textarea" placeholder="Write Something About You..." v-model="form.description"></textarea>
                    <span class="icon is-small">
                        <i class="fa fa-birthday-cake"></i>
                    </span>
                </p>

                <p class="control">
                    <button class="button is-success" :class="{ 'is-disabled': errors.any() }">
                        Save
                    </button>
                </p>

            </form>
        </div>
    </div>
</template>
<script>

export default {
    name: 'ContactForm',
    data() {
        return {
            auth: auth,
            form: {},
            errors: new Errors(),
            option: {},
            title: 'Create New Contact',
            initialize: '/api/contacts/create',
            redirect: '/dashboard/contacts',
            store: '/api/contacts',
            method: 'post',
            message: 'Created Successfully!'
        }
    },
    beforeMount() {
        if(this.$route.meta.mode === 'edit') {
            this.title = 'Edit Contact'
            this.initialize = '/api/contacts/' + this.$route.params.id + '/edit'
            this.store = '/api/contacts/' + this.$route.params.id
            this.method = 'put',
            this.message = 'Updated Successfully!'
        }
        this.fetchData()
    },
    watch: {
        '$route': 'fetchData'
    },
    methods: {
        fetchData() {
            var vm = this
            axios.get(this.initialize)
                .then(function(response) {
                    Vue.set(vm.$data, 'form', response.data.form)
                    Vue.set(vm.$data, 'option', response.data.option)
                })
                .catch(function(error) {
                    console.log(error)
                })
        },
        save() {
            var vm = this
            axios[this.method](this.store, this.form)
                .then(function(response) {
                    if(response.data.saved) {
                        vm.$swal(
                            vm.message,
                            'You will now redirect back to contacts list!',
                            'success'
                        )
                        vm.$router.push(vm.redirect)
                    }
                })
                .catch(error => this.errors.record(error.response.data));
        }
    }
}

</script>
