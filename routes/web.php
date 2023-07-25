<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\CriterionController;
use App\Http\Controllers\SubCriterionController;

Route::get('/getkriteria', [CriterionController::class, 'index'])->name('kriteria.get');
Route::get('/getkriteria/create', [CriterionController::class, 'create'])->name('kriteria.create');
Route::post('/getkriteria/store', [CriterionController::class, 'store'])->name('kriteria.store');
Route::put('/getkriteria/update/{id}', [CriterionController::class, 'update'])->name('kriteria.update');
Route::delete('/getkriteria/delete/{id}', [CriterionController::class, 'destroy'])->name('kriteria.delete');
Route::get('/getkriteria/calculate-ahp', [CriterionController::class, 'calculateAhp'])->name('kriteria.calculate_ahp');

Route::get('/getsubkriteria', [SubCriterionController::class, 'index'])->name('kriteria.getsub');
Route::get('/getsubkriteria/create', [SubCriterionController::class, 'create'])->name('kriteria.createsub');
Route::post('/getsubkriteria/store', [SubCriterionController::class, 'store'])->name('kriteria.storesub');
Route::put('/getsubkriteria/update/{sub}', [SubCriterionController::class, 'update'])->name('kriteria.updatesub');
Route::delete('/getsubkriteria/delete/{id}', [SubCriterionController::class, 'destroy'])->name('kriteria.deletesub');

Route::get('/getalternatif', [AlternativeController::class, 'index'])->name('alternatif.get');
Route::get('/getalternatif/create', [AlternativeController::class, 'create'])->name('alternatif.create');
Route::post('/getalternatif/store', [AlternativeController::class, 'store'])->name('alternatif.store');
Route::put('/getalternatif/update/{id}', [AlternativeController::class, 'update'])->name('alternatif.update');
Route::delete('/getalternatif/delete/{id}', [AlternativeController::class, 'destroy'])->name('alternatif.delete');
