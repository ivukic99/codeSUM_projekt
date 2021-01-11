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