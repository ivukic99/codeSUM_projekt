<template>
  <div>
    <NavbarUser />

    <v-container>
      <!--{{ getUserDetails.details }}-->
      <div class="child-container">
        <v-img
          src="https://i.ibb.co/3FhJxVq/undraw-work-in-progress-uhmv.png"
        ></v-img>
      </div>
    </v-container>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import NavbarUser from "../../components/app/NavbarUser.vue";
export default {
  components: {
    NavbarUser,
  },
  computed: {
    ...mapGetters(["getUserDetails"]),
  },
  created() {
    this.$store.dispatch("setUserDetails");
  },
};
</script>

<style scoped>
.child-container {
  text-align: justify;
  justify-content: center;
  align-items: center;
}
</style>