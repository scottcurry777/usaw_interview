<!-- I would normally create a blade template, but this works for now -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>USAW Interview</title>
		
		@vite(['resources/css/app.css', 'resources/js/app.js'])
		
		<style>
			@import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css')
		</style>
	</head>

	<body>

		<div>
			<!-- check if form values were validated. display form with errors if not validated. display entered form data if validated. -->
			@if (is_null($input))
			
				<!-- display form errors (just fields not inputted by user for this interview) -->
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form method="POST" action="/usaw">
					@csrf
			
					<div>
						<label for="name">Name</label>
						<input name="name" type="text" value="{{ old('name') }}" class="@error('name') is-invalid @enderror">
					</div>
					
					<div>
						<label for="color">Favorite Color</label>
						<select name="color" class="@error('color') is-invalid @enderror">
							@foreach ($colors as $color)
								<option value="{{ $color }}" @selected(old('color') == $color)>
									{{ $color }}
								</option>
							@endforeach
						</select>
					</div>
			
					<div>
						<!-- I think the instructions meant to say "I acknowledge I am submitting this form", but they actually say "I acknowledge I am submitting this for". I kept the wording exact per the technical specifications of the instructions. -->
						<input name="consent" type="checkbox" value="accepted" {{ old('consent') == 'accepted' ? 'checked' : '' }} class="@error('consent') is-invalid @enderror">
						<label for="consent">I acknowledge I am submitting this for</label>
					</div>
				
					<div>
						<input type="submit" value="Submit">
					</div>
					
				</form>
			
			@else
				
				<!-- The form was validated, let's display the answers chosen from the form. -->
			
				{{ $input['name'] }}, welcome to the {{ config('app.name') }} app!
				<br/>
				I see your favorite color is {{ $input['color'] }}. That's my favorite color too!
			
			@endif
			
		</div>
		
	</body>
</html>