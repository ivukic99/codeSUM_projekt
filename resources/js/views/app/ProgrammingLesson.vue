<template>
  <div>
      <Navbar />

      <v-container>
        <div class="d-flex justify-content-between align-center mb-5">
          <h3>Programska lekcija</h3>
            <v-btn
              class="mx-2"
              fab
              dark
              color="#1B4188"
              @click="goBack"
            >
              <v-icon dark>
                mdi-login
              </v-icon>
            </v-btn>
          </div>
      </v-container>

      <v-container>
        <v-row>
          <v-col sm="12" md="12" lg="6">
            <div class="code-text" id="code-text-box">
              
            </div>
          </v-col>
          <v-col sm="12" md="12" lg="6">
            
            <codemirror v-model="data.challengeFunction" :options="cmOption"/>

            <div class="d-flex justify-end align-center mt-3 mb-5">

                <v-btn v-if="!correctAnswer" class="mr-2" color="grey" @click="showHint">Hint</v-btn>

                <v-btn v-if="!correctAnswer" color="primary" @click="checkCode">Provjeri</v-btn>

                <v-btn v-if="correctAnswer" color="green" @click="saveResult()">Predaj</v-btn>

                <v-btn color="yellow" class="ml-2" @click="reset()"><span style="color: black;">Reset</span></v-btn>
            </div>

            <div class="result-box" id="result">
                
            </div>

          </v-col>
        </v-row>
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

      
  </div>
</template>

<script>
import Navbar from '../../components/app/NavbarUser.vue';
import { codemirror } from 'vue-codemirror';
import 'codemirror/lib/codemirror.css';
import 'codemirror/mode/javascript/javascript.js'
export default {
    components: {
        Navbar,
        codemirror
    },
    data() {
      return {
        score: 5,
        codeText: '<p>Ovo je neki tekst</p> <br/> <p><b>Sljedeći redak</b></p>',
        code: 'function challengeFunction() {  }',
        data: {
          name: '',
          description: '',
          challengeFunction: '',
          hint: '',
          result: ''
        },
        saveFunction: '',
        correctAnswer: false,
        cmOption: {
          tabSize: 4,
          styleActiveLine: true,
          lineNumbers: true,
          line: true,
          foldGutter: true,
          styleSelectedText: true,
          mode: 'javascript',
          keyMap: "default",
          matchBrackets: true,  
        },
        snackbar: {
            color: "success",
            show: false,
            text: "Bravo! Uspješno ste riješili zadatak :)",
            timeout: 3000,
          }
      }
  },
  created(){
    axios
    .get(`programming_lessons/show/${this.$route.params.zadatak_id}`)
    .then((response) => {
      console.log(response.data)
      let data = response.data[0]

      if(data.ChallengeFunkcija == null){
        data.ChallengeFunkcija = 'function challengeFunction() {  }'
      }
      
      this.data.name = data.Naziv
      this.data.description = data.Opis 
      this.data.challengeFunction = data.ChallengeFunkcija
      this.data.hint = data.Hint
      this.data.result = data.Rezultat

      this.saveFunction = data.ChallengeFunkcija

      this.setDetails()
    })
    .catch((err) => {
      console.log("Dogodila se greška!")
    });
  },
  mounted(){
    let challengeScript = document.createElement('script')
    challengeScript.setAttribute('id', 'challengeScript')
    document.head.appendChild(challengeScript)
  },
   methods:{
   	saveCode(){
 		  let challengeScript = document.getElementById('challengeScript')
      challengeScript.remove()

      challengeScript = document.createElement('script')
      challengeScript.setAttribute('id', 'challengeScript')
      document.head.appendChild(challengeScript)

      challengeScript.textContent = ''
    	challengeScript.textContent = this.data.challengeFunction
      	
   	},
   	runCode(){
   		let result = document.getElementById('result')
      result.textContent = ''
   		result.append(challengeFunction())
   	},
    checkCode(){
      this.saveCode()
      this.runCode()

      let result = document.getElementById('result').textContent

      if(result == this.data.result){
        this.correctAnswer = true
      }

      if(this.correctAnswer){
        this.snackbar = {
            color: "success",
            show: true,
            text: "Bravo! Uspješno ste riješili zadatak :)",
            timeout: 3000,
          }
        }else{
          this.snackbar = {
            color: "#C62828",
            show: true,
            text: "Netočno! Pokušajte ponovo.",
            timeout: 3000,
          };
        }


    },
    goBack(){
      this.$router.go(-1)
    },
    setDetails(){
        /*
      let script = document.createElement('script')
      script.setAttribute('id', 'skripta')
      script.textContent = this.code
      document.head.appendChild(script)
      */

      let codeText = document.getElementById('code-text-box')
      codeText.innerHTML = '<div>' + this.data.description + '</div>'
    },
    showHint(){
      this.score = this.score - 2

      let codeText = document.getElementById('code-text-box')
      codeText.innerHTML = codeText.innerHTML + '<br/>' + '<div>' + '<h4>' + 'Hint - izgubili ste 2 boda' + '</h4>' + '<br/>' + '<div>' + this.data.hint + '<div>' + '</div>'
   },
   reset(){
    this.data.challengeFunction = this.saveFunction
   },
   saveResult(){
    console.log(this.score)
   }  
   },

}
</script scoped>

<style>
.code-text{
  background: lightgrey;
  height: 100vh;
  color: black;
  overflow-y: scroll;
  word-wrap: break-word;
}

.CodeMirror {
  border: 1px solid #eee;
  height: 60vh;
}

.code-text{
  padding: 12px;
}

.result-box{
  background: #222831;
  padding: 12px;
  height: 30vh;
  color: white;
}
</style>