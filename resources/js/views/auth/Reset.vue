<template>
  <v-app style="background-color: #80D8FF" class="ml-0">
    <v-row justify="center" align="center">
      <v-card class="mx-auto" width="450">
        <v-card-title>
          <h3 class="text-center">
            <span style="color: #1b4188"> Promijenite lozinku </span>
          </h3>
        </v-card-title>
        <v-card-text>
          <v-form>
            <v-text-field
              id="password"
              label="Unesite novu lozinku"
              name="password"
              :type="show1 ? 'text' : 'password'"
              color="#1B4188"
              v-model="password"
              :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
              :rules="[rules.required, rules.min]"
              hint="Najmanje 8 znakova"
              @click:append="show1 = !show1"
            />
            <v-text-field
              id="password"
              label="Ponovite novu lozinku"
              name="password"
              :type="show1 ? 'text' : 'password'"
              color="#1B4188"
              v-model="password_confirm"
              :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
              :rules="[rules.required, rules.min, passwordConfirmationRule]"
              hint="Najmanje 8 znakova"
              @click:append="show1 = !show1"
            />
          </v-form>
          <div class="mt-3">
            <v-btn rounded color="#1B4188" block dark @click.prevent="resetSubmit"
              >Potvrdi promjenu</v-btn
            >
          </div>
        </v-card-text>
      </v-card>
    </v-row>
  </v-app>
</template>

<script>
import axios from "axios";

export default {
  name: "Reset",
  data() {
    return {
      show1: false,
      password: "",
      password_confirm: "",
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
  computed: {
    passwordConfirmationRule() {
      return this.password === this.password_confirm || "Lozinka se mora podudrati.";
    },
  },
  methods: {
    resetSubmit() {
      axios
        .post("reset", {
          password: this.password,
          password_confirm: this.password_confirm,
          token: this.$route.params.token,
        })
        .then((response) => {
          this.$router.push({ name: "Pocetna" });
        });
    },
  },
};
</script>

<style></style>
