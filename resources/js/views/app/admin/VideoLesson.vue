<template>
    <div>
        <NavbarAdmin />
        
        <v-container>
            <div class="d-flex justify-content-between align-center mb-5">
              <h3>Ažuriranje video lekcija</h3>
              <v-btn
                class="mx-2"
                fab
                dark
                color="indigo"
                @click="dialog = true"
              >
                <v-icon dark>
                  mdi-plus
                </v-icon>
              </v-btn>
            </div>

              <!--Modal dialog-->
              <v-dialog
                v-model="dialog"
                persistent
                max-width="600px"
              >
                <v-card>
                  <v-card-title>
                    <span class="headline">Ažuriranje videolekcija</span>
                  </v-card-title>
                  <v-card-text>
                    <v-container>
                      <v-row>
                        <v-col
                          cols="12"
                        >
                          <v-text-field
                            v-model="name"
                            label="Naziv videolekcije"
                            required
                          ></v-text-field>
                        </v-col>
                        <v-col
                          cols="12"
                        >
                        <v-textarea
                          v-model="description"
                          color="teal"
                          required
                          >
                            <template v-slot:label>
                              <div>
                                Opis videolekcije*
                              </div>
                            </template>
                          </v-textarea>
                        </v-col>
                        <v-col
                          cols="12"
                        >
                          <v-text-field
                            v-model="hyperlink"
                            label="Poveznica"
                            required
                          ></v-text-field>
                        </v-col>
                        </v-col>
                      </v-row>
                    </v-container>
                  </v-card-text>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                      color="blue darken-1"
                      @click="closeDialog"
                    >
                      Odustani
                    </v-btn>
                    <v-btn
                      color="blue darken-1"
                      @click="saveVideoLesson"
                    >
                      Spremi
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-dialog>

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
                    <td>{{row.item.Poveznica}}</td>
                    <td>{{row.item.created_at}}</td>
                    <td>{{row.item.updated_at}}</td>
                    <td>
                        <v-btn class="mx-2" fab dark small color="success" @click="editVideoLesson(row.item.Naziv, row.item.Opis, row.item.Poveznica, row.item.id)">
                            <v-icon dark>mdi-pen</v-icon>
                        </v-btn>
                    </td>
                    <td>
                        <v-btn class="mx-2" fab dark small color="red" @click="deleteVideoLesson(row.item.id)">
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
</template>

<script>
import NavbarAdmin from '../../../components/app/NavbarAdmin.vue';
import Loading from 'vue-loading-overlay';
export default {
    components:{
        NavbarAdmin,
        Loading
    },
    data(){
        return{
            search: '',
            data: [],
            name: '',
            description: '',
            hyperlink: '',
            lesson_id: null,
            isEditing: false,
            dialog: false,
            isLoading: false,
            fullPage: true
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
        editVideoLesson(name, description, hyperlink, id){
            this.isEditing = true
            this.dialog = true

            this.name = name
            this.description = description
            this.hyperlink = hyperlink
            this.id = id

        },
        saveVideoLesson(){
            let courseId = this.$route.params.tecaj_id
            let params = {
                'Naziv': this.name,
                'Opis': this.description,
                'Poveznica': this.hyperlink,
                'Tecaj_id': courseId
            }

            this.isLoading = true 

            if(this.isEditing === false){
                axios
                .post('video_lessons/add', params)
                .then((response) => {
                  console.log(response.data)
                  this.resetForm()
                  this.getTextLessons()
                  this.dialog = false
                  this.isLoading = false 
                })
                .catch((err) => {
                  console.log("Dogodila se greška!")
                  this.isLoading = false
                });
            }else{
                params.Tecaj_id = this.$route.params.tecaj_id
                params.Lekcija_id = this.id

                console.log(params)
                axios
                .post('video_lessons/save', params)
                .then((response) => {
                  console.log(response.data)
                  this.resetForm()
                  this.getTextLessons()
                  this.dialog = false
                  this.isLoading = false
                })
                .catch((err) => {
                  console.log("Dogodila se greška!")
                  this.isLoading = false
                });
            }


        },
        deleteVideoLesson(lessonId){
            axios
            .get(`video_lessons/delete/${lessonId}`)
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
        .get(`video_lessons/${courseId}`)
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
      },
      closeDialog(){
        this.resetForm()
        this.dialog = false
      }
    },
    created(){
        this.getTextLessons()
    }
}
</script>

<style>

</style>