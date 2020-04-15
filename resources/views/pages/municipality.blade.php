@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>{{ $municipality->name }}</h1>

		{{-- @for($i = 1; $i <= count($answers); $i++)

			<p>vraag {{ $i }}: {{$answers["vraag$i"]}} </p>

		@endfor --}}

		<?php
			// switch ($city) {
			// 	case "Welkom bij Gemeente Weert":
			// 		$long = "5.7142222"; 
			// 		$lat = "51.2439415";
			// 		break;
			// 	case "Welkom bij Gemeente Den Haag":
			// 		$long = "4.3006999";
			// 		$lat = "52.0704978";
			// 		break;
			// 	case "Welkom bij Gemeente Tilburg":
			// 		$long = "5.0919143";
			// 		$lat = "51.560596";
			// 		break;
			// 	case "Welkom bij Gemeente Horst":
			// 		$long = "6.0514924";
			// 		$lat = "51.4503945";
			// 		break;
			// 	default:
			// 		echo "Geen kaart beschikbaar";
			// 		break;
			// }
		?>

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