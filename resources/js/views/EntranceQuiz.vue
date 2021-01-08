<template>
  <div>
      <Navbar />

      <h1>Ovo je ulazni kviz</h1>

      <QuestionBox />
      
  </div>
</template>

<script>
import Navbar from '../components/Navbar.vue';
import QuestionBox from '../components/QuestionBox.vue';
export default {
    components: {
        Navbar,
        QuestionBox
    }
}
</script>

<style>
</style>