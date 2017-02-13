<template>
    <div>
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
                <router-view></router-view>
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
    export default {

    }
</script>
