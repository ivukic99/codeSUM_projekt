<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\User_course;
use App\Category;

class CourseUserController extends Controller
{
    public function index()
    {
        $courses = Course::get();
        // nesto ovdje ne radi 20 linija koda
        foreach ($courses as $course){
            $course_id = $course->id;
            $category_id = $course->Kategorije_id;
            $category_name = Category::where('id', $category_id)->get('Naziv')->first();
            $user_id = User_course::where('Tecaj_id', $course_id)->get('User_id')->first();
            $user_all = User::find($user_id);
            $course->category_name = $category_name;
            $course->user = $user_all;
            unset($course->id);
        }
        return response()->json($courses);
    }

    public function EnrolledCourses(Request $request){
        $enrolled_courses_id = array();

        $user = User::where('id', $request->user_id)->get()->first();
        $enrolled_courses = $user->hasMany(User_course::class, 'User_id')->get();

        foreach($enrolled_courses as $course){
            array_push($enrolled_courses_id, $course->Tecaj_id);
        }

        return $enrolled_courses_id;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return User_course::create([
            'Tecaj_id' => $request->Tecaj_id,
            'User_id' => $request->User_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    public function destroy($id)
    {
        
    }
}
