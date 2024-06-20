<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class USAW extends Controller
{
	const colors = [
		// Added the blank option as default to ensure user selects a color
		'',
		'Blue',
		'Red',
		'Green'
	];
	
    public function validateForm(Request $request): View
	{
		if ($request->isMethod('post'))
		{
			// a real app would have significantly more validation for types, accepted values, and sql injection
			$validated = $request->validate([
				'name'		=> 'required',
				'color'		=> 'required',
				'consent'	=> 'required'
			],[
				// in a larger app, I would put these custom error messages into a separate language file
				'name.required'		=> 'Please tell us your name!',
				'color.required'	=> 'Please tell us your favorite color!',
				'consent.required'	=> 'Please consent to sending this form by clicking the checkbox.'
			]);
		} else {
			$validated	= null;
		}
		
		return view('usaw', [
			'colors'	=> self::colors,
			'input'		=> $validated
		]);
	}
}
