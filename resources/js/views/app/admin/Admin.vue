<template>
    <v-app>
        <NavbarAdmin />
        <h1>Admin page</h1>

        {{ getUserDetails }}
    </v-app>
</template>

<script>
import { mapGetters } from 'vuex';
import NavbarAdmin from '../../../components/app/NavbarAdmin';
export default {
    name: "Admin",
    components: {
        NavbarAdmin,
    },
    computed: {
        ...mapGetters([
            'getUserDetails'
        ])
    }
}
</script>

<style>

</style>