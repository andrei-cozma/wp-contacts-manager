<template>
    <div id="main">
        <app-nav></app-nav>
        <div class="content">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import AppNav from './Nav.vue';

    export default {
        name: 'main-app',
        components: {AppNav}
    }
</script>
