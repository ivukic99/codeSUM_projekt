<template>
    <div>
    	<NavbarAdmin />

    	<AddEditProgrammingLesson 
    	v-if="addEdit" 
    	:addEdit="addEdit" 
    	@goBack="changeComponent"
    	:isEditing="isEditing"
    	:name="name"
    	:description="description"
    	:challengeFunction="challengeFunction"
    	:hint="hint"
    	:result="result"
    	:id="lesson_id"
    	:reset="reset"
    	:getProgrammingLesson="getProgrammingLesson"
    	/>

    	<div v-else>
	        
	        <v-container>
	          <div class="d-flex justify-content-between align-center mb-5">
	            <h3>Ažuriranje programskih lekcija</h3>
	              <v-btn
	                class="mx-2"
	                fab
	                dark
	                color="#1B4188"
	                @click="addEdit = true"
	              >
	                <v-icon dark>
	                  mdi-plus
	                </v-icon>
	              </v-btn>
	            </div>

	              <!--Tablica sa popisom tekstualnim lekcija iz tečaja-->

	              <v-data-table
	                  :headers="headers"
	                  :items="data"
	                  item-key="name"
	                  class="elevation-1"
	                  :search="search"
	                >
	                  <template v-slot:top>
	                    <v-text-field
	                      v-model="search"
	                      label="Search"
	                      class="mx-4"
	                    ></v-text-field>
	                  </template>
	                  <template v-slot:item="row">
	                  <tr>
	                    <td>{{row.item.Naziv}}</td>
	                    <td>{{row.item.Opis}}</td>
	                    <td>{{row.item.created_at}}</td>
	                    <td>{{row.item.updated_at}}</td>
	                    <td>
	                        <v-btn class="mx-2" fab dark small color="success" @click="editProgrammingLesson(row.item.Naziv, row.item.Opis, row.item.ChallengeFunkcija, row.item.Hint, row.item.Rezultat, row.item.id)">
	                            <v-icon dark>mdi-pen</v-icon>
	                        </v-btn>
	                    </td>
	                    <td>
	                        <v-btn class="mx-2" fab dark small color="red" @click="deleteProgrammingLesson(row.item.id)">
	                            <v-icon dark>mdi-delete</v-icon>
	                        </v-btn>
	                    </td>
	                  </tr>
	              </template>
	        </v-data-table>

	        <!--Loader-->

	        <Loading :active.sync="isLoading" 
	            :can-cancel="true" 
	            :is-full-page="fullPage">
	        </Loading>

	        </v-container>
        </div>
    </div>
</template>

<script>
import NavbarAdmin from '../../../components/app/NavbarAdmin.vue';
import AddEditProgrammingLesson from '../../../components/admin/ProgrammingLesson.vue';
import Loading from 'vue-loading-overlay';
export default {
    components:{
        NavbarAdmin,
        AddEditProgrammingLesson,
        Loading
    },
    data(){
        return{
            search: '',
            data: [],
            name: '',
            description: '',
            challengeFunction: '',
            hint: '',
            result: '',
            lesson_id: 0,
            addEdit: false,
            isEditing: false,
            fullPage: true,
            isLoading: false
        }
    },
    computed: {
        headers () {
        return [
          { text: 'Naziv', value: 'Naziv' },
          { text: 'Opis', value: 'Opis' },
          { text: 'Vrijeme kreiranja', value: 'created_at' },
          { text: 'Vrijeme ažuriranja', value: 'updated_at' },
          { text: 'Uredi', value: 'id' },
          { text: 'Izbriši', value: 'id' }
        ]
      },

    },
    methods:{
        editProgrammingLesson(name, description, challengeFunction, hint, result, id){
            this.isEditing = true

            this.name = name
            this.description = description
            this.challengeFunction = challengeFunction
            this.hint = hint
            this.result = result
            this.lesson_id = id

            this.addEdit = true

        },
        deleteProgrammingLesson(courseId){

            axios
            .get(`programming_lessons/delete/${courseId}`)
            .then((response) => {
              console.log(response.data)
              this.getProgrammingLesson()
            })
            .catch((err) => {
              console.log("Dogodila se greška!")
            });
            
        },
        getProgrammingLesson(){
        let courseId = this.$route.params.tecaj_id

        axios
        .get(`programming_lessons/${courseId}`)
        .then((response) => {
          console.log(response.data)
          this.data = response.data;
        })
        .catch((err) => {
          console.log("Dogodila se greška!")
        });
      },
      reset(){
        this.isEditing = false

        this.name = ''
        this.description = ''
        this.challengeFunction = ''
        this.hint = ''
        this.result = ''
        this.lesson_id = 0

        this.addEdit = false
      },
      closeDialog(){
        this.resetForm()
        this.dialog = false
      },
      changeComponent(){
      	this.addEdit = false
      }
    },
    created(){
        this.getProgrammingLesson()
    }
}
</script>

<style>

</style>