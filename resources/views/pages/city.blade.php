@extends('layouts.app')

@section('content')
  <div class="container">
		<h1>{{ $city }}</h1>

		@for($i = 1; $i <= count($answers); $i++)

			<p>vraag {{ $i }}: {{$answers["vraag$i"]}} </p>

		@endfor

		<?php
			switch ($city) {
				case "Welkom bij Gemeente Weert":
					$long = "5.7142222"; 
					$lat = "51.2439415";
					break;
				case "Welkom bij Gemeente Den Haag":
					$long = "4.3006999";
					$lat = "52.0704978";
					break;
				case "Welkom bij Gemeente Tilburg":
					$long = "5.0919143";
					$lat = "51.560596";
					break;
				case "Welkom bij Gemeente Horst":
					$long = "	6.0514924";
					$lat = "51.4503945";
					break;
				default:
					echo "Geen kaart beschikbaar";
					break;
			}
		?>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/css/ol.css" type="text/css">
		<style>
			.map {
				height: 400px;
				max-width: 1000px;
				margin: 30px auto;
			}
		</style>
		<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/build/ol.js"></script>

		<h2>Kaart</h2>
		<div id="map" class="map"></div>
	</div>

	<script src="{{ asset('js/map.js') }}" defer></script>
	
	{{-- PHP vars to JS --}}
	<div class="m-php" style="display: none;">
		<div class="m-php__lat">{{$lat}}</div>
		<div class="m-php__long">{{$long}}</div>
	</div>
	
@endsection