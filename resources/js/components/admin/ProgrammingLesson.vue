<template>
  <div>

  	<v-container>

	      <div class="d-flex justify-content-between align-center mb-5">
	        <h3>Programske lekcije</h3>
	          <v-btn
	            class="mx-2"
	            fab
	            dark
	            color="#1B4188"
	            @click="goBack;reset()"
	          >
	            <v-icon dark>
	              mdi-login
	            </v-icon>
	          </v-btn>
	        </div>

	        <v-container>
		        <div>
		        	
		        	<v-form>

					<v-text-field
					  v-model="data.name"
					  label="Naziv zadatka"
					  required
					></v-text-field>

					<div class="font-weight-light">Opis zadatka</div>
					<div class="mt-3 mb-3">
						<wysiwyg v-model="data.description" />
					</div>

					<div class="font-weight-light">Challenge funkcija(opcionalno)</div>
					<div class="mt-3 mb-3">
						<wysiwyg v-model="data.challengeFunction" />
					</div>

					<v-text-field
					  v-model="data.result"
					  label="Očekivani rezultat challengeFunkcije"
					  required
					></v-text-field>

					<div class="font-weight-light">Hint</div>
					<div class="mt-3 mb-3">
						<wysiwyg v-model="data.hint" />
					</div>

					<div class="d-flex justify-content-end align-center">
						<v-btn
						  color="success"
						  class="mr-4"
						  @click="saveProgrammingLesson"
						>
						  Spremi
						</v-btn>

						<v-btn
						  color="warning"
						  @click="resetForms"
						>
						  Reset
						</v-btn>
					</div>
					</v-form>

		        </div>
	    	</v-container>

       </v-container>

       <!--Loader-->

        <Loading :active.sync="isLoading" 
            :can-cancel="true" 
            :is-full-page="fullPage">
        </Loading>
      
  </div>
</template>

<script>
import "vue-wysiwyg/dist/vueWysiwyg.css";
import Loading from 'vue-loading-overlay';
export default {
	props:{
		isEditing: Boolean,
		name: String,
		description: String,
		challengeFunction: String,
		hint: String,
		result: String,
		id: Number,
		reset: Function,
		getProgrammingLesson: Function
	},
    components: {
    	Loading,
    },
    data(){
    	return{
    		data: {
    			activateReset: this.activateReset,
    			name: this.name,
    			description: this.description,
    			challengeFunction: this.challengeFunction,
    			hint: this.hint,
    			result: this.result
    		},
    		isLoading: false,
    		fullPage: true
    	}
    },
    methods: {
	saveProgrammingLesson(){
        let courseId = this.$route.params.tecaj_id
        let params = {
            'Naziv': this.data.name,
            'Opis': this.data.description,
            'Hint': this.data.hint,
            'ChallengeFunkcija': this.data.challengeFunction,
            'Rezultat': this.data.result,
        }

        this.isLoading = true

        if(this.isEditing === false){
        	params.Tecaj_id = this.$route.params.tecaj_id
            axios
            .post('programming_lessons/add', params)
            .then((response) => {
              console.log(response.data)
              this.getProgrammingLesson()
              this.reset()
              this.goBack()
              this.isLoading = false
            })
            .catch((err) => {
              console.log("Dogodila se greška!")
            });
        }else{
            params.Tecaj_id = this.$route.params.tecaj_id
            params.Lekcija_id = this.id
            axios
            .post('programming_lessons/save', params)
            .then((response) => {
              console.log(response.data)
              this.getProgrammingLesson()
              this.reset()
              this.goBack()
              this.isLoading = false
            })
            .catch((err) => {
              console.log("Dogodila se greška!")
            });
        }


    },
    goBack () {
      this.$emit('goBack')
    },
    resetForms(){
    	this.data.name = '',
		this.data.description = '',
		this.data.hint = '',
		this.data.challengeFunction = '',
		this.data.result = ''
    }
  }

}
</script>

<style>

</style>