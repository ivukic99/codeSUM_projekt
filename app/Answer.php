<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'odgovori';

    public static function getAnswers(){
    	return Answer::all();
    }

    public static function getAnswer($id){
    	return Answer::where('Pitanja_id', $id)->get();
    }
}
