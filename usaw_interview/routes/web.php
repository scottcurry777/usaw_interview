<?php

// I added Request to make the form work
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::match(array('GET','POST'),'/usaw', function (Request $request) {
	
	// Since the form method is post, this works. A real app would have significantly more validation and security checks
	// I also skipped adding manual error messages for simplicity, but could have done that also
	// I normally would have created a new controller to handle this, but didn't want to get too complicated for a simple interview project
	if ($request->isMethod('post'))
	{
		$validated = $request->validate([
			'name'		=> 'required',
			'color'		=> 'required',
			'consent'	=> 'required'
		]);
	}
	
	// If this was a larger app, I would have created 'colors' as a global constant and called it, but this works as a simple demo for the interview
    return view('usaw', [
		'colors' => [
			// Added the blank option as default to ensure user selects a color
			'',
			'Blue',
			'Red',
			'Green'
		],
		// using this in Blade view to check if request was validated and to pass form input if validated
		'input' => isset($validated) ? $validated : null
	]);
})->name('usaw');
