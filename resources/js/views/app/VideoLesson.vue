<template>
  <div class="main-container">
    <Navbar />
    <div class="child-container">
      <div class="lesson-text">
        <h4>Opis</h4>
        <p>{{ data.Opis }}</p>
      </div>
      <div class="lesson-link d-flex justify-center">
        <iframe
          width="400"
          height="300"
          src="https://www.youtube.com/embed/P6N9782MzFQ"
          frameborder="0" allowfullscreen
        >
        </iframe>
      </div>
      <div class="pa-3">
        <v-btn color="#1B4188" block @click="endLesson()">Završi lekciju</v-btn>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import axios from "axios";
import Navbar from "../../components/app/NavbarUser.vue";
export default {
  components: {
    Navbar,
  },
  data() {
    return {
      data: [],
    };
  },
  computed: {
    ...mapGetters(["getUserDetails"]),
  },
  methods: {
    endLesson() {
      let userId = this.getUserDetails.details.id;
      axios
        .post("video_lessons/done", {
          user_id: userId,
          zadatak_id: parseInt(this.$route.params.zadatak_id),
          Tecaj_id: this.$route.params.tecaj_id,
        })
        .then((response) => {
          console.log(response.data);
        })
        .catch((err) => {
          console.log("Dogodila se greška!");
        });
      this.$router.go(-1);
    },
  },
  created() {
    axios
      .get(`video_lesson/${this.$route.params.zadatak_id}`)
      .then((response) => {
        console.log(response.data);
        let data = {
            'Opis': response.data.Opis,
            'Poveznica': response.data.Poveznica.replace("/watch?", "/embed?")
        } 
        this.data = data;
        console.log(this.data)
      })
      .catch((err) => {
        console.log("Dogodila se greška!");
      });
  },
};
</script>

<style scoped>
.main-container {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: lightgrey;
}

.child-container {
  border-radius: 15px;
  height: auto;
  width: 300px;
  background: white;
  text-align: justify;
  line-height: 2;
}

.lesson-text {
  padding: 20px;
}

.lesson-text h4 {
  margin-bottom: 15px;
}

.lesson-link {
  padding: 20px;
}

.lesson-link a {
  font-size: 18px;
}

.lesson-link span {
  font-size: 18px;
}
@media only screen and (min-width: 400px) {
  .child-container {
    width: 600px;
  }
}
</style>