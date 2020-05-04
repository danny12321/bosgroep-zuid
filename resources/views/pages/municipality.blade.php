@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>{{ $municipality->name }}</h1>
		@foreach($requestedFilters as $filter)
			{{$filter}}
		@endforeach
		<h2>Kaart</h2>

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