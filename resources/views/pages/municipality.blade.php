@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>{{ $municipality->name }}</h1>

		<h2>Kaart</h2>

		<a 
			target="_blank"
			href="{{route('map', [
				'lat'=> $municipality->lat,
				'long' => $municipality->long
			])}}">
			Open in volledig scherm
		</a>

		<div class="l-city__map">
			<iframe 
				src="{{route('map', [
					'lat'=> $municipality->lat,
					'long' => $municipality->long
					])}}" 
				frameborder="0">
			</iframe>
		</div>
		
	</div>
	
@endsection