<template>
  <v-app>
    <NavbarAdmin />
    <v-container>
      <div class="child-container">
        <v-img
          src="https://i.ibb.co/3FhJxVq/undraw-work-in-progress-uhmv.png"
        ></v-img>
      </div>

      <!--{{ getUserDetails }}-->
    </v-container>
  </v-app>
</template>

<script>
import { mapGetters } from "vuex";
import NavbarAdmin from "../../../components/app/NavbarAdmin";
export default {
  name: "Admin",
  components: {
    NavbarAdmin,
  },
  computed: {
    ...mapGetters(["getUserDetails"]),
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