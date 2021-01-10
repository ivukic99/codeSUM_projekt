<template>
    <v-app>
        <v-container>
            <NavbarAdmin />
            <div>
                <h3>Uređivanje tečaja</h3>

                <v-row>
                    <v-col v-for="(action, index) in actions" :key="index">
                        <div>
                            <v-card
                                class="mx-auto"
                                max-width="344"
                                height="180"
                                outlined
                              >
                                <v-list-item three-line>
                                  <v-list-item-content>
                                    <div class="overline mb-4">
                                      {{ action.name }}
                                    </div>
                                    <v-list-item-subtitle>
                                        {{ action.description }}
                                    </v-list-item-subtitle>
                                  </v-list-item-content>

                                  <v-list-item-avatar
                                    tile
                                    size="80"
                                    color="grey"
                                  ></v-list-item-avatar>

                                </v-list-item>
                                <v-card-actions>
                                  <v-btn
                                    rounded
                                    color="primary"
                                  >
                                    Ažuriraj
                                  </v-btn>
                                </v-card-actions>
                              </v-card>
                        </div>
                    </v-col>
                </v-row>
            </div>

            <h3>Statistika tečaja</h3>
               
               <v-container class="mb-12">
                <v-row>
                    <v-col class="d-flex justify-center align-center" xs="12" sm="12" md="4" lg="4">
                <v-progress-circular
                  :rotate="360"
                  :size="100"
                  :width="15"
                  value="70"
                  color="#26c6da"
                >
                  7/10
                </v-progress-circular>
            </v-col>
                

            <v-col class="d-flex justify-center align-center" xs="12" sm="12" md="4" lg="4">
            <v-card
                class="mx-auto"
                color="#26c6da"
                dark
                width="300"
              >
                <v-card-title>
                  <v-icon
                    large
                    left
                  >
                    mdi-account
                  </v-icon>
                  <span class="title font-weight-light">Broj polaznika</span>
                </v-card-title>

                <v-card-text class="headline font-weight-bold text-center">
                  250
                </v-card-text>

              </v-card>
            </v-col>

            <v-col class="d-flex justify-center align-center" xs="12" sm="12" md="4" lg="4">
              <v-card
                class="mx-auto"
                color="#26c6da"
                dark
                max-width="300"
              >
                <v-card-title>
                  <v-icon
                    large
                    left
                  >
                    mdi-message
                  </v-icon>
                  <span class="title font-weight-light">Broj komentara</span>
                </v-card-title>

                <v-card-text class="headline font-weight-bold text-center">
                  75
                </v-card-text>

              </v-card>
          </v-col>

           
          </v-row>
          </v-container>
           

            <!--Graphs-->

            <div>
                <v-row>
                    <v-col v-for="i in 2" :key="i">
                        <v-card
                            class="mx-auto text-center"
                            color="green"
                            dark
                            max-width="350"
                          >
                            <v-card-text>
                              <v-sheet color="rgba(0, 0, 0, .12)">
                                <v-sparkline
                                  :value="value"
                                  color="rgba(255, 255, 255, .7)"
                                  height="100"
                                  padding="24"
                                  stroke-linecap="round"
                                  smooth
                                >
                                  <template v-slot:label="item">
                                    {{ item.value }}
                                  </template>
                                </v-sparkline>
                              </v-sheet>
                            </v-card-text>

                            <v-card-text>
                              <div class="display-1 font-weight-thin">
                                Distribucija podataka
                              </div>
                            </v-card-text>

                            <v-divider></v-divider>

                            <v-card-actions class="justify-center">
                              <v-btn
                                block
                                text
                              >
                                Pogledaj više
                              </v-btn>
                            </v-card-actions>
                          </v-card>
                        </v-col>
                  </v-row>
            </div>

        </v-container>

    </v-app>
</template>

<script>
import NavbarAdmin from '../../../components/app/NavbarAdmin';
export default {
    name: "Admin",
    components: {
        NavbarAdmin,
    },
    data(){
        return{
            actions: [
                 {
                    name: 'Programski',
                    description: 'Ovdje se ažuriraju programski zadaci tečaja.',
                    img: ''
                 },
                 {
                    name: 'Kvizovi',
                    description: 'Ovdje se ažuriraju kvizovi tečaja.',
                    img: ''
                 },
                 {
                    name: 'Tekstualni',
                    description: 'Ovdje se ažuriraju tesktualni zadaci tečaja.',
                    img: ''
                 },
                 {
                    name: 'Videolekcije',
                    description: 'Ovdje se ažuriraju videolekcije tečaja.',
                    img: ''
                 }
            ],
            value: [
                1,
                2,
                3,
                4,
                5,
                6,
                7,
                8,
                9,
                10,
                11,
                12
              ],
        }
    },
    computed: {

    }
}
</script>

<style>

</style>