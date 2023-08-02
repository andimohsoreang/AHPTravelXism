<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\CriterionController;
use App\Http\Controllers\SubCriterionController;
use App\Http\Controllers\AHPController;
use App\Http\Controllers\Form;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::get('/getkriteria', [CriterionController::class, 'index'])->name('kriteria.get');
    Route::get('/getkriteria/create', [CriterionController::class, 'create'])->name('kriteria.create');
    Route::post('/getkriteria/store', [CriterionController::class, 'store'])->name('kriteria.store');
    Route::put('/getkriteria/update/{id}', [CriterionController::class, 'update'])->name('kriteria.update');
    Route::delete('/getkriteria/delete/{id}', [CriterionController::class, 'destroy'])->name('kriteria.delete');

    Route::get('/getsubkriteria', [SubCriterionController::class, 'index'])->name('kriteria.getsub');
    Route::get('/getsubkriteria/create', [SubCriterionController::class, 'create'])->name('kriteria.createsub');
    Route::post('/getsubkriteria/store', [SubCriterionController::class, 'store'])->name('kriteria.storesub');
    Route::put('/getsubkriteria/update/{sub}', [SubCriterionController::class, 'update'])->name('kriteria.updatesub');
    Route::delete('/getsubkriteria/delete/{id}', [SubCriterionController::class, 'destroy'])->name('kriteria.deletesub');

    Route::get('/getalternatif', [AlternativeController::class, 'index'])->name('alternatif.get');
    Route::get('/getalternatif/create', [AlternativeController::class, 'create'])->name('alternatif.create');
    Route::post('/getalternatif/store', [AlternativeController::class, 'store'])->name('alternatif.store');
    Route::put('/getalternatif/update/{id}', [AlternativeController::class, 'update'])->name('alternatif.update');
    Route::delete('/getalternatif/delete/{id}', [AlternativeController::class, 'delete'])->name('alternatif.delete');

    Route::get('/form/ahp', [Form::class, 'get'])->name('ahp.result');
    Route::get('/form', [Form::class, 'index'])->name('userform.form');
    Route::post('/form/submit', [Form::class, 'submitForm'])->name('userform.submit');
    Route::post('/result', [Form::class, ''])->name('alternatif.rank');
    Route::get('/', [DashboardController::class, 'index'])->name('home');
});
