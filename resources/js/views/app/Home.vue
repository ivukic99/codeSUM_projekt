<template>
    <div>
        <NavbarUser />
        
        <v-container>
            <!--{{ getUserDetails.details }}-->
            <h5>Ovaj dio je još uvijek u izradi!</h5>
        </v-container>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import NavbarUser from '../../components/app/NavbarUser.vue';
export default {
    components:{
        NavbarUser
    },
    computed: {
        ...mapGetters([
            'getUserDetails'
        ])
    },
    created(){
        this.$store.dispatch('setUserDetails')
    }
}
</script>

<style>

</style>