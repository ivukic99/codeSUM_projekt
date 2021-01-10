<template>

    <v-container>
        <NavbarAdmin />
        <h3>Tečajevi</h3>

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