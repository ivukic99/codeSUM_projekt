<template>
  <div>
      <Navbar />

      <EntranceQuizHome
        :enterQuiz="enterQuiz"
        v-show="entrance == false"
       />

      <QuestionBox 
      	v-if="entrance"
      	:questions="getEntryQuestions"
      	:next="next"
      	:back="back"
      	:step="index"
        :finishQuiz="finishQuiz"
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
        entrance: false,
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
    	next(selectedIndex, answerValue){
    		this.index++
    		//Promijeniti kada se nadoda vrijesnost odgovra u bazi podataka
    		if(answerValue == null) this.score += 0
    		this.score += answerValue
        console.log(this.score)
    	},
    	back(){
    		this.$router.push({name: 'Naslovnica'})
    	},
      enterQuiz(){
        this.entrance = !this.entrance
      },
      finishQuiz(){
        this.$router.push({ path: `/ulazni_kviz/rezultati/${this.score}` }) 
      }
    }
}
</script>

<style>
</style>