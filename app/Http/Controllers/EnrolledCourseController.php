<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\ProgrammingLesson;
use App\Quiz;
use App\TextLesson;
use App\VideoLesson;
use App\FinishedLesson;

class EnrolledCourseController extends Controller
{
    public function index(Request $request){
    	$course = Course::where('id', $request->Tecaj_id)->get()->first();

    	$programming_lessons = $course->hasMany(ProgrammingLesson::class, 'Tecaj_id')->get(['id', 'Naziv']);
    	$quiz_lessons = $course->hasMany(Quiz::class, 'Tecaj_id')->get(['id', 'Naziv']);
    	$text_lessons = $course->hasMany(TextLesson::class, 'Tecaj_id')->get(['id', 'Naziv']);
    	$video_lessons = $course->hasMany(VideoLesson::class, 'Tecaj_id')->get(['id', 'Naziv']);

    	return response()->json(['programming_lessons' => $programming_lessons, 'quiz_lessons' => $quiz_lessons, 'text_lessons' => $text_lessons, 'video_lessons' => $video_lessons]);
    }

    public function getFinishedLessons(Request $request){
    	$finished_lessons = FinishedLesson::where([['Tecaj_id', '=', $request->Tecaj_id], ['User_id', '=', $request->User_id]])->get();

    	$programming_lessons = array();
    	$quiz_lessons = array();
    	$text_lessons = array();
    	$video_lessons = array();

    	foreach ($finished_lessons as $lesson) {
    		if(!is_null($lesson->Video_lekcije_id)){
    			array_push($video_lessons, $lesson->Video_lekcije_id);
    		}elseif(!is_null($lesson->Pismene_lekcije_id)){
    			array_push($text_lessons, $lesson->Pismene_lekcije_id);
    		}elseif(!is_null($lesson->Kviz_id)){
    			array_push($quiz_lessons, $lesson->Kviz_id);
    		}elseif(!is_null($lesson->Programski_zadaci_id)){
    			array_push($programming_lessons, $lesson->Programski_zadaci_id);
    		}
    	}

    	return response()->json(['video_lekcije' => $video_lessons, 'tekst_lekcije' => $text_lessons, 'quiz_lekcije' => $quiz_lessons, 'programske_lekcije' => $programming_lessons]);

    }
}
