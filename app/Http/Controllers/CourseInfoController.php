<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseInfoController extends Controller
{
    public function index($id){
    	$course = Course::where('id', $id)->get()->first();
    	$broj_korisnika = $course->getNumberOfUsers($id);
    	$razina = Course::where('id', $id)->get('Razina')->first()->Razina;
    	$vrijeme = Course::where('id', $id)->get('Vrijeme')->first()->Vrijeme;

    	return ["broj_korinsika" => $broj_korisnika, "razina" => $razina, "vrijeme" => $vrijeme];
    }
}
