<template>
    <div class="row">
        <div class="col-2">
            <nav class="nav flex-column">
                <a
                    class="nav-link"
                    href="#"
                    @click="switchView('profile-component')"
                >Profile</a>
                <a
                    class="nav-link"
                    href="#"
                    @click="switchView('ssh-component')"
                >SSH Key</a>
                <a
                    class="nav-link"
                    href="#"
                    @click="switchView('dns-component')"
                >DNS Providers</a>
            </nav>
        </div>
        <div class="col-10">
            <keep-alive include="home">
                <component :is="currentVue"></component>
            </keep-alive>
            <FlashMessage position="left bottom"></FlashMessage>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import FlashMessage from '@smartweb/vue-flash-message';
    Vue.use(axios);
    Vue.use(FlashMessage);

    export default {
        name: "SettingsComponent",
        data() {
            return {
                currentVue: 'profile-component'
            }
        },
        methods: {
            switchView: function(view) {
                this.currentVue = view
            }
        }
    }
</script>

<style scoped>

</style>
