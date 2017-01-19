<template>
    <div id="root">

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
                    <a class="nav-item is-active">
                        Home
                    </a>
                    <a class="nav-item">
                        Examples
                    </a>
                    <a class="nav-item">
                        Documentation
                    </a>
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

        <div class="container">
            <div class="columns">
                <div class="column is-one-quarter">
                    <aside class="menu">
                        <p class="menu-label">
                            Dashboard
                        </p>
                        <ul class="menu-list">
                            <li>
                                <router-link to="/" exact>Home</router-link>
                            </li>
                            <li>
                                <router-link to="/contacts">Contacts</router-link>
                            </li>
                        </ul>
                        <p class="menu-label">
                            Administration
                        </p>
                        <ul class="menu-list">
                            <li><a>Team Settings</a></li>
                            <li>
                                <a class="is-active">Manage Your Team</a>
                                <ul>
                                    <li><a>Members</a></li>
                                    <li><a>Plugins</a></li>
                                    <li><a>Add a member</a></li>
                                </ul>
                            </li>
                            <li><a>Invitations</a></li>
                            <li><a>Cloud Storage Environment Settings</a></li>
                            <li><a>Authentication</a></li>
                        </ul>
                        <p class="menu-label">
                            Transactions
                        </p>
                        <ul class="menu-list">
                            <li><a>Payments</a></li>
                            <li><a>Transfers</a></li>
                            <li><a>Balance</a></li>
                        </ul>
                    </aside>
                </div>

                <div class="column">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>

</template>
