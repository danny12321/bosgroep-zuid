@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>{{ $municipality->name }}</h1>

		@if (count($municipality->questions) > 0)
			<div>
				<span>
					Vul de 
					<a href="{{route('show_municipality_questionnaire', ['slug' => $municipality->slug])}}">vragenlijst</a>
					in om de voor u meest belangrijke lagen te laten zien.
				</span>
			</div>
		@endif

		<a 
			target="_blank"
			href="{{route('map', ['slug' => $municipality->slug, 'requestedFilters' => $requestedFilters])}}">
			Open in volledig scherm
		</a>

		<div class="l-city__map">
			<iframe 
				src="{{route('map', ['slug' => $municipality->slug, 'requestedFilters' => $requestedFilters])}}"
				frameborder="0">
			</iframe>
		</div>
		
	</div>
	
@endsection