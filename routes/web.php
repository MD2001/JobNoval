<?php

use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;


Route::view('/','Home');
Route::view('/about','about');

Route::controller(JobListingController::class)->group(function()
{
    Route::get('/jobs','index');
    Route::get('/jobs/create','create'); 
    Route::post('/jobs/store','store'); 
    Route::get('/jobs/edite/{id}','edite_show');
    Route::patch('/jobs/{id}','edite');
    Route::delete('/jobs/{id}','delete');
    Route::get('/jobs/{id}','show');
    
});