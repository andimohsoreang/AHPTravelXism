<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});


// <-- Kriteria -->

Route::get('/getkriteria', function () {
    return view('kriteria.get');
});

Route::get('/getsubkriteria', function () {
    return view('kriteria.getsub');
});

// <-- End Kriteria -->


// <-- Alternatif -->
Route::get('/getalternatif', function () {
    return view('alternatif.get');
});
// <-- End Alternatif -->

