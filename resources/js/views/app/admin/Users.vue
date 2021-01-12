<template>
  <v-app>
    <NavbarAdmin />
    <v-container>
      <div>
        <v-data-table
          :headers="headers"
          :items="users_data"
          item-key="name"
          class="elevation-1"
          :search="search"
        >
          <template v-slot:top>
            <v-text-field v-model="search" label="Search" class="mx-4"></v-text-field>
          </template>
          <template v-slot:item="row">
            <tr>
              <td>{{ row.item.name }}</td>
              <td>{{ row.item.email }}</td>
              <td>{{ row.item.role.name }}</td>
              <td>
                <v-btn class="mx-2" fab dark small color="success">
                  <v-icon dark>mdi-eye</v-icon>
                </v-btn>
              </td>
              <td>
                <v-btn class="mx-2" fab dark small color="red" @click="deleteUser(row.item.id)">
                  <v-icon dark>mdi-delete</v-icon>
                </v-btn>
              </td>
            </tr>
          </template>
        </v-data-table>
      </div>
    </v-container>
  </v-app>
</template>

<script>
import Axios from "axios";
import NavbarAdmin from "../../../components/app/NavbarAdmin";
export default {
  name: "Users",
  components: {
    NavbarAdmin,
  },

  data() {
    return {
      users_data: [],
      search: "",
    };
  },

  methods: {
    getUsers() {
      axios
        .get("http://localhost/codeSUM_projekt/public/api/users")
        .then((response) => {
          this.users_data = response.data;
          console.log(this.users_data);
        })
        .catch((err) => {
          console.log("Doslo je do pogreske!");
        });
    },

    deleteUser(user_id){

        /* this.isLoading = true */

        axios
        .post(`http://localhost/codeSUM_projekt/public/api/users/delete/${user_id}`)
        .then((response) => {
            // console.log(response.data)
            this.getUsers()
        //   this.isLoading = false
        })
        .catch((err) => {
          console.log("Dogodila se greška!")
        });
      }
  },

  computed: {
    headers() {
      return [
        { text: "Ime korisnika", value: "Ime korisnika" },
        { text: "Email", value: "Email" },
        { text: "Uloga", value: "Uloga" },
        { text: "Pregled", value: "id" },
        { text: "Izbriši", value: "id" },
      ];
    },
  },

  created() {
    this.getUsers();
  },
};
</script>

<style></style>
