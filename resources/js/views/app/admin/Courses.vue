<template>

    <v-container>
        <NavbarAdmin />

        <div class="d-flex justify-content-between align-center mb-5">
          <h3>Tečajevi</h3>
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

        <!--Modal dialog for adding new course-->
        <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
    >
      <v-card>
        <v-card-title>
          <span class="headline">Kreiranje novog tečaja</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col
                cols="12"
              >
                <v-text-field
                  v-model="newCourseName"
                  label="Naziv tečaja*"
                  required
                ></v-text-field>
              </v-col>
              <v-col
                cols="12"
              >
                <v-select
                  v-model="newCourseCategory"
                  :items="categories"
                  item-text="Naziv"
                  item-value="id"
                  label="Odaberite kategoriju tečaja*"
                ></v-select>
              </v-col>
              <v-col
                cols="12"
              >
              <v-textarea
                v-model="newCourseDescription"
                color="teal"
                required
                >
                  <template v-slot:label>
                    <div>
                      Opis tečaja*
                    </div>
                  </template>
                </v-textarea>
              </v-col>
            </v-row>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="blue darken-1"
            @click="dialog = false"
          >
            Odustani
          </v-btn>
          <v-btn
            color="blue darken-1"
            @click="createNewCourse"
          >
            Spremi
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

        <!--Ovo je tablica sa informacijama o tečajevima-->

      <div>
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
            <td>{{row.item.kreirao}}</td>
            <td>{{row.item.naziv_kategorije}}</td>
            <td>{{row.item.created_at}}</td>
            <td>{{row.item.updated_at}}</td>
            <td>
                <v-btn class="mx-2" fab dark small color="success" @click="viewCourse(row.item.id)">
                    <v-icon dark>mdi-eye</v-icon>
                </v-btn>
            </td>
            <td>
                <v-btn class="mx-2" fab dark small color="red" @click="deleteCourse(row.item.id)">
                    <v-icon dark>mdi-delete</v-icon>
                </v-btn>
            </td>
          </tr>
      </template>
        </v-data-table>
      </div>

      <!--Loader-->

      <Loading :active.sync="isLoading" 
        :can-cancel="true" 
        :is-full-page="fullPage">
    </Loading>
    </v-container>
</template>

<script>
import axios from 'axios';
import { mapGetters } from 'vuex';
import NavbarAdmin from '../../../components/app/NavbarAdmin';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
  export default {
    components: {
        NavbarAdmin,
        Loading
    },
    data () {
      return {
        search: '',
        data: [],
        dialog: false,
        newCourseName: '',
        newCourseDescription: '',
        newCourseCategory: '',
        categories: [],
        isLoading: false,
        fullPage: true
      }
    },
    computed: {
      ...mapGetters(['getUserDetails']),
      headers () {
        return [
          { text: 'Naziv', value: 'Naziv' },
          { text: 'Opis', value: 'Opis' },
          { text: 'Kreirao', value: 'kreirao' },
          { text: 'Kategorija', value: 'naziv_kategorije' },
          { text: 'Vrijeme kreiranja', value: 'created_at' },
          { text: 'Vrijeme ažuriranja', value: 'updated_at' },
          { text: 'Pregled', value: 'id' },
          { text: 'Izbriši', value: 'id' }
        ]
      },
    },
    methods: {
      createNewCourse(){
        let newCourse = {
          'Naziv': this.newCourseName,
          'Opis': this.newCourseDescription,
          'Kategorija_id': this.newCourseCategory,
          'Kreator_id': this.getUserDetails.details.id
        }

        this.isLoading = true

        axios
        .post("http://localhost/codeSUM_projekt/public/api/courses/add", newCourse)
        .then((response) => {
          console.log(response)
          this.isLoading = false
          this.router

          this.$router.push({ path: `/admin/tecajevi/${response.data}` }) 

          this.getCourses()
          this.dialog = false

          this.newCourseName = ''
          this.newCourseDescription = ''
          this.newCourseCategory= ''
        })
        .catch((err) => {
          console.log(response)
          this.newCourseName = ''
          this.newCourseDescription = ''
          this.newCourseCategory= ''
        });

        
      },
      getCourses(){
        axios
        .get("http://localhost/codeSUM_projekt/public/api/courses")
        .then((response) => {
          console.log(response.data)
          this.data = response.data;
        })
        .catch((err) => {
          console.log("Dogodila se greška!")
        });
      },

      viewCourse(course_id){
        //console.log(course_id)
        this.$router.push({path: `/admin/tecajevi/${course_id}`})
      },

      deleteCourse(course_id){
        //console.log(course_id)

        this.isLoading = true

        axios
        .post(`http://localhost/codeSUM_projekt/public/api/courses/delete/${course_id}`)
        .then((response) => {
          //console.log(response.data)
          this.getCourses()
          this.isLoading = false
        })
        .catch((err) => {
          console.log("Dogodila se greška!")
        });
      }

    },
    mounted(){
      axios
        .get("http://localhost/codeSUM_projekt/public/api/categories")
        .then((response) => {
          console.log(response.data)
          this.categories = response.data;
        })
        .catch((err) => {
          console.log("Dogodila se greška!")
        });

    },
    created(){
      this.getCourses()
    }

  }
</script>

<style>

</style>