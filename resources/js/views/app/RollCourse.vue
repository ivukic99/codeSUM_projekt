<template>
  <div>
    <Navbar />

    <v-container>
      <v-row class="top-container">
        <v-col class="d-flex justify-center" sm="12" md="12" lg="4">
          <div class="top-box d-flex flex-column justify-center align-center">
            <div class="top-container-text">
              {{ numberOfUsers }}
            </div>
            <div class="top-container-subtext">Broj upisanih korisnika</div>
          </div>
        </v-col>

        <v-col class="d-flex justify-center" m="12" md="12" lg="4">
          <div class="top-box d-flex flex-column justify-center align-center">
            <div class="top-container-text">
              {{ hours }}
            </div>
            <div class="top-container-subtext">Ukupno vrijeme trajanja</div>
          </div>
        </v-col>

        <v-col class="d-flex justify-center" m="12" md="12" lg="4">
          <div class="top-box d-flex flex-column justify-center align-center">
            <div class="top-container-text">
              {{ level }}
            </div>
            <div class="top-container-subtext">Razina tečaja</div>
          </div>
        </v-col>
      </v-row>

      <hr />
    </v-container>
    <!--Prikaz broja završenih lekcija od ukupnog broja-->
    <div v-if="dataReady">
      <v-container fluid class="d-flex justify-center" v-if="!isFinished">
        <div class="course-status-container d-flex align-center">
          <div>Broj preostalih lekcija: {{ remaining }}</div>
        </div>
      </v-container>

      <v-container fluid class="d-flex justify-center" v-else>
        <div
          class="course-status-container-green d-flex align-center"
          style="height: 100px !important"
        >
          <div>
            Čestitamo! Certifikat možete preuzeti
            <v-btn text @click="ispis(getUserDetails.details.id)">ovdje</v-btn>
          </div>
        </div>
      </v-container>
    </div>

    <v-container v-if="dataReady" style="background: lightgrey" fluid>
      <!--Ispis svih lekcija-->

      <!--Programske lekcije-->
      <div class="lesson-container">
        <div class="pa-5">
          <h5>Programske lekcije</h5>
        </div>
        <div
          class="lesson-box d-flex justify-start align-center"
          v-for="(lesson, index) in lessons.programming_lessons"
          :key="index"
        >
          <div class="lesson-box-part">
            <i
              v-if="finishedLessons.programske_lekcije.includes(lesson.id)"
              class="fas fa-check green-item"
            ></i>
            <i v-else class="fas fa-times yellow-item"></i>
          </div>
          <div class="d-flex align-center" style="width: 100%">
            <div class="lesson-name-box">
              {{ lesson.Naziv }}
            </div>
            <div class="d-flex justify-end lesson-button-box">
              <v-btn color="#1B4188" @click="goToRoute(lesson.id)">
                Kreni
              </v-btn>
            </div>
          </div>
        </div>
      </div>

      <hr class="lesson-hr" />

      <!--Kvizovi-->
      <div class="lesson-container">
        <div class="pa-5">
          <h5>Kvizovi</h5>
        </div>
        <div
          class="lesson-box d-flex justify-start align-center"
          v-for="(lesson, index) in lessons.quiz_lessons"
          :key="index"
        >
          <div class="lesson-box-part">
            <i
              v-if="finishedLessons.quiz_lekcije.includes(lesson.id)"
              class="fas fa-check green-item"
            ></i>
            <i v-else class="fas fa-times yellow-item"></i>
          </div>
          <div class="d-flex align-center" style="width: 100%">
            <div class="lesson-name-box">
              {{ lesson.Naziv }}
            </div>
            <div class="d-flex justify-end lesson-button-box">
              <v-btn color="#1B4188"> Kreni </v-btn>
            </div>
          </div>
        </div>
      </div>

      <hr class="lesson-hr" />

      <!--Tekstualne lekcije-->
      <div class="lesson-container">
        <div class="pa-5">
          <h5>Tekstualne lekcije</h5>
        </div>
        <div
          class="lesson-box d-flex justify-start align-center"
          v-for="(lesson, index) in lessons.text_lessons"
          :key="index"
        >
          <div class="lesson-box-part">
            <i
              v-if="finishedLessons.tekst_lekcije.includes(lesson.id)"
              class="fas fa-check green-item"
            ></i>
            <i v-else class="fas fa-times yellow-item"></i>
          </div>
          <div class="d-flex align-center" style="width: 100%">
            <div class="lesson-name-box">
              {{ lesson.Naziv }}
            </div>
            <div class="d-flex justify-end lesson-button-box">
              <v-btn color="#1B4188"> Kreni </v-btn>
            </div>
          </div>
        </div>
      </div>

      <hr class="lesson-hr" />

      <!--Video lekcije-->
      <div class="lesson-container">
        <div class="pa-5">
          <h5>Videolekcije</h5>
        </div>
        <div
          class="lesson-box d-flex justify-start align-center"
          v-for="(lesson, index) in lessons.video_lessons"
          :key="index"
        >
          <div class="lesson-box-part">
            <i
              v-if="finishedLessons.video_lekcije.includes(lesson.id)"
              class="fas fa-check green-item"
            ></i>
            <i v-else class="fas fa-times yellow-item"></i>
          </div>
          <div class="d-flex align-center" style="width: 100%">
            <div class="lesson-name-box">
              {{ lesson.Naziv }}
            </div>
            <div class="d-flex justify-end lesson-button-box">
              <v-btn color="#1B4188"> Kreni </v-btn>
            </div>
          </div>
        </div>
      </div>
    </v-container>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Navbar from "../../components/app/NavbarUser.vue";
