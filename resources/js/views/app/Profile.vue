<template>
  <v-app>
    <NavbarUser />

    <v-dialog v-model="dialog" persistent max-width="600px">
      <v-card>
        <v-card-title>
          <span class="headline">Uredi osobne podatke</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col>
                <v-text-field
                  label="Ime"
                  v-model="getUserDetails.details.name"
                ></v-text-field>
                <v-text-field
                  label="Prezime"
                  v-model="getUserDetails.details.surname"
                ></v-text-field>
                <v-text-field
                  label="Email"
                  v-model="getUserDetails.details.email"
                ></v-text-field>
                <v-text-field
                  label="Telefon"
                  v-model="getUserDetails.details.telefon"
                ></v-text-field>
                <v-text-field
                  label="Obrazovanje"
                  v-model="getUserDetails.details.obrazovanje"
                ></v-text-field>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" @click="dialog = false">
            Odustani
          </v-btn>
          <v-btn
            color="blue darken-1"
            @click="updateUsers(getUserDetails.details.id)"
          >
            Spremi
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <v-container>
      <v-card class="mx-auto">
        <v-img height="200" src="https://iili.io/FKX3RS.png"></v-img>
        <v-row style="margin: 2.5%; position: absolute; top: 125px">
          <v-col cols="12">
            <v-list-item>
              <v-list-item-avatar size="140">
                <img
                  v-bind:src="
                    getUserDetails.details.img
                      ? getUserDetails.details.img
                      : 'https://iili.io/Ks0S0N.png'
                  "
                  alt="CodeSUM user"
                />
              </v-list-item-avatar>
              <v-list-item-content>
                <v-list-item-title class="title" style="margin-top: 20px">
                  <h2>
                    {{
                      getUserDetails.details.name +
                      " " +
                      getUserDetails.details.surname
                    }}
                  </h2></v-list-item-title
                >
              </v-list-item-content>
            </v-list-item>
          </v-col>

          <v-col cols="12" class="text-right">
            <v-btn fab dark color="indigo" @click="onClick()">
              <v-icon dark> mdi-pencil </v-icon>
            </v-btn>
          </v-col>

          <v-col cols="md-6">
            <v-card outlined class="mx-auto" max-width="374">
              <v-container>
                <v-row>
                  <v-spacer></v-spacer>
                  <v-col cols="md-8" class="text-h6">Moji podaci</v-col>
                </v-row>
                <v-row>
                  <v-col cols="md-4" class="text-right font-weight-bold"
                    >Ime:</v-col
                  >
                  <v-col cols="md-8" class="font-weight-light">{{
                    getUserDetails.details.name
                  }}</v-col>
                  <v-col cols="md-4" class="text-right font-weight-bold"
                    >Prezime:</v-col
                  >
                  <v-col cols="md-8" class="font-weight-light">{{
                    getUserDetails.details.surname
                  }}</v-col>
                  <v-col cols="md-4" class="text-right font-weight-bold"
                    >Email:</v-col
                  >
                  <v-col cols="md-8" class="font-weight-light">{{
                    getUserDetails.details.email
                  }}</v-col>
                  <v-col cols="md-4" class="text-right font-weight-bold"
                    >Broj mobitela:</v-col
                  >
                  <v-col cols="md-8" class="font-weight-light">{{
                    getUserDetails.details.telefon
                      ? getUserDetails.details.telefon
                      : "-"
                  }}</v-col>
                  <v-col cols="md-4" class="text-right font-weight-bold"
                    >Obrazovanje:</v-col
                  >
                  <v-col cols="md-8" class="font-weight-light">{{
                    getUserDetails.details.obrazovanje
                      ? getUserDetails.details.obrazovanje
                      : "-"
                  }}</v-col>
                </v-row>
              </v-container>
            </v-card>
          </v-col>

          <v-col cols="md-6">
            <v-card outlined class="mx-auto" max-width="500">
              <v-card-title>Tečajevi koje pohađam</v-card-title>
              <v-sheet class="mx-auto">
                <v-slide-group class="pa-4" show-arrows>
                  <v-slide-item v-for="(value, i) in getCourseDetails" :key="i">
                    <v-card
                      color="#FFF9C4"
                      class="ma-4"
                      height="150"
                      width="280"
                    >
                      <v-row
                        class="fill-height pl-4 pr-4"
                        align="center"
                        justify="center"
                      >
                        <v-list-item three-line>
                          <v-list-item-content>
                            <div class="overline mb-4">TEČAJ</div>
                            <v-list-item-title class="headline mb-1">
                              {{ getCourseDetails[i].Naziv }}
                            </v-list-item-title>
                            <v-list-item-subtitle>{{
                              getCourseDetails[i].kategorija.Naziv
                            }}</v-list-item-subtitle>
                          </v-list-item-content>

                          <v-list-item-avatar tile size="100">
                            <img
                              src="https://cdn.pixabay.com/photo/2018/06/08/00/48/developer-3461405_960_720.png"
                              alt="Igor"
                            />
                          </v-list-item-avatar>
                        </v-list-item>
                      </v-row>
                    </v-card>
                  </v-slide-item>
                </v-slide-group>
              </v-sheet>
            </v-card>
          </v-col>

          <!-- ovo je za iszbrisat - planiro sam napravit prkaz svih tečaja koje pohadja kroz listanje te neki graf aktivnosti korz datume
              <v-col cols="md-6">
            <v-card outlined class="mx-auto my-12" max-width="374">
              <v-container>
                <v-row>
                  <v-spacer></v-spacer>
                  <v-col cols="sm-8" class="text-h6">Moji podaci</v-col>
                </v-row>
                <v-row>
                  <v-col class="text-right font-weight-light">Ime:</v-col>
                  <v-col cols="sm-8">{{ getUserDetails.details.name }}</v-col>
                  <v-col class="text-right font-weight-light">Prezime:</v-col>
                  <v-col cols="sm-8">{{
                    getUserDetails.details.surname
                  }}</v-col>
                  <v-col class="text-right font-weight-light">Email:</v-col>
                  <v-col cols="sm-8">{{ getUserDetails.details.email }}</v-col>
                  <v-col class="text-right font-weight-light"
                    >Broj mobitela:</v-col
                  >
                  <v-col cols="sm-8">{{
                    getUserDetails.details.telefon
                      ? getUserDetails.details.telefon
                      : "-"
                  }}</v-col>
                  <v-col class="text-right font-weight-light"
                    >Obrazovanje:</v-col
                  >
                  <v-col cols="sm-8">{{
                    getUserDetails.details.obrazovanje
                      ? getUserDetails.details.obrazovanje
                      : "-"
                  }}</v-col>
                </v-row>
              </v-container>
            </v-card>
          </v-col> -->
        </v-row>
      </v-card>
    </v-container>
  </v-app>
