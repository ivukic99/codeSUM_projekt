<template>
  <div>

	<v-container>
	   <v-stepper v-model="step">
	    <v-stepper-header>
	        <template v-for="n in steps">
	          <v-stepper-step
	            :key="`${n}-step`"
	            :complete="step > n"
	            :step="n"
	            editable
	          >
	            
	          </v-stepper-step>

	          <v-divider
	            v-if="n !== steps"
	            :key="n"
	          ></v-divider>
	        </template>
      	</v-stepper-header>

	    <v-stepper-items>
	      <v-stepper-content v-for="(question, index) in questions" :key="index" :step="question.step">
	        <v-card
	          class="mb-12"
	          color="grey lighten-1"
	          height="200px"
	        >
	        	<v-row style="height: 100%;">
	        		<v-col cols="12" class="d-flex justify-center align-center" style="margin: 15px;">
	        			<p class="text-h6">{{ question.Opis }}</p>
	        		</v-col>
	        	</v-row>

	        </v-card>

	        <v-sheet>
	        	<v-container class="pa-15">
		        	<div v-for="(answer, idx) in question.answers" :key="idx" class="answer__button" @click = "selectAnswer(idx)" :class=" selectedIndex == idx ? 'selected' : '' ">
		        		{{ answer.Opis }}
		        	</div>
	        	</v-container>
	        </v-sheet>

	        <div class="d-flex justify-end">
	        	<v-btn
	        	  v-if="question.step == steps"
		          color="primary"
		          @click="finishQuiz"
		          class="mr-3"
		        >
		          Završi kviz
		        </v-btn>
		        <v-btn
		          color="primary"
		          @click="next(selectedIndex)"
		          class="mr-3"
		        >
		          Sljedeće
		        </v-btn>

		        <v-btn @click="back" color="red">
		          Nazad
		        </v-btn>
	        </div>
	      </v-stepper-content>
	    </v-stepper-items>
	  </v-stepper>
	</v-container>

	<div v-if="finishedQuiz">Yey!!</div>

  </div>
</template>

<script>
export default {
	props:{
		step: Number,
		questions: Array,
		next: Function,
		back: Function
	},
	data () {
      return {
      	selectedIndex: null,
      	finishedQuiz: false
      }
    },
    watch: {
        questions:{
            immediate: true,
            handler(){
                this.selectedIndex = null
            }
            
        }
    },
    computed: {
    	steps(){
    		return this.questions[this.questions.length - 1].step
    	}
    },
    methods:{
    	selectAnswer(index){
    		this.selectedIndex = index
    		console.log(index)
    	},
    	finishQuiz(){
    		console.log("Yey!!!")
    		this.finishedQuiz = true 
    	}
    },
}
</script>

<style>
	.answer__button{
		background: lightgrey;
		padding: 20px;
		border-radius: 10px;
		text-align:center;
		margin-top: 15px;
		font-size: 20px;
	}

	.selected{
		background: darkgrey;
	}
</style>