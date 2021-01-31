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
Route::get('/course_info/{id}', 'CourseInfoController@index')->name('course_info');
Route::get('/courses', 'CourseController@index')->name('courses');
Route::post('/courses/add', 'CourseController@store')->name('course_add');
Route::post('/courses/delete/{tecaj_id}', 'CourseController@destroy')->name('course_delete');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/text_lessons/{course_id}', 'CourseController@getTextLessons')->name('get_text_lessons');
Route::post('/text_lessons/add', 'TextLessonController@store')->name('add_text_lessons');
Route::get('/text_lessons/delete/{course_id}', 'TextLessonController@destroy')->name('delete_text_lesson');
Route::post('/text_lessons/save', 'TextLessonController@update')->name('save_text_lesson');
Route::get('/text_lesson/{id}', 'TextLessonController@show')->name('show_text_lesson');
Route::post('/text_lessons/done', 'TextLessonController@lessonDone')->name('done_text_lesson');
Route::get('/video_lessons/{course_id}', 'CourseController@getVideoLessons')->name('get_video_lessons');
Route::post('/video_lessons/add', 'VideoLessonController@store')->name('add_video_lessons');
Route::get('/video_lessons/delete/{lesson_id}', 'VideoLessonController@destroy')->name('delete_video_lesson');
Route::post('/video_lessons/save', 'VideoLessonController@update')->name('save_video_lesson');
Route::post('/video_lessons/done', 'VideoLessonController@lessonDone')->name('done_video_lesson');
Route::get('/video_lesson/{id}', 'VideoLessonController@show')->name('show_video_lesson');
Route::get('/programming_lessons/{course_id}', 'CourseController@getProgrammingLessons')->name('get_programming_lessons');
Route::post('/programming_lessons/add', 'ProgrammingLessonController@store')->name('add_programming_lessons');
Route::get('/programming_lessons/delete/{course_id}', 'ProgrammingLessonController@destroy')->name('delete_programming_lesson');
Route::post('/programming_lessons/save', 'ProgrammingLessonController@update')->name('save_programming_lesson');
Route::get('/programming_lessons/show/{id}', 'ProgrammingLessonController@show')->name('show_programming_lesson');
Route::post('/programming_lessons/done', 'ProgrammingLessonController@lessonDone')->name('done_programming_lesson');
Route::get('/users', 'UsersController@index')->name('users');
Route::post('/users/delete/{user_id}', 'UsersController@destroy')->name('users_delete');
Route::post('/users/update/{user_id}', 'UsersController@update')->name('users_update');
Route::get('/user/{user_id}', 'UsersController@show')->name('user_profile');
Route::get('/user_course', 'CourseUserController@index')->name('user_course');
Route::post('/enrolled_courses', 'CourseUserController@EnrolledCourses')->name('enrolled_courses');
Route::post('/enroll_course', 'CourseUserController@create')->name('enroll_course');
Route::post('/enrolled_course', 'EnrolledCourseController@index')->name('enrolled_course');
Route::post('/enrolled_course/finished_lessons', 'EnrolledCourseController@getFinishedLessons')->name('enrolled_course_finished_lessons');
Route::post('/uploadImg/{user_id}', 'UsersController@uploadImage')->name('uploadImg');
Route::get('/download/{user_id}', 'PDFController@generatePDF')->name('download');

