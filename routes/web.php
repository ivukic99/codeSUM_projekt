<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

Route::get('generate-pdf','PDFController@generatePDF');

/* Route::get('generate-pdf', function(){
    return view('myPDF');

    $pdf = PDF::loadView('pdf.myPDF');
    return $pdf->download('certifikat.pdf')
}); */

