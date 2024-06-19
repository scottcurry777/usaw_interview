<div>

	@if (is_null($input))
	
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
	
		<label for="name">Name</label>
		<input name="name" type="text" value="{{ old('name') }}" class="@error('name') is-invalid @enderror">
	
		<br/>
	
		<label for="color">Favorite Color</label>
		<select name="color" class="@error('color') is-invalid @enderror">
			@foreach ($colors as $color)
				<option value="{{ $color }}" @selected(old('color') == $color)>
					{{ $color }}
				</option>
			@endforeach
		</select>
	
		<br/>
	
		<input name="consent" type="checkbox" value="accepted" {{ old('consent') == 'accepted' ? 'checked' : '' }} class="@error('consent') is-invalid @enderror">
		<label for="consent">I acknowledge I am submitting this for</label>
	
		<br/>
	
		<input type="submit" value="Submit">
	
		</form>
	
	@else
		
		{{ $input['name'] }}, welcome to the {{ config('app.name') }} app!
		<br/>
		I see your favorite color is {{ $input['color'] }}. That's my favorite color too!
	
	@endif
	
</div>
