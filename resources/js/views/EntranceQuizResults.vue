<template>
  <div style="height: 100vh;" class="d-flex justify-center align-center">
      <Navbar />

      <article>
	    <img src="https://i.imgur.com/EHgyT11.png" alt="phones"/>
	    <div class="text">
	        <h3 style="color: #1B4188;">CodeSUM</h3>
	        <h1>{{ heading }}</h1>
	        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed orci vehicula, laoreet dui eget, suscipit augue. Donec ultricies nibh ut ligula suscipit bibendum. Cras commodo magna massa, vitae congue neque blandit at. Sed non lectus libero. Proin id gravida quam.</p>
	        <a href="#">read more</a>
	    </div>
	</article>
      
  </div>
</template>

<script>
import Navbar from '../components/Navbar.vue';
export default {
    components: {
        Navbar
    },
    data(){
    	return{
    		heading: '',
    		content: ''	
    	}
    },
    mounted(){
    	let score = this.$route.params.score

    	if(score >= 70){
    		this.heading = 'Data science'
    	}
    	else if(score < 70 && score >= 50){
    		this.heading = 'Algorithms'
    	}else if(score < 50 && score >= 40){
    		this.heading = 'Databases'
    	}else{
    		this.heading = 'Basics of programming'
    	}

    }

}
</script>

<style scoped>
@import url(https://fonts.googleapis.com/css?family=RobotoDraft:400,300,500,700);

body {
    background: #EDF0F3;
    font-family: 'RobotoDraft', sans-serif;
    font-size: 16px;
}

article {
    background: #F7F9FB;
    box-shadow: 0 2px 8px rgba(0,0,0,.1);
    height: 440px;
    margin: 64px auto;
    position: relative;
    width: 880px;
}

img {
    border: solid 16px #FFF;
    box-sizing: border-box;
    box-shadow: 8px 8px 32px rgba(0,0,0,.1);
    position: absolute;
    top: -32px;
    left: -32px;
    width: 50%;
}


.text {
    width: 50%;
    box-sizing: border-box;
    padding: 32px;
    position: absolute;
    top: 0;
    right: 0;
}

h3 {
    color: #4FC1E9;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 1px;
    margin: 8px 0;
    text-transform: uppercase;
}

h1 {
    color: #656D78;
    font-size: 32px;
    font-weight: 300;
    margin: 16px 0;
}

p {
    color: #656D78;
    font-size: 15px;
    font-weight: 400;
    line-height: 1.8;
    margin: 8px 0;
}
</style>