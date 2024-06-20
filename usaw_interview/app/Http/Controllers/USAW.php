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
			// a real app would significantly more validation for types, accepted values, and sql injection
			$validated = $request->validate([
				'name'		=> 'required',
				'color'		=> 'required',
				'consent'	=> 'required'
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
