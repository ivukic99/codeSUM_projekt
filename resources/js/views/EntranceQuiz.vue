<template>
  <div>
      <Navbar />

      <EntranceQuizHome
        :enterQuiz="enterQuiz"
        v-show="entrance == false"
       />

      <QuestionBox 
      	v-if="getEntryQuestions.length && entrance"
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
import EntranceQuizHome from '../components/EntranceQuizHome.vue';
import { mapGetters } from 'vuex';
export default {
    components: {
        Navbar,
        QuestionBox,
        EntranceQuizHome
    },
    data(){
    	return{
    		index: 1,
    		score: 0,
        entrance: false
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
    	},
      enterQuiz(){
        this.entrance = true
      }
    }
}
</script>

<style>
</style>