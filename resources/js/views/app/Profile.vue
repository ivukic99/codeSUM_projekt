<template>
  <v-app>
    <NavbarUser />

    <v-dialog v-model="img_dialog" persistent max-width="400px">
      <v-card>
        <v-card-title>
          <span class="headline">Dodaj sliku profila</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col>
                <input type="file" @change="uploadImage" class="form-control" />
                <!-- <input label="Odaberi fotografiju"  @change="uploadImage"></v-file-input> -->
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" @click="img_dialog = false">
            Odustani
          </v-btn>
          <v-btn
            color="blue darken-1"
            @click="onUpload(getUserDetails.details.id)"
          >
            Spremi
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

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
                  v-model="update_data.name"
                ></v-text-field>
                <v-text-field
                  label="Prezime"
                  v-model="update_data.surname"
                ></v-text-field>
                <v-text-field
                  label="Email"
                  v-model="update_data.email"
                ></v-text-field>
                <v-text-field
                  label="Telefon"
                  v-model="update_data.telefon"
                ></v-text-field>
                <v-text-field
                  label="Obrazovanje"
                  v-model="update_data.obrazovanje"
                ></v-text-field>
                <!-- <v-file-input
                  label="Pohranite svoju fotografiju"
                  v-model="update_data.image"
                ></v-file-input> -->
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
          <v-col cols="md-12">
            <v-list-item>
              <v-hover>
                <template v-slot:default="{ hover }">
                  <div class="text-center">
                    <v-btn
                      icon
                      height="140"
                      width="140"
                      @click="img_dialog = true"
                    >
                      <v-avatar size="140">
                        <img
                          v-bind:src="
                            getUserDetails.details
                              ? 'https://studenti.sum.ba/projekti/fpmoz/2021/g2/public/storage/' +
                                getUserDetails.details.image
                              : ''
                          "
                          alt="CodeSUM user"
                        />
                        <v-fade-transition>
                          <v-overlay v-if="hover" absolute color="#1B4188">
                            <v-icon>mdi-plus</v-icon> Uredi
                          </v-overlay>
                        </v-fade-transition>
                      </v-avatar>
                    </v-btn>
                  </div>
                </template>
              </v-hover>
              <v-list-item-content>
                <v-list-item-title
                  class="display-1"
                  style="margin-top: 20px; margin-left: 20px"
                  v-text="
                    getUserDetails.details
                      ? getUserDetails.details.name +
                        ' ' +
                        getUserDetails.details.surname
                      : ''
                  "
                ></v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-col>

          <v-col cols="12" class="text-right">
            <v-btn fab dark color="indigo" @click="onClick()">
              <v-icon dark> mdi-pencil </v-icon>
            </v-btn>
          </v-col>

          <v-row>
            <v-col cols="md-5">
              <v-card outlined class="mx-auto">
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
                      getUserDetails.details ? getUserDetails.details.name : ""
                    }}</v-col>
                    <v-col cols="md-4" class="text-right font-weight-bold"
                      >Prezime:</v-col
                    >
                    <v-col cols="md-8" class="font-weight-light">{{
                      getUserDetails.details
                        ? getUserDetails.details.surname
                        : ""
                    }}</v-col>
                    <v-col cols="md-4" class="text-right font-weight-bold"
                      >Email:</v-col
                    >
                    <v-col cols="md-8" class="font-weight-light">{{
                      getUserDetails.details ? getUserDetails.details.email : ""
                    }}</v-col>
                    <v-col cols="md-4" class="text-right font-weight-bold"
                      >Broj mobitela:</v-col
                    >
                    <v-col cols="md-8" class="font-weight-light">{{
                      getUserDetails.details
                        ? getUserDetails.details.telefon
                        : "-"
                    }}</v-col>
                    <v-col cols="md-4" class="text-right font-weight-bold"
                      >Obrazovanje:</v-col
                    >
                    <v-col cols="md-8" class="font-weight-light">{{
                      getUserDetails.details
                        ? getUserDetails.details.obrazovanje
                        : "-"
                    }}</v-col>
                  </v-row>
                </v-container>
              </v-card>
            </v-col>

            <v-col cols="md-7">
              <v-card
                class="mx-auto text-center"
                color="#1B4188"
                dark
                max-width="600"
              >
                <v-card-text>
                  <v-sheet color="rgba(0, 0, 0, .12)">
                    <v-sparkline
                      :labels="labels"
                      :value="value"
                      color="rgba(255, 255, 255, .7)"
                      height="100"
                      padding="24"
                      stroke-linecap="round"
                      smooth
                    >
                    </v-sparkline>
                  </v-sheet>
                </v-card-text>

                <v-card-text>
                  <div class="display-1 font-weight-thin">
                    Moja aktivnost učenja
                  </div>
                </v-card-text>
              </v-card>
            </v-col>
          </v-row>

          <v-row>
            <v-col cols="md-12">
              <v-card outlined>
                <v-card-title>Tečajevi koje pohađam</v-card-title>
                <v-sheet class="mx-auto">
                  <v-slide-group class="pa-4" show-arrows>
                    <v-slide-item
                      v-for="(value, i) in getCourseDetails"
                      :key="i"
                    >
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
                                {{ value.Naziv }}
                              </v-list-item-title>
                              <v-list-item-subtitle>{{
                                value.category_name.Naziv
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
          </v-row>
        </v-row>
      </v-card>
    </v-container>

    <!-- Snackbar -->
    <v-snackbar
      top
      right
      v-model="snackbar.show"
      :timeout="snackbar.timeout"
      :color="snackbar.color"
    >
      {{ snackbar.text }}

      <template v-slot:action="{ attrs }">
        <v-btn color="blue" text v-bind="attrs" @click="snackbar.show = false">
          Close
        </v-btn>
      </template>
    </v-snackbar>
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
      update_data: {
        name: "",
      },
      selectedFile: {
        image: "",
      },
      dialog: false,
      img_dialog: false,
      value: [3, 1, 4, 8, 3, 1, 1, 2, 3, 2, 4, 7],
      labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
      snackbar: {
        color: "success",
        show: false,
        text: "Uspiješno ste promijenili fotografiju!",
        timeout: 3000,
      },
    };
  },
  computed: {
    ...mapGetters(["getUserDetails"]),
    ...mapGetters(["getCourseDetails"]),
  },
  created() {
    this.$store.dispatch("setUserDetails");
    this.$store.dispatch("setCourseDetails");
  },

  methods: {
    uploadImage(event) {
      var fileReader = new FileReader();

      fileReader.readAsDataURL(event.target.files[0]);

      fileReader.onload = (event) => {
        this.selectedFile.image = event.target.result;
      };
    },

    onUpload(user_id) {
      axios
        .post(`uploadImg/${user_id}`, this.selectedFile)
        .then((response) => {
          this.img_dialog = false;
          this.snackbar.show = true;
        })
        .catch((err) => {
          console.log("Dogodila se greška!");
          this.snackbar = {
            color: "#C62828",
            show: true,
            text: "Nespješno postavljanje slike.",
            timeout: 3000,
          };
        });
    },

    onClick() {
      this.dialog = true;
      // ne vuce getUSerDetails.details.neki atribut
      this.update_data = {
        name: getUserDetails.details.name,
        surname: getUserDetails.details.surname,
        email: getUserDetails.details.email,
        telefon: getUserDetails.details.telefon,
        obrazovanje: getUserDetails.details.obrazovanje,
      };
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