export default {
  components: {
    Navbar,
  },
  data() {
    return {
      lessons: [],
      finishedLessons: [],
      numberOfUsers: "",
      hours: "",
      level: "",
      dataReady: false,
      isFinished: false,
      remaining: null,
    };
  },
  methods: {
    ispis(user_id) {
      axios
        .get(`download/${user_id}`, {responseType: 'blob'})
        .then((response) => {
          console.log(response);
          var fileURL = window.URL.createObjectURL(new Blob([response.data]));

          var fileLink = document.createElement("a");

          fileLink.href = fileURL;

          fileLink.setAttribute("download", "certifikat.pdf");

          document.body.appendChild(fileLink);

          fileLink.click();
        })
        .catch((err) => {
          console.log("Dogodila se greška!");
        });
    },
    getFinishedLessons() {
      axios
        .post("enrolled_course/finished_lessons", {
          Tecaj_id: this.$route.params.tecaj_id,
          User_id: this.getUserDetails.details.id,
        })
        .then((response) => {
          console.log(response.data);
          this.finishedLessons = response.data;
          this.dataReady = true;
          this.checkIfFinished();
          this.LessonsRemaining();
        })
        .catch((err) => {
          console.log("Dogodila se greška!");
        });
    },
    checkIfFinished() {
      this.isFinished =
        this.lessons.programming_lessons.length ===
          this.finishedLessons.programske_lekcije.length &&
        this.lessons.quiz_lessons.length ===
          this.finishedLessons.quiz_lekcije.length &&
        this.lessons.text_lessons.length ===
          this.finishedLessons.tekst_lekcije.length &&
        this.lessons.video_lessons.length ===
          this.finishedLessons.video_lekcije.length;
    },
    LessonsRemaining() {
      let finished_lessons =
        this.finishedLessons.programske_lekcije.length +
        this.finishedLessons.quiz_lekcije.length +
        this.finishedLessons.video_lekcije.length +
        this.finishedLessons.tekst_lekcije.length;
      let all_lessons =
        this.lessons.programming_lessons.length +
        this.lessons.quiz_lessons.length +
        this.lessons.video_lessons.length +
        this.lessons.text_lessons.length;

      this.remaining = all_lessons - finished_lessons;
    },
    goToRoute(id) {
      this.$router.push({
        name: "ProgrammingLesson",
        params: { tecaj_id: this.$route.params.tecaj_id, zadatak_id: id },
      });
    },
  },
  computed: {
    ...mapGetters(["getUserDetails"]),
  },
  created() {
    axios
      .get(`course_info/${this.$route.params.tecaj_id}`)
      .then((response) => {
        console.log(response.data);
        this.numberOfUsers = response.data.broj_korinsika;
        this.level = response.data.razina;
        this.hours = response.data.vrijeme + " h";
      })
      .catch((err) => {
        console.log("Dogodila se greška!");
      });

    axios
      .post("enrolled_course", { Tecaj_id: this.$route.params.tecaj_id })
      .then((response) => {
        console.log(response.data);
        this.lessons = response.data;
      })
      .catch((err) => {
        console.log("Dogodila se greška!");
      });
  },
  watch: {
    getUserDetails: function (val) {
      this.getFinishedLessons();
    },
  },
};
</script>

<style scoped>
.top-container {
  padding: 15px;
}
.top-box {
  background: #2a60c4ad;
  height: 150px;
  width: 250px;
  border-radius: 10px;
}

.top-container-text {
  color: white;
  font-size: 48px;
}

.top-container-subtext {
  color: white;
  font-size: 18px;
}

.lesson-box {
  background: white;
  height: 60px;
  border-radius: 5px;
  margin-bottom: 10px;
}

.lesson-box-part {
  display: flex;
  justify-content: center;
  align-items: center;
  background: #2a60c4ad;
  height: 60px;
  width: 80px;
  border-radius: 5px;
}

.green-item {
  color: green;
  font-size: 24px;
}

.yellow-item {
  color: yellow;
  font-size: 24px;
}

.lesson-hr {
  background: #1b4188;
  height: 1px;
}

.lesson-name-box {
  width: 50%;
  margin-left: 15px;
  font-size: 16px;
}

.lesson-button-box {
  width: 50%;
  margin-right: 15px;
}

.course-status-container {
  background: yellow;
  height: 60px;
  max-width: 280px;
  padding: 30px;
  border-radius: 20px;
  margin-bottom: 25px;
}

.course-status-container-green {
  background: green;
  height: 60px;
  max-width: 280px;
  padding: 30px;
  border-radius: 20px;
  margin-bottom: 25px;
}

.course-status-container div {
  color: black;
  font-size: 18px;
}

.course-status-container-green div {
  color: white;
  font-size: 16px;
  padding: 5px;
}
</style>