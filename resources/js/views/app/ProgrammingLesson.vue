<template>
  <div>
      <Navbar />

      <h1>ProgrammingLesson.</h1>

      <v-container>
        <v-row>
          <v-col sm="12" md="12" lg="6">
            <div class="code-text">
              {{ codeText }}
            </div>
          </v-col>
          <v-col sm="12" md="12" lg="6">
            
            <codemirror v-model="code" :options="cmOption"/>

            <div class="d-flex justify-end align-center mt-3 mb-5">
                <v-btn v-if="!correctAnswer" color="primary" @click="saveCode(); runCode()">Provjeri</v-btn>

                <v-btn v-if="correctAnswer" color="green" @click="test()">Predaj</v-btn>

                <v-btn color="yellow" class="ml-2" @click="test()"><span style="color: black;">Reset</span></v-btn>
            </div>

            <div class="result-box" id="result">
                
            </div>

          </v-col>
        </v-row>
      </v-container>

      
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
        codeText: 'LoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLorem',
        code: 'function challengeFunction() {  }',
        dat: '<div onload="alert("test")">haha</div>',
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
      }
  },
  mounted() {
    /*
      let script = document.createElement('script')
      script.setAttribute('id', 'skripta')
      script.textContent = this.code
      document.head.appendChild(script)
      */
      
    },

   methods:{
   	saveCode(){
   		let challengeScript = document.createElement('script')
      	challengeScript.textContent = this.code
      	document.head.appendChild(challengeScript)
   	},
   	runCode(){
   		let result = document.getElementById('result')
   		result.append(challengeFunction())
   	}
   }

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

.result-box{
  background: #222831;
  height: 30vh;
  color: white;
}
</style>