<template>
    <section>
        <div class="columns">
            <div class="column is-2">
                <aside-menu></aside-menu>
            </div>

            <div class="column is-10">
                <div class="wrapper">
                    <div class="columns">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import Aside from './views/partials/Aside'

    export default {
        components: {
            'aside-menu': Aside
        }
    }
</script>
