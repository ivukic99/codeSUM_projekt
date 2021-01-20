<template>
  <div>
    <Navbar />

    <FilterSearch @changed_category="changeCategory($event)" @changed_term="changeTerm($event)"/>

    <v-container>
        
        <v-row>
            <v-col v-for="(course, index)  in filteredCourses" :key="index" xs="12" sm="12" md="6" lg="6">
                
                <v-card
                    :loading="loading"
                    class="mx-auto my-12"
                    max-width="374"
                >
                    <template slot="progress">
                    <v-progress-linear
                        color="deep-purple"
                        height="10"
                        indeterminate
                    ></v-progress-linear>
                    </template>

                    <v-img
                    height="200"
                    :src="course.image ? course.image : 'https://cdn.pixabay.com/photo/2018/06/08/00/48/developer-3461405_960_720.png'"
                    ></v-img>


                    <v-card-text>
                    <v-row
                        justify="center"
                        align="center"
                        class="mx-0"
                    >
                        
                        <v-card-title>{{ course.Naziv }}</v-card-title>

                    </v-row>

                    <div>
                        <p style="text-align: justify;"> {{ course.Opis }} </p>
                    </div>
                    </v-card-text>

                    <div class="d-flex justify-content-around mt-3 mr-5">

                        <v-btn color="#1B4188" @click="viewCourse(course.id)">
                            Pogledaj
                        </v-btn>

                        <div class="d-flex">
                            <v-rating
                            :value="0"
                            color="amber"
                            dense
                            half-increments
                            readonly
                            size="14"
                            ></v-rating>

                            <div class="grey--text ml-4">
                             0 / 0
                            </div>
                        </div>
                    </div>

                    <v-divider class="mx-4"></v-divider>

                    <v-card-text>
                    <div class="d-flex justify-content-around align-center mt-3 mr-5">
                    <v-chip-group
                        v-model="selection"
                        active-class="deep-purple accent-4 white--text"
                        column
                    >

                        <v-chip
                        class="ma-2"
                        color="#1B4188"
                        label
                        text-color="white"
                        style="background: #1B4188 !important"
                        >
                        <v-icon left>
                            mdi-account
                        </v-icon>
                            {{ course.broj_upisanih_korisnika }}
                        </v-chip>

                        <v-chip
                        class="ma-2"
                        color="#1B4188"
                        label
                        text-color="white"
                        style="background: #1B4188 !important;"
                        >
                        <v-icon left>
                            mdi-note
                        </v-icon>
                            {{ course.broj_lekcija }}
                        </v-chip>

                    </v-chip-group>
                    <div class="d-flex align-center justify-center ml-8">
                      <div style="font-size: 18px;">
                      {{ course.kreirao }}
                      </div>
                    </div>
                    </div>
                    </v-card-text>
                </v-card>

            </v-col>
        </v-row>

    </v-container>
  </div>
</template>

<script>
import Navbar from '../components/Navbar.vue';
import FilterSearch from '../components/FilterSearch';

export default {
    components: {
        Navbar,
        FilterSearch
    },

    data: () => ({
      loading: false,
      selection: 1,
      currentTerm: '',
      currentCategory: 'All',
      courses: []
    }),

    methods: {
      reserve () {
        this.loading = true

        setTimeout(() => (this.loading = false), 2000)
      },

      changeTerm: function(term){
          this.currentTerm = term
      },

      changeCategory: function(category) {
          this.currentTerm = ""
          this.currentCategory = category
		},
    getCourses(){
      axios
        .get("courses")
        .then((response) => {
          console.log(response.data)
          this.courses = response.data;
          //console.log(response.data)
        })
        .catch((err) => {
          console.log("Dogodila se greška!")
        });
    },
    viewCourse(courseId){
      this.$router.push({name: 'ViewCourse', params:{tecaj_id: courseId}})
    }
  },
    computed: {
        filteredCourses(){
            var term = this.currentTerm
            var category = this.currentCategory
			
      			if(category === "All" && term === "") {
      				return this.courses;
      			}else if(this.currentCategory === "All"){
                      return this.courses.filter(function(course) {
                          return course.Naziv.includes(term);
                      });
              }else {
                  return this.courses.filter(function(course) {
                      return course.naziv_kategorije === category && course.Naziv.includes(term);
                  });
              }
            }
    },
    created(){
      this.getCourses()
    }

}
</script>

<style>

</style>