<template>
  <div>
      <Navbar />

      <h1>Ovo je početni prikaz ulaznog kviza.</h1>

      <v-btn @click="enterQuiz">Kreni</v-btn>

  </div>
</template>

<script>
import Navbar from '../components/Navbar.vue';
export default {
	props: {
		enterQuiz: Function
	},
    components: {
        Navbar
    }

}
</script>

<style>

</style>