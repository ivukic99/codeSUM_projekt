<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Quiz extends Model
{
    protected $table = 'kviz';

    public function getQuizes(){
    	return Quiz::all();
    }

    public function getQuiz($id){
    	return Quiz::where('id', $id)->first();
    }

    public function getQuestions(){
    	return $this->hasMany(Question::class, 'Kviz_id')->get();
    }

}
