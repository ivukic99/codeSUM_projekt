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
	            @click="goBack"
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
					  v-model="name"
					  label="Naziv zadatka"
					  required
					></v-text-field>

					<div class="mt-3 mb-3">
						<wysiwyg v-model="description" />
					</div>

					<div class="mt-3 mb-3">
						<wysiwyg v-model="challengeFunction" />
					</div>

					<v-text-field
					  v-model="result"
					  label="Očekivani rezultat challengeFunkcije"
					  required
					></v-text-field>

					<div class="mt-3 mb-3">
						<wysiwyg v-model="hint" />
					</div>

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
		isEditing: Boolean
	},
    components: {
    	Loading,
    },
    data(){
    	return{
    		name: '',
    		description: 'Ovdje upišite opis zadatka..',
    		hint: 'Ukoliko želite, napišite dodatne upute korisniku..',
    		challengeFunction: 'Ukoliko želite, definirajte vlastitu challengeFunkciju..',
    		result: '',
    		isLoading: false,
    		fullPage: true
    	}
    },
    methods: {
	saveProgrammingLesson(){
        let courseId = this.$route.params.tecaj_id
        let params = {
            'Naziv': this.name,
            'Opis': this.description,
            'Hint': this.hint,
            'ChallengeFunkcija': this.challengeFunction,
            'Rezultat': this.result,
            'Tecaj_id': courseId
        }

        this.isLoading = true

        if(this.isEditing === false){
            axios
            .post('programming_lessons/add', params)
            .then((response) => {
              console.log(response.data)
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
    	this.name = '',
		this.description = 'Ovdje upišite opis zadatka..',
		this.hint = 'Ukoliko želite, napišite dodatne upute korisniku..',
		this.challengeFunction = 'Ukoliko želite, definirajte vlastitu challengeFunkciju..',
		this.result = ''
    }
  }

}
</script>

<style>

</style>