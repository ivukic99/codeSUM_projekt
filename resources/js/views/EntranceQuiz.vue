<template>
  <div>
      <Navbar />

      <QuestionBox 
      	v-if="getEntryQuestions.length"
      	:questions="getEntryQuestions"
      	:next="next"
      	:back="back"
      	:step="index"
      />

      
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
    		score: 0
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
    	next(selectedIndex){
    		this.index++
    		//Promijeniti kada se nadoda vrijesnost odgovra u bazi podataka
    		if(selectedIndex == null) selectedIndex = 0
    		this.score += selectedIndex
    	},
    	back(){
    		this.index--
    	}
    }
}
</script>

<style>
</style>