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
        
        foreach($courses as $course){
            $course_id = $course->id;
            $category_id = $course->Kategorije_id;
            $user_id = User_course::where('Tecaj_id', $course_id)->get('User_id')->first();
            $user_name = User::where('id', $user_id->User_id)->get('name')->first();
            $course->user_id = $user_id;
            $course->user = $user_name;
            $course->kategorija = Category::where('id', $category_id)->get('Naziv')->first();
            unset($course_id);
        }
        return response()->json($courses);
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
