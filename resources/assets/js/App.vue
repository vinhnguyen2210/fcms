<template>
    <div id="root">

        <navbar></navbar>

        <section class="hero is-primary">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        Framgia Contact Manager
                    </h1>
                    <h2 class="subtitle">
                        Contact Management Made Easy - User Friendly CRM
                    </h2>
                </div>
            </div>
        </section>

        <div class="container wrapper">
            <div class="columns">
                <aside-menu></aside-menu>
                <div class="column">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>

</template>

<style>
    .wrapper {
        padding-top: 40px;
    }
</style>

<script>
    import Navbar from './views/partials/Navbar'
    import Aside from './views/partials/Aside'

    export default {
        components: {
            'navbar': Navbar,
            'aside-menu': Aside
        }
    }
</script>
