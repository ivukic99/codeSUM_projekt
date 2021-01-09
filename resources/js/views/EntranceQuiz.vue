<template>
  <div>
      <Navbar />

      <h1>Ovo je ulazni kviz</h1>

      <QuestionBox 
      	v-if="getEntryQuestions.length"
      	:questions="getEntryQuestions"
      	:next="next"
      	:back="back"
      	:step="index"
      />

      <v-container>{{ getEntryQuestions }}</v-container>

      
  </div>
</template>

<script>
import Navbar from '../components/Navbar.vue';
import QuestionBox from '../components/QuestionBox.vue';
import { mapGetters } from 'vuex';
export default {
    components: {
        Navbar,
        QuestionBox
    },
    data(){
    	return{
    		index: 1,
    	}
    },
    computed: {
        ...mapGetters([
            'getEntryQuestions'
        ])
      },
    created(){
    	this.$store.dispatch('setEntryQuestions')
    },
    methods:{
    	next(){
    		this.index++;
    	},
    	back(){
    		this.index--;
    	}
    }
}
</script>

<style>
</style>