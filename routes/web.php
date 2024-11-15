<?php

use App\Http\Controllers\JobListingController;
use App\Http\Controllers\RegisterationController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'Home');
Route::view('/about', 'about');

Route::controller(JobListingController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/sort/{tag}','tag_sort');
    Route::get('/jobs/create', 'create')->middleware('auth');
    Route::post('/jobs/store', 'store')->middleware('auth');
    Route::get('/jobs/edite/{id}', 'edite_show')->middleware('auth');
    Route::patch('/jobs/{id}', 'edite')->middleware('auth');
    Route::delete('/jobs/{id}', 'delete')->middleware('auth');
    Route::get('/jobs/{id}', 'show');
});

Route::controller(RegisterationController::class)->group(function () {
    Route::get("/register", "register_view");
    Route::post("/register", "register");
    Route::get("/login", "login_view");
    Route::post("/login", "login");
    Route::get("/logout", "logout");
});
