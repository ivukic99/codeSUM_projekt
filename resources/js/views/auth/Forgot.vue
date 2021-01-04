<template>
  <v-app style="background-color: #80d8ff" class="ml-0">
    <v-row justify="center" align="center">
      <v-card class="mx-auto" width="450" style="background-color: #eeeeee">
        <span class="go-back">
          <v-btn icon class="ml-2 mt-2" @click="goBack()">
            <v-icon color="blue-grey darken-2">mdi-keyboard-backspace</v-icon>
          </v-btn>
        </span>
        <v-card-text>
          <v-form>
            <v-card-title>
              <h3 class="text-center">
                <span style="color: #1b4188"> Zaboravili ste lozinku? </span>
              </h3>
            </v-card-title>
            <v-card-subtitle>Unesite email za kreiranje nove lozinke!</v-card-subtitle>
            <v-text-field
              label="Email"
              name="Email"
              type="text"
              color="#1B4188"
              v-model="email"
              :rules="[rules.required, rules.email]"
            />
          </v-form>

          <div class="mt-3 mb-3">
            <v-btn rounded color="#1B4188" block dark @click.prevent="forgotSubmit"
              >Pošalji email</v-btn
            >
          </div>
        </v-card-text>
      </v-card>
    </v-row>

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
export default {
  name: "Forgot",
  data() {
    return {
      email: "",
      snackbar: {
        color: "success",
        show: false,
        text: "Email je uspješno poslan. Provjerite email!",
        timeout: 3000,
      },
      rules: {
        required: (value) => !!value,
        email: (value) => {
          const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return pattern.test(value);
        },

        emailMatch: () => "Email i lozinka se ne podudaraju.",
      },
    };
  },
  methods: {
    goBack() {
      return this.$router.go(-1);
    },
    forgotSubmit() {
      axios
        .post("http://localhost/codeSUM_projekt/public/api/forgot", { email: this.email })
        .then((response) => {
          console.log(response);
          if (response.data) {
            this.snackbar.show = true;
          }
        })
        .catch((err) => {
          this.snackbar = {
            color: "#C62828",
            show: true,
            text: "Greška. Email ne postoji!",
            timeout: 3000,
          };
        });
    },
  },
};
</script>

<style></style>
