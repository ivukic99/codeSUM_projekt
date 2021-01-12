<template>
    <div>
        <NavbarAdmin />
        
        <v-container>
            <h1>Dodavanje zadataka</h1>

            <!--Forma za dodavanje pismenih zadataka-->
            <v-form
                ref="form"
              >
                <v-text-field
                  v-model="name"
                  :counter="10"
                  label="Naziv"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="description"
                  label="Opis"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="hyperlink"
                  label="Poveznica"
                  required
                ></v-text-field>

                <v-btn
                  color="success"
                  class="mr-4"
                  @click="saveTextLesson"
                >
                  Spremi
                </v-btn>

                <v-btn
                  color="error"
                  class="mr-4"
                  @click="resetForm"
                >
                  Reset Form
                </v-btn>
              </v-form>

              <!--Tablica sa popisom tekstualnim lekcija iz tečaja-->
              <h1 class="mt-12">Pregled pismenih zadataka</h1>

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
                    <td>{{row.item.Poveznica}}</td>
                    <td>{{row.item.created_at}}</td>
                    <td>{{row.item.updated_at}}</td>
                    <td>
                        <v-btn class="mx-2" fab dark small color="success" @click="editTextLesson(row.item.Naziv, row.item.Opis, row.item.Poveznica, row.item.id)">
                            <v-icon dark>mdi-pen</v-icon>
                        </v-btn>
                    </td>
                    <td>
                        <v-btn class="mx-2" fab dark small color="red" @click="deleteTextLesson(row.item.id)">
                            <v-icon dark>mdi-delete</v-icon>
                        </v-btn>
                    </td>
                  </tr>
              </template>
        </v-data-table>
        </v-container>
    </div>
</template>

<script>
import NavbarAdmin from '../../../components/app/NavbarAdmin.vue';
export default {
    components:{
        NavbarAdmin
    },
    data(){
        return{
            search: '',
            data: [],
            name: '',
            description: '',
            hyperlink: '',
            lesson_id: null,
            isEditing: false
        }
    },
    methods: {
        saveTextLesson(){
            console.log(this.name, this.description, this.hyperlink)
        },
        editLesson(){

        },
        resetForm(){
            this.name = ''
            this.description = ''
            this.hyperlink = ''
        }
    },
    computed: {
        headers () {
        return [
          { text: 'Naziv', value: 'Naziv' },
          { text: 'Opis', value: 'Opis' },
          { text: 'Poveznica', value: 'Poveznica' },
          { text: 'Vrijeme kreiranja', value: 'created_at' },
          { text: 'Vrijeme ažuriranja', value: 'updated_at' },
          { text: 'Uredi', value: 'id' },
          { text: 'Izbriši', value: 'id' }
        ]
      },

    },
    methods:{
        editTextLesson(name, description, hyperlink, id){
            this.isEditing = true

            this.name = name
            this.description = description
            this.hyperlink = hyperlink
            this.id = id

        },
        saveTextLesson(){
            let courseId = this.$route.params.tecaj_id
            let params = {
                'Naziv': this.name,
                'Opis': this.description,
                'Poveznica': this.hyperlink,
                'Tecaj_id': courseId
            }

            if(this.isEditing === false){
                axios
                .post('http://localhost/codeSUM_projekt/public/api/text_lessons/add', params)
                .then((response) => {
                  console.log(response.data)
                  this.resetForm()
                  this.getTextLessons()
                })
                .catch((err) => {
                  console.log("Dogodila se greška!")
                });
            }else{
                params.Tecaj_id = this.$route.params.tecaj_id
                axios
                .post('http://localhost/codeSUM_projekt/public/api/text_lessons/save', params)
                .then((response) => {
                  console.log(response.data)
                  this.resetForm()
                  this.getTextLessons()
                })
                .catch((err) => {
                  console.log("Dogodila se greška!")
                });
            }


        },
        deleteTextLesson(courseId){

            axios
            .get(`http://localhost/codeSUM_projekt/public/api/text_lessons/delete/${courseId}`)
            .then((response) => {
              console.log(response.data)
              this.getTextLessons()
            })
            .catch((err) => {
              console.log("Dogodila se greška!")
            });
            
        },
        getTextLessons(){
        let courseId = this.$route.params.tecaj_id

        axios
        .get(`http://localhost/codeSUM_projekt/public/api/text_lessons/${courseId}`)
        .then((response) => {
          console.log(response.data)
          this.data = response.data;
        })
        .catch((err) => {
          console.log("Dogodila se greška!")
        });
      },
      resetForm(){
        this.name = '',
        this.description = '',
        this.hyperlink = ''
      }
    },
    created(){
        this.getTextLessons()
    }
}
</script>

<style>

</style>