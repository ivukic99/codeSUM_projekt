<template>
  <div>
  	<div style="height: 100vh; z-index: 10;">
  	<Navbar />
  	<div class="text-animation-container" style="z-index: 1001">
  		<h1 data-text="Postani CodeSUM član!">Postani CodeSUM član!</h1>
  	</div>
  	<div class="wrap main-container" style="z-index: 1000;">
	  <div class="card">
	    <div class="back">
	    	<div class="d-flex align-center justify-center flex-column">
	    		<div class="card-text">
	    			$99.9 / Y
	    		</div>
	    		<div>
	    			<v-btn
				      class="ma-2"
				      outlined
				      color="white"
				      to="/auth"
				    >
				      Prijavi se
				    </v-btn>
	    		</div>
	    	</div>
	    </div>
	    <div class="front">
	    	<div class="d-flex align-center justify-center flex-column">
	    		<div class="card-text">
	    			Vanjski korisnik
	    		</div>
	    		<div>
	    			<i class="fas fa-user card-icon"></i>
	    		</div>
	    	</div>
	    </div>
	  </div>
	 <div class="card">
	    <div class="back">
	    	<div class="d-flex align-center justify-center flex-column">
	    		<div class="card-text">
	    			$0 / Y
	    		</div>
	    		<div>
	    			<v-btn
				      class="ma-2"
				      outlined
				      color="white"
				      to="/auth"
				    >
				      Prijavi se
				    </v-btn>
	    		</div>
	    	</div>
	    </div>
	    <div class="front">
	    	<div class="d-flex align-center justify-center flex-column">
	    		<div class="card-text">
	    			Student
	    		</div>
	    		<div>
	    			<i class="fas fa-user-graduate card-icon"></i>
	    		</div>
	    	</div>
		</div>
	  </div>
	 <div class="card">
	    <div class="back">
	    	<div class="d-flex align-center justify-center flex-column">
	    		<div class="card-text">
	    			Istraži tečajeve
	    		</div>
	    		<div>
	    			<v-btn
				      class="ma-2"
				      outlined
				      color="white"
				      to="/tecajevi_pregled"
				    >
				      Kreni
				    </v-btn>
	    		</div>
	    	</div>
	    </div>
	    <div class="front">
	    	<div class="d-flex align-center justify-center flex-column">
	    		<div class="card-text">
	    			Gost
	    		</div>
	    		<div>
	    			<i class="fas fa-binoculars card-icon"></i>
	    		</div>
	    	</div>
	    </div>
	  </div>
	</div>

	<!--Animation-->

    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

  </div>
</div>
</template>

<script>
import Navbar from '../components/Navbar.vue';
export default {
    components: {
        Navbar
    }

}
</script>

<style scoped>
*{
	border: none !important;
}

.main-container{
	display: flex;
	flex-direction: column;
}

.card-icon, .card-text{
	color: white;
	font-size: 28px;
}

.back {
  background-color: #2c5db8;
  -webkit-transform: rotateX(180deg);
  -moz-transform: rotateX(180deg);
  -o-transform: rotateX(180deg);
  -ms-transform: rotateX(180deg);
  transform: rotateX(180deg);
}
.front {
  background-color: #1B4188;
}

.card:hover .front {
  -webkit-transform: rotateX(180deg);
  -moz-transform: rotateX(180deg);
  -o-transform: rotateX(180deg);
  -ms-transform: rotateX(180deg);
  transform: rotateX(180deg);
}

.card:hover .back {
  -webkit-transform: rotateX(360deg);
  -moz-transform: rotateX(360deg);
  -o-transform: rotateX(360deg);
  -ms-transform: rotateX(360deg);
  transform: rotateX(360deg);
}
.wrap {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.card {
  margin: 10px;
  max-width: 220px;
  width: 220px;
  height: 200px;
  position: relative;
  perspective: 1000px;
}

.front, .back {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  -webkit-transition: 1s;
  -moz-transition: 1s;
  -ms-transition: 1s;
  -o-transition: 1s;
  transition: 1s;
  backface-visibility: hidden;
  border-radius: 20px;
}



.text-animation-container{
	display: none;
}



@media only screen and (min-width: 992px) {
.main-container{
display: flex;
flex-direction: row;
}

.card-icon, .card-text{
	color: white;
	font-size: 40px;
}

.card {
  margin: 10px;
  min-width: 300px;
  width: 400px;
  height: 200px;
  position: relative;
  perspective: 1000px;
}

h1 {
	position: absolute;
	text-transform: uppercase;
	font-size: 2rem;
	margin: 0;
	padding: 0;
	align-self: center;
	letter-spacing: 0.3rem;
	font-family: monospace;
	color: transparent;
}

h1:before {
	content: attr(data-text);
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	color: #000;
	overflow: hidden;
	border-right: 1px solid #000;
	animation: type 10s steps(30) infinite;
	white-space: nowrap;
}

.text-animation-container{
	padding: 0;
	margin: 0;
	display: flex;
	justify-content: center;
	align-content: center;
	height: 200px;
	
}

.circles{
	z-index: 1;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.circles li{
	z-index: 1;
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: lightgrey;
    animation: animate 25s linear infinite;
    bottom: -150px;
    
}
.circles li:nth-child(1){
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}
.circles li:nth-child(2){
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}
.circles li:nth-child(3){
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}
.circles li:nth-child(4){
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}
.circles li:nth-child(5){
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}
.circles li:nth-child(6){
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}
.circles li:nth-child(7){
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}
.circles li:nth-child(8){
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
}
.circles li:nth-child(9){
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}
.circles li:nth-child(10){
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}
@keyframes animate {
    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }
    100%{
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }
}

@keyframes type {
	0% {
		width: 0;
	}
	
	50% {
		width: 100%;
	}
	100% {
		width: 0;
	}
}



}
</style>