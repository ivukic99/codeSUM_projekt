<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\FinishedLesson;
use App\ProgrammingLesson;

class ProgrammingLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return ProgrammingLesson::get(['id', 'Naziv', 'Opis', 'ChallengeFunkcija', 'Hint', 'Rezultat', 'Tecaj_id', 'created_at', 'updated_at']);
    }

    public function lessonDone(Request $request){
        return FinishedLesson::create([
            'User_id' => $request->user_id,
            'Programski_zadaci_id' => $request->zadatak_id,
            'Tecaj_id' => $request->Tecaj_id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    return ProgrammingLesson::create([
    	'Naziv' => $request->Naziv,
    	'Opis' => $request->Opis,
    	'Hint' => $request->Hint,
    	'ChallengeFunkcija' => $request->ChallengeFunkcija,
    	'Rezultat' => $request->Rezultat,
    	'Tecaj_id' => $request->Tecaj_id
    ]);

	}

    public function show($id)
    {
        return response()->json(ProgrammingLesson::where('id', $id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $lesson = ProgrammingLesson::find($request->Lekcija_id);
        return $lesson->update(['Naziv' => $request->Naziv, 'Opis' => $request->Opis, 'ChallengeFunkcija' => $request->ChallengeFunkcija, 'Hint' => $request->Hint, 'Rezultat' => $request->Rezultat]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ProgrammingLesson::where('id', $id)->delete();
    }
}
