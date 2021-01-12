<?php
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




//// registration [20-dec-2020]
Route::get('/', function(){
    return view("welcome");
});



Route::resource("/citizens", "CitizenController");

