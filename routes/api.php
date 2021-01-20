<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/me', function (Request $request) {
    $user = $request->user();
    $user->roles;

    return (response()->json(["details" => $user]));
});

Route::post('/login', 'Api\AuthController@login')->name('login');
Route::post('/register', 'Api\AuthController@register')->name('register');
Route::post('/forgot', 'ForgotController@forgot')->name('forgot');
Route::post('/reset', 'ForgotController@reset')->name('reset');
Route::get('/entrance_quiz/{id}', 'EntranceQuizController@show')->name('show');
Route::get('/courses', 'CourseController@index')->name('courses');
Route::post('/courses/add', 'CourseController@store')->name('course_add');
Route::post('/courses/delete/{tecaj_id}', 'CourseController@destroy')->name('course_delete');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/text_lessons/{course_id}', 'CourseController@getTextLessons')->name('get_text_lessons');
Route::post('/text_lessons/add', 'TextLessonController@store')->name('add_text_lessons');
Route::get('/text_lessons/delete/{course_id}', 'TextLessonController@destroy')->name('delete_text_lesson');
Route::post('/text_lessons/save', 'TextLessonController@update')->name('save_text_lesson');
Route::get('/video_lessons/{course_id}', 'CourseController@getVideoLessons')->name('get_video_lessons');
Route::post('/video_lessons/add', 'VideoLessonController@store')->name('add_video_lessons');
Route::get('/video_lessons/delete/{lesson_id}', 'VideoLessonController@destroy')->name('delete_video_lesson');
Route::post('/video_lessons/save', 'VideoLessonController@update')->name('save_video_lesson');
Route::get('/users', 'UsersController@index')->name('users');
Route::post('/users/delete/{user_id}', 'UsersController@destroy')->name('users_delete');
Route::post('/users/update/{user_id}', 'UsersController@update')->name('users_update');
Route::get('/user/{user_id}', 'UsersController@show')->name('user_profile');
Route::get('/user_course', 'CourseUserController@index')->name('user_course');
Route::post('/enrolled_courses', 'CourseUserController@EnrolledCourses')->name('enrolled_courses');