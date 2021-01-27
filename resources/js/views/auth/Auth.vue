<template>
  <v-app style="background-color: #e0f7fa">
    <v-img
      src="https://i.ibb.co/LvhpfbG/white-background-with-hexagonal-line-pattern-design.jpg"
    >
      <Navbar />
      <v-container fluid>
        <v-row style="height: 100vh" justify="center">
          <v-col cols="12" sm="8" md="8" class="d-flex align-center">
            <v-card class="elevation-12">
              <v-window v-model="step">
                <v-window-item :value="1">
                  <v-row>
                    <v-col cols="12" md="8" style="background-color: #eeeeee">
                      <v-card-text class="mt-12">
                        <h1 class="text-center display-2">
                          <span style="color: #1b4188">
                            Dobrodošli na code<span class="font-weight-medium"
                              >SUM</span
                            ></span
                          >
                        </h1>
                        <div class="text-center mt-4">
                          <v-btn icon>
                            <v-icon color="#1B4188">fab fa-facebook-f</v-icon>
                          </v-btn>
                          <v-btn icon>
                            <v-icon color="#1B4188">fab fa-instagram</v-icon>
                          </v-btn>
                          <v-btn icon>
                            <v-icon color="#1B4188">fab fa-youtube</v-icon>
                          </v-btn>
                        </div>
                        <br />
                        <h4 class="text-center mlt-4">
                          Unesite svoje podatke za prijavu
                        </h4>
                        <v-form>
                          <v-text-field
                            label="Email"
                            name="Email"
                            prepend-icon="fas fa-envelope"
                            type="text"
                            color="#1B4188"
                            v-model="user.email"
                            :rules="[rules.required, rules.email]"
                          />
                          <v-text-field
                            id="password"
                            label="Unesite lozinku"
                            name="password"
                            prepend-icon="fas fa-lock"
                            :type="show1 ? 'text' : 'password'"
                            color="#1B4188"
                            v-model="user.password"
                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                            :rules="[rules.required, rules.min]"
                            hint="Najmanje 8 znakova"
                            @click:append="show1 = !show1"
                          />
                        </v-form>
                        <div class="text-right mt-3">
                          <p class="forgot-password text-right">
                            <router-link to="forgot">Zaboravili ste lozinku?</router-link>
                          </p>
                        </div>
                      </v-card-text>
                      <div class="text-center mt-3">
                        <v-btn rounded color="#1B4188" dark @click.prevent="loginUser"
                          >Prijava</v-btn
                        >
                      </div>
                    </v-col>
                    <v-col cols="12" md="4" style="background-color: #1b4188">
                      <v-card-text class="white--text mt-12">
                        <h1 class="text-center display-1">Hello, World!</h1>
                        <h5 class="text-center">
                          Unesite svoje podatke i započnite putovanje sa nama :D
                        </h5>
                      </v-card-text>
                      <div class="text-center">
                        <v-btn rounded outlined dark @click="step++">Registracija</v-btn>
                      </div>
                    </v-col>
                  </v-row>
                </v-window-item>
                <v-window-item :value="2">
                  <v-row class="fill-height">
                    <v-col cols="12" md="4" style="background-color: #1b4188">
                      <v-card-text class="white--text mt-12">
                        <h1 class="text-center display-1">Prijavite se!</h1>
                        <h5 class="text-center">
                          Kako bi ste se prijavili molimo unesite svoje podatke
                        </h5>
                      </v-card-text>
                      <div class="text-center">
                        <v-btn rounded outlined dark @click="step--">Prijava</v-btn>
                      </div>
                    </v-col>
                    <v-col cols="12" md="8" style="background-color: #eeeeee">
                      <v-card-text class="mt-12">
                        <h1 class="text-center display-2">
                          <span style="color: #1b4188"> Napravite račun </span>
                        </h1>
                        <div class="text-center mt-4">
                          <v-btn icon>
                            <v-icon color="#1B4188">fab fa-facebook-f</v-icon>
                          </v-btn>
                          <v-btn icon>
                            <v-icon color="#1B4188">fab fa-instagram</v-icon>
                          </v-btn>
                          <v-btn icon>
                            <v-icon color="#1B4188">fab fa-youtube</v-icon>
                          </v-btn>
                        </div>
                        <h4 class="text-center mt-4">
                          Unesite svoje podatke za registraciju
                        </h4>
                        <v-form ref="registerForm" :value="formValid">
                          <v-row>
                            <v-col>
                              <v-text-field
                                label="Ime"
                                name="name"
                                prepend-icon="fas fa-user"
                                type="text"
                                color="#1B4188"
                                v-model="newUser.name"
                                :rules="[rules.required]"
                              />
                              <v-text-field
                                label="Prezime"
                                name="name"
                                prepend-icon="fas fa-user"
                                type="text"
                                color="#1B4188"
                                v-model="newUser.surname"
                                :rules="[rules.required]"
                              />
                               <v-select
                                v-model="newUser.gender"
                                :items="['muško', 'žensko']"
                                :rules="[rules.required]"
                                label="Spol"
                              ></v-select>
                            </v-col>
                          </v-row>
                          <v-text-field
                            label="Email"
                            name="email"
                            prepend-icon="fas fa-envelope"
                            type="text"
                            color="#1B4188"
                            v-model="newUser.email"
                            :rules="[rules.required, rules.email]"
                          />
                          <v-text-field
                            id="password"
                            label="Unesite lozinku"
                            name="password"
                            prepend-icon="fas fa-lock"
                            :type="show1 ? 'text' : 'password'"
                            color="#1B4188"
                            v-model="newUser.password"
                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                            :rules="[rules.required, rules.min]"
                            hint="Najmanje 8 znakova"
                            @click:append="show1 = !show1"
                          />
                          <v-text-field
                            id="password"
                            label="Ponovite lozinku"
                            name="password"
                            prepend-icon="fas fa-lock"
                            :type="show1 ? 'text' : 'password'"
                            color="#1B4188"
                            v-model="newUser.rePassword"
                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                            :rules="[rules.required, rules.min, passwordConfirmationRule]"
                            hint="Najmanje 8 znakova"
                            @click:append="show1 = !show1"
                          />
                        </v-form>
                      </v-card-text>
                      <div class="text-center mt-n5">
                        <v-btn rounded color="#1B4188" dark @click.prevent="registerUser"
                          >Registracija</v-btn
                        >
                      </div>
                    </v-col>
                  </v-row>
                </v-window-item>
              </v-window>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-img>

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
import axios from "axios";
import { mapActions } from "vuex";
import Navbar from "../../components/Navbar.vue";