</template>

<script>
import { mapGetters } from "vuex";
import NavbarUser from "../../components/app/NavbarUser";
import Axios from "axios";
export default {
  name: "Profile",
  components: {
    NavbarUser,
  },
  data() {
    return {
      update_data: {},
      dialog: false,
    };
  },
  computed: {
    ...mapGetters(["getUserDetails"]),
    ...mapGetters(["getCourseDetails"]),
  },
  created() {
    this.$store.dispatch("setUserDetails");
    this.$store.dispatch("setCourseDetails");
    // this.getUser(neki id);
  },
  methods: {
    // getUser(user_id) {
    //   axios
    //     .get(`user/${user_id}`)
    //     .then((response) => {
    //       this.users_data = response.data;
    //       console.log("--__",this.users_data);
    //     })
    //     .catch((err) => {
    //       console.log("Doslo je do pogreske!");
    //     });
    // },

    onClick() {
      this.dialog = true;
      this.update_data = {
        name: getUserDetails.details.name,
        surname: getUserDetails.details.surname,
        email: getUserDetails.details.email,
        telefon: getUserDetails.details.telefon,
        obrazovanje: getUserDetails.details.obrazovanje,
      };

      // console.log(this.editedData)
    },
    updateUsers(user_id) {
      axios
        .post(`users/update/${user_id}`, this.update_data)
        .then((response) => {
          this.dialog = false;
        })
        .catch((err) => {
          console.log("Dogodila se greška!");
        });
    },
  },
};
</script>