<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use App\Category;
use App\TextLesson;
use App\VideoLesson;
use App\ProgrammingLesson;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::get();
        
        foreach($courses as $course){
            $creator_id = $course->Kreator_id;
            $creator_name = User::where('id', $creator_id)->get(['name'])->first()->name;
            $creator_surname = User::where('id', $creator_id)->get(['surname'])->first()->surname;
            $course->kreirao = $creator_name . ' ' . $creator_surname;
            unset($course->Kreator_id);

            $category_id = $course->Kategorije_id;
            $category_name = Category::where('id', $category_id)->get(['naziv'])->first()->naziv;
            $course->naziv_kategorije = $category_name;
            unset($course->Kategorije_id);

            $course->broj_upisanih_korisnika = $course->getNumberOfUsers($course->id);
            $course->broj_lekcija = $course->getNumberOfLessons($course->id);

            //unset($course->id);
        }

        return response()->json($courses);
    }

    public function getTextLessons($course_id)
    {
        $course = Course::where('id', $course_id)->first();

        return $course->hasMany(TextLesson::class, 'Tecaj_id')->get();
    }

    public function getVideoLessons($course_id)
    {
        $course = Course::where('id', $course_id)->first();

        return $course->hasMany(VideoLesson::class, 'Tecaj_id')->get();
    }

    public function getProgrammingLessons($course_id)
    {
        $course = Course::where('id', $course_id)->first();

        return $course->hasMany(ProgrammingLesson::class, 'Tecaj_id')->get();
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
        
        $course = Course::create([
            'Naziv' => $request->Naziv,
            'Opis' => $request->Opis,
            'Razina' => $request->Razina,
            'Vrijeme' => $request->Vrijeme,
            'Kategorije_id' => $request->Kategorija_id,
            'Kreator_id' => $request->Kreator_id
        ]);

        return response()->json($course->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($tecaj_id)
    {
        return Course::where('id', $tecaj_id)->delete();
    }
}
