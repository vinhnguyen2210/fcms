<template>

    <div class="section">
        <div class="container">
        <div class="columns">
            <div class="column is-4">
                <div class="image is-2by2">
                    <img src="https://placehold.it/500x500">
                </div>
            </div>
            <div class="column is-7 is-offset-1">
                <div class="title is-2">{{ model.contact_name }}</div>
                <p class="title is-3 has-text-muted">{{ model.job_title }}</p>
                <hr>
                <br>
                <p>{{ model.description }}</p>
                <br>
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="has-text-right">
                            <strong>Email Address</strong>
                        </td>
                        <td>{{ model.email_address }}</td>
                    </tr>
                    <tr>
                        <td class="has-text-right">
                            <strong>Company</strong>
                        </td>
                        <td>{{ model.company }}</td>
                    </tr>
                    <tr>
                        <td class="has-text-right">
                            <strong>Phone Number</strong>
                        </td>
                        <td>{{ model.mobile }}</td>
                    </tr>
                    <tr>
                        <td class="has-text-right">
                            <strong>Website</strong>
                        </td>
                        <td>{{ model.website }}</td>
                    </tr>
                    </tbody>
                </table>
                <p>
                    <router-link :to="'/contacts/' + model.id + '/edit'" class="button is-primary">
                        <span class="icon">
                            <i class="fa fa-edit"></i>
                        </span>
                    </router-link>
                    <button class="button is-danger" @click="remove">
                        <span class="icon">
                            <i class="fa fa-trash"></i>
                        </span>
                    </button>
                </p>
            </div>
        </div>
    </div>
</div>

</template>
<style>
    .has-text-muted {
      color: #95A5A6;
    }
</style>
<script>

export default{
    name: 'ContactShow',
    data() {
        return {
            model: {},
            resource: 'contacts',
            redirect: '/dashboard/contacts'
        }
    },
    beforeMount() {
        this.fetchData()
    },
    watch: {
        '$route': 'fetchData'
    },
    methods: {
        remove() {
            var vm = this
            axios.delete(`/api/${this.resource}/${this.$route.params.id}`)
            .then(function(response) {
                if(response.data.deleted) {
                    vm.$swal(
                        'Deleted Successfully!',
                        'You will now redirect back to contacts list!',
                        'success'
                    )
                    vm.$router.push(vm.redirect)
                }
            })
            .catch(function(error) {
                console.log(error)
            })
        },
        fetchData() {
            var vm = this
            axios.get(`/api/${this.resource}/${this.$route.params.id}`)
                .then(function(response) {
                    Vue.set(vm.$data, 'model', response.data.model)
                })
                .catch(function(error) {
                    console.log(error)
                })
        }
    }
}

</script>
