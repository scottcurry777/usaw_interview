<?php

// I added Request to make the form work
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\USAW;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Went with this instead of two separate routes (one for get and one for post) for simplicity
Route::match(array('GET','POST'), '/usaw', [USAW::class, 'validateForm'])->name('usaw');
