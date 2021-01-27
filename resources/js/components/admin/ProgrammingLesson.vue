<template>
  <div>

  	<v-container>

	      <div class="d-flex justify-content-between align-center mb-5">
	        <h3>Ovo je add/edit prog lekcija</h3>
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

	        <div>
	        	
	        	<wysiwyg v-model="data" />

	        </div>

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
    components: {
    	Loading,
    },
    data(){
    	return{
    		data : '<p>Pozdrav od <b>CodeSUM-a</b></p>',
    		name: '',
    		description: '',
    		hint: '',
    		challengeFunction: '',
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
            .post('text_lessons/save', params)
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
    }
  }

}
</script>

<style>

</style>