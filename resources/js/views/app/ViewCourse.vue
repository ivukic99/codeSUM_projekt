<template>
  <div>
      <Navbar />

      <div class="child-container">
        <v-img
          src="https://i.ibb.co/3FhJxVq/undraw-work-in-progress-uhmv.png"
        ></v-img>
      </div>
      
  </div>
</template>

<script>
import Navbar from '../../components//Navbar.vue';
export default {
    components: {
        Navbar
    }

}
</script>

<style scoped>
.child-container {
  text-align: justify;
  justify-content: center;
  align-items: center;
}
</style>