<template>
  <div>
      <Navbar />

      <h1>ProgrammingLesson.</h1>

      <codemirror v-model="code" :options="cmOption" />

      <v-btn color="primary" @click="test()">testiraj</v-btn>

      <div id="zezanje"></div>

      <v-btn color="primary" @click="test2()">testiraj2</v-btn>

      
  </div>
</template>

<script>
import Navbar from '../../components/app/NavbarUser.vue';
import { codemirror } from 'vue-codemirror';
import 'codemirror/lib/codemirror.css';
export default {
    components: {
        Navbar,
        codemirror
    },
    data() {
      return {
        code: 'alert("hello")',
        dat: '<div onload="alert("test")">haha</div>',
        cmOption: {
          tabSize: 4,
          styleActiveLine: true,
          lineNumbers: true,
          line: true,
          foldGutter: true,
          styleSelectedText: true,
          mode: 'text/javascript',
          keyMap: "default",
          matchBrackets: true,
          
        },
      }
  },
  mounted() {
      let recaptchaScript = document.createElement('script')
      recaptchaScript.setAttribute('id', 'skripta')
      recaptchaScript.textContent = this.code
      document.head.appendChild(recaptchaScript)
    },
   methods:{
   	test(){
   		let recaptchaScriptt = document.createElement('script')
      	recaptchaScriptt.textContent = this.code
      	document.head.appendChild(recaptchaScriptt)
   	},
   	test2(){
   		let varijabla = document.getElementById('zezanje')
   		varijabla.append(challengeFunction())
   	}
   }

}
</script>

<style>

</style>