<template>
  <div>

	<v-container>
	   <v-stepper v-model="e1">
	    <v-stepper-header>
	        <template v-for="n in steps">
	          <v-stepper-step
	            :key="`${n}-step`"
	            :complete="e1 > n"
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
	      <v-stepper-content step='1'>
	        <v-card
	          class="mb-12"
	          color="grey lighten-1"
	          height="200px"
	        >
	        	<v-row style="height: 100%;">
	        		<v-col cols="12" class="d-flex justify-center align-center" style="margin: 15px;">
	        			<p class="text-h6">Ovo je neko pitanje iz baze podata CodeSUM?</p>
	        		</v-col>
	        	</v-row>

	        </v-card>

	        <v-sheet>
	        	<v-container class="pa-15">
		        	<div class="answer__button">Odgovor 1</div>
		        	<div class="answer__button">Odgovor 2</div>
		        	<div class="answer__button">Odgovor 3</div>
		        	<div class="answer__button">Odgovor 4</div>
	        	</v-container>
	        </v-sheet>

	        <div class="d-flex justify-end">
		        <v-btn
		          color="primary"
		          @click="e1 = 2"
		          class="mr-3"
		        >
		          Continue
		        </v-btn>

		        <v-btn color="red">
		          Cancel
		        </v-btn>
	        </div>
	      </v-stepper-content>
	    </v-stepper-items>
	  </v-stepper>
	</v-container>

  </div>
</template>

<script>
export default {
	data () {
      return {
        e1: 1,
        steps: 5
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
</style>