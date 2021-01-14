<template>
  <v-app>
    <NavbarAdmin />

    <v-dialog v-model="dialog" persistent max-width="600px">
      <v-card>
        <v-card-title>
          <span class="headline">Uredi osobne podatke</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col>
                <v-text-field v-model="editedData.name"></v-text-field>
                <v-text-field
                  v-model="editedData.email"
                ></v-text-field>
                <v-text-field v-model="editedData.role"></v-text-field>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" @click="dialog = false"> Odustani </v-btn>
          <v-btn color="blue darken-1" @click="updateUsers(editedData.id)"> Spremi </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

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
            <!-- dialog -->

            <!-- kraj dialoga -->

            <tr>
              <td>{{ row.item.name }}</td>
              <td>{{ row.item.email }}</td>
              <td>{{ row.item.role.name }}</td>
              <td>{{ row.item.created_at }}</td>
              <td>
                <v-btn class="mx-2" fab dark small color="success" @click="onClick(row.item.id)">
                  <v-icon dark>mdi-pencil</v-icon>
                </v-btn>
              </td>
              <td>
                <v-btn
                  class="mx-2"
                  fab
                  dark
                  small
                  color="red"
                  @click="deleteUser(row.item.id)"
                >
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
import { mapGetters } from "vuex";
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
      dialog: false,
      editedData: {},
    };
  },

  methods: {
    onClick(id) {
      for (let i = 0; i < this.users_data.length; i++) {
        if (this.users_data[i].id == id){
          this.editedData = {
            'id': this.users_data[i].id,
            'name': this.users_data[i].name,
            'email': this.users_data[i].email,
            'role': this.users_data[i].role.name
          }
        };
      };
      this.dialog = true;
      // console.log(this.editedData)
    },
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

    deleteUser(user_id) {
      /* this.isLoading = true */

      axios
        .post(`http://localhost/codeSUM_projekt/public/api/users/delete/${user_id}`)
        .then((response) => {
          // console.log(response.data)
          this.getUsers();
          //   this.isLoading = false
        })
        .catch((err) => {
          console.log("Dogodila se greška!");
        });
    },

    updateUsers(user_id) {
      axios
        .post(
          `http://localhost/codeSUM_projekt/public/api/users/update/${user_id}`,
          this.editedData
        )
        .then((response) => {
          this.getUsers();
          this.dialog = false;
        })
        .catch((err) => {
          console.log("Dogodila se greška!");
        });
    },
  },

  computed: {
    headers() {
      return [
        { text: "Ime korisnika", value: "Ime korisnika" },
        { text: "Email", value: "Email" },
        { text: "Uloga", value: "Uloga" },
        { text: "Datum registracije", value: "Datum registracije" },
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
