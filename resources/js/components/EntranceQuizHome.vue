<template>
  <div>
      <Navbar />

      <div class="grid-container">

          <div class="first grid-child d-flex justify-center align-center" style="background: #eddcd2;">
              <v-img src="https://iili.io/KsmLB9.png" max-width="600px"></v-img>
          </div>

          <div class="grid-child d-flex justify-center align-center" style="background: #457b9d;">
              <div class="d-flex justify-center align-center flex-column" style=" max-width: 500px;">
                <div>
                  <p class="start-text">Saznajte  koja karijera programiranja je za vas, koji programski jezici i smjerovi.</p>
                </div>
                <div class="button-container d-flex justify-center">
                  <v-btn rounded color="yellow" class="start-button"><span class="button-text" @click="enterQuiz">Pokreni kviz</span></v-btn>
                </div>
              </div>
          </div>
        
      </div>
      

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

<style scoped>

  .start-button{
    padding: 30px !important;
    width: 250px;
  }

  .button-text{
    color: black; 
    font-size: 18px;
  }

  .start-text{
    color: white; 
    font-size: 20px; 
    font-weight: bold; 
    text-align: center;
  }

  .grid-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }

  .grid-child{
    height: 100vh;
  }

  .button-container{
    width: 250px;
    padding: 30px;
  }


  @media only screen and (max-width: 992px) {
    .first{
      display: none !important;
    }

    .grid-container {
      display: grid;
      grid-template-columns: 1fr;
    }
  }
</style>