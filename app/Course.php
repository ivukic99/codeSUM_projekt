<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\User_course;
use App\ProgrammingLesson;
use App\Quiz;
use App\TextLesson;
use App\VideoLesson;

class Course extends Model
{
    protected $table = 'tecaj';

    protected $fillable = ['Naziv', 'Opis', 'Razina', 'Vrijeme', 'Kategorije_id', 'Kreator_id','created_at', 'updated_at'];

    public function getNumberOfUsers($course_id){
    	$course = Course::where('id', $course_id)->first();

    	$arr = $course->hasMany(User_course::class, 'Tecaj_id')->get();
    	return count($arr);
    }

    public function getNumberOfLessons($course_id){
    	$course = Course::where('id', $course_id)->first();

    	$prog_arr = $course->hasMany(ProgrammingLesson::class, 'Tecaj_id')->get();
    	$quiz_arr = $course->hasMany(Quiz::class, 'Tecaj_id')->get();
    	$text_arr = $course->hasMany(TextLesson::class, 'Tecaj_id')->get();
    	$video_arr = $course->hasMany(VideoLesson::class, 'Tecaj_id')->get();
    	return count($prog_arr) + count($quiz_arr) + count($text_arr) + count($video_arr);
    }
}
