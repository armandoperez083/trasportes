<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\TractorController;
use App\Http\Controllers\TrailerController;


// Route::get('/access/entrances', [AccessController::class, 'entrances'])->name('admin.access.entrances');
// Route::resource('/accesses', AccessController::class)->names('admin.accesses');

Route::controller(AccessController::class)->group(function () {
    Route::get('/access/entrances', 'entrances')->name('admin.access.entrances');
    Route::post('/access/entrances', 'entStore')->name('admin.access.entrances.store');
    Route::get('/access/deapertures', 'deapertures')->name('admin.access.deapertures');
    Route::get('/access/deapertures/tractor', 'deaperturesT')->name('admin.access.deapertures.tractor');
    Route::get('/access/deapertures/tractor/trailer', 'deaperturesTT')->name('admin.access.deapertures.tractor.trailer');

    Route::post('/access/deapertures', 'extStore')->name('admin.access.deapertures.store');


    Route::get('/access/exitpass', 'exitPass')->name('admin.access.exitpass');
    Route::post('/access/exitpass', 'expStore')->name('admin.access.exitpass.store');


});

Route::controller(PassController::class)->group(function () {
    Route::get('/passes', 'index')->name('admin.passes.index');
    Route::get('/passes/create', 'create')->name('admin.passes.create');
    Route::post('/passes', 'store')->name('admin.passes.store');
});

Route::controller(TrailerController::class)->group(function () {
    Route::get('/trailers', 'index')->name('admin.trailers.index');
    // Route::post('/trailers', 'store')->name('admin.trailers.store');

});

Route::controller(TractorController::class)->group(function () {
    Route::get('/tractor', 'index')->name('admin.tractors.index');
    // Route::post('/tractor', 'store')->name('admin.tractors.store');

});


