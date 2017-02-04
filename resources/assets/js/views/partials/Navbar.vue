<template>
    <header class="nav">
        <div class="container">
            <div class="nav-left">
                <a class="nav-item">
                    <img src="https://cdn.wpmayor.com/wp-content/uploads/2014/03/ContactUs-logo.png" alt="">
                </a>
            </div>
            <span class="nav-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
            <div class="nav-right nav-menu">
                <router-link class="nav-item" :to="{ name: 'home' }">Home</router-link>
                <router-link class="nav-item" :to="{ name: 'register' }">Register</router-link>
                <router-link class="nav-item" :to="{ name: 'login' }">Login</router-link>
                <span class="nav-item">
                        <a class="button is-primary is-inverted">
                            <span class="icon">
                                <i class="fa fa-github"></i>
                            </span>
                            <span>Download</span>
                        </a>
                    </span>
            </div>
        </div>
    </header>
</template>

<script>
    export default{

    }
</script>
