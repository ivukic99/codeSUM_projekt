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

        <!--Ovo je tablica sa informacijama o ttečajevima-->

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
        </v-data-table>
      </div>
    </v-container>
</template>

<script>
import axios from 'axios';
import NavbarAdmin from '../../../components/app/NavbarAdmin';
  export default {
    components: {
        NavbarAdmin,
    },
    data () {
      return {
        search: '',
        data: [],
        dialog: false,
        newCourseName: '',
        newCourseDescription: '',
        newCourseCategory: '',
        categories: []
      }
    },
    computed: {
      headers () {
        return [
          { text: 'Naziv', value: 'Naziv' },
          { text: 'Opis', value: 'Opis' },
          { text: 'Kreirao', value: 'kreirao' },
          { text: 'Naziv kategorije', value: 'naziv_kategorije' },
          { text: 'Vrijeme kreiranja', value: 'created_at' },
          { text: 'Vrijeme ažuriranja', value: 'updated_at' },
        ]
      },
    },
    methods: {
      createNewCourse(){
        console.log(this.newCourseCategory)
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
      axios
        .get("http://localhost/codeSUM_projekt/public/api/courses")
        .then((response) => {
          console.log(response.data)
          this.data = response.data;
        })
        .catch((err) => {
          console.log("Dogodila se greška!")
        });

    }

  }
</script>

<style>

</style>