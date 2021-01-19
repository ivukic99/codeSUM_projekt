<template>
    <v-app>
        <NavbarAdmin />
        <v-container>
            <h5>Ovaj dio je još uvijek u izradi!</h5>

            <!--{{ getUserDetails }}-->
        </v-container>
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