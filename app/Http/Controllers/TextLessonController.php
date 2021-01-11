<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\TextLesson;

class TextLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return TextLesson::get(['id', 'Naziv', 'Opis', 'Poveznica', 'created_at', 'updated_at']);
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

    return TextLesson::create([
    	'Naziv' => $request->Naziv,
    	'Opis' => $request->Opis,
    	'Poveznica' => $request->Poveznica,
    	'Tecaj_id' => $request->Tecaj_id
    ]);

	}

    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return TextLesson::where('id', $request->Tecaj_id)->update(['Naziv' => $request->Naziv, 'Opis' => $request->Opis, 'Poveznica' => $request->Poveznica]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return TextLesson::where('id', $id)->delete();
    }
}
