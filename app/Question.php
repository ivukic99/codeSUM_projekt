<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;

class Question extends Model
{
    protected $table = 'pitanja';

    public static function getQuestions(){
    	return Question::all();
    }

    public static function getQuestion($id){
    	return Question::where('id', $id)->take(1)->get();
    }

    public function getAnswers(){
    	return $this->hasMany(Answer::class, 'Pitanja_id')->get();
    }
}
