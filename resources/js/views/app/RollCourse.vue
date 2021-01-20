<template>
  <div>
      <Navbar />

      <v-container>
      	
      	<v-row class="top-container">
      		
      		<v-col class="d-flex justify-center" sm="12" md="12" lg="4">
	      		<div class="top-box d-flex flex-column justify-center align-center">
	      			<div class="top-container-text">
	      				236
	      			</div>
	      			<div class="top-container-subtext">
	      				Broj upisanih korisnika
	      			</div>
	      		</div>
      		</v-col>

      		<v-col class="d-flex justify-center" m="12" md="12" lg="4">
	      		<div class="top-box d-flex flex-column justify-center align-center">
	      			<div class="top-container-text">
	      				10 h
	      			</div>
	      			<div class="top-container-subtext">
	      				Ukupno vrijeme trajanja
	      			</div>
	      		</div>
      		</v-col>

      		<v-col class="d-flex justify-center" m="12" md="12" lg="4">
	      		<div class="top-box d-flex flex-column justify-center align-center">
	      			<div class="top-container-text">
	      				Početnik
	      			</div>
	      			<div class="top-container-subtext">
	      				Razina tečaja
	      			</div>
	      		</div>
      		</v-col>

      	</v-row>

      	<hr />

      	</v-container>

      	<v-container style="background: lightgrey;" fluid>

      	<!--Ispis svih lekcija-->


      	<!--Programske lekcije-->
      	<div class="lesson-container">
      		<div class="pa-5">
      			<h5>Programske lekcije</h5>
      		</div>
      		<div class="lesson-box d-flex justify-start align-center">
      			<div class="lesson-box-part">
      				<i class="fas fa-check"></i>
      			</div>
      			<div class="d-flex  align-center" style="width: 100%;">
      				<div class="lesson-name-box">
      					Lekcija 1
      				</div>
      				<div class="d-flex justify-end lesson-button-box">
      					<v-btn color="#1B4188">
      						Kreni
      					</v-btn>
      				</div>
      			</div>
      		</div>
      	</div>

      	<hr class="lesson-hr"/>

      	<!--Kvizovi-->
      	<div class="lesson-container">
      		<div class="pa-5">
      			<h5>Kvizovi</h5>
      		</div>
      		<div class="lesson-box d-flex justify-start align-center">
      			<div class="lesson-box-part">
      				<i class="fas fa-check"></i>
      			</div>
      			<div class="d-flex  align-center" style="width: 100%;">
      				<div class="lesson-name-box">
      					Lekcija 1
      				</div>
      				<div class="d-flex justify-end lesson-button-box">
      					<v-btn color="#1B4188">
      						Kreni
      					</v-btn>
      				</div>
      			</div>
      		</div>
      	</div>

      	<hr class="lesson-hr"/>

      	<!--Tekstualne lekcije-->
      	<div class="lesson-container">
      		<div class="pa-5">
      			<h5>Tekstualne lekcije</h5>
      		</div>
      		<div class="lesson-box d-flex justify-start align-center">
      			<div class="lesson-box-part">
      				<i class="fas fa-check"></i>
      			</div>
      			<div class="d-flex  align-center" style="width: 100%;">
      				<div class="lesson-name-box">
      					Lekcija 1
      				</div>
      				<div class="d-flex justify-end lesson-button-box">
      					<v-btn color="#1B4188">
      						Kreni
      					</v-btn>
      				</div>
      			</div>
      		</div>
      	</div>

      	<hr class="lesson-hr"/>

      	<!--Video lekcije-->
      	<div class="lesson-container">
      		<div class="pa-5">
      			<h5>Videolekcije</h5>
      		</div>
      		<div class="lesson-box d-flex justify-start align-center">
      			<div class="lesson-box-part">
      				<i class="fas fa-check"></i>
      			</div>
      			<div class="d-flex  align-center" style="width: 100%;">
      				<div class="lesson-name-box">
      					Lekcija 1
      				</div>
      				<div class="d-flex justify-end lesson-button-box">
      					<v-btn color="#1B4188">
      						Kreni
      					</v-btn>
      				</div>
      			</div>
      		</div>
      	</div>

      	</v-container>
      
  </div>
</template>

<script>
import Navbar from '../../components/app/NavbarUser.vue';
export default {
    components: {
        Navbar
    },
    data(){
    	return{

    	}
    }

}
</script>

<style scoped>

.top-container{
	padding: 15px;
}
.top-box{
	background: #2a60c4ad;
	height: 150px;
	width: 250px;
	border-radius: 10px;
}

.top-container-text{
	color: white;
	font-size: 48px;
}

.top-container-subtext{
	color: white;
	font-size: 18px;
}

.lesson-box{
	background: white;
	height: 60px;
	border-radius: 5px;
}

.lesson-box-part{
	display: flex;
	justify-content: center;
	align-items: center;
	background: #2a60c4ad;
	height: 60px;
	width: 80px;
	border-radius: 5px;
}

.lesson-box-part i{
	color: green;
	font-size: 24px;
}

.lesson-hr{
	background: #1B4188;
	height: 1px;
}

.lesson-name-box{
	width: 50%; 
	margin-left: 15px;
	font-size: 16px;
}

.lesson-button-box{
	width: 50%; 
	margin-right: 15px;
}
</style>