export default {
  components: { Navbar },
  name: "Auth",
  components: {
    Navbar,
  },
  data() {
    return {
      step: 1,
      show1: false,
      valid: true,
      snackbar: {
        color: "success",
        show: false,
        text: "Registracija je uspiješna!",
        timeout: 3000,
      },
      formValid: false,
      newUser: {
        email: "",
        name: "",
        surname: "",
        gender: "",
        password: "",
        rePassword: "",
      },
      user: {
        email: "",
        password: "",
      },
      rules: {
        required: (value) => !!value,
        min: (v) => v.length >= 8 || "Minimalno 8 znakova.",
        email: (value) => {
          const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return pattern.test(value);
        },

        emailMatch: () => "Email i lozinka se ne podudaraju.",
      },
    };
  },
  props: {
    source: String,
  },
  methods: {
    ...mapActions(["saveUserToken", "setUserDetails"]),
    registerUser() {
      axios
        .post("register", this.newUser)
        .then((response) => {
          console.log(response);
          if (response.data && response.data.success) {
            this.snackbar.show = true;
            this.saveUserToken(response.data.access_token);
            this.setUserDetails();
            /* this.$router.push({name: 'Pocetna'}) */
          }
        })
        .catch(() => {
          this.snackbar = {
            color: "#C62828",
            show: true,
            text: "Email se već koristi.",
            timeout: 3000,
          };
        });
    },
    loginUser() {
      axios
        .post("login", this.user)
        .then((response) => {
          localStorage.setItem("token", response.data.access_token);
          this.saveUserToken(response.data.access_token);
          this.setUserDetails();
          this.$router.push({ name: "Pocetna" });
        })
        .catch((err) => {
          this.snackbar = {
            color: "#C62828",
            show: true,
            text: "Greška, email ili lozinka su neispravni.",
            timeout: 3000,
          };
        });
    },
  },
  computed: {
    passwordConfirmationRule() {
      return this.password === this.rePassword || "Lozinka se mora podudrati.";
    },
  },
};
</script>

<style></style>
