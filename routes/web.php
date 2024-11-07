<?php

use App\Http\Controllers\JobListingController;
use App\Http\Controllers\RegisterationController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    dispatch(function () {
        logger("this come from dispatch helper function");
    })->delay(5);

    return "Done";
});

Route::view('/', 'Home');
Route::view('/about', 'about');

Route::controller(JobListingController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::post('/jobs/store', 'store');
    Route::get('/jobs/edite/{id}', 'edite_show');
    Route::patch('/jobs/{id}', 'edite');
    Route::delete('/jobs/{id}', 'delete');
    Route::get('/jobs/{id}', 'show');
});

Route::controller(RegisterationController::class)->group(function () {
    Route::get("/register", "register_view");
    Route::post("/register", "register");
    Route::get("/login", "login_view");
    Route::post("/login", "login");
    Route::get("/logout", "logout");
});
