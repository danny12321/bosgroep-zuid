@extends('layouts.app')

@section('head')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/css/ol.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/build/ol.js"></script>
@endsection

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

		<a target="_blank" href="{{route('map', ['slug' => $municipality->slug, 'filters' => join('-', $filters)])}}">
			Open in volledig scherm
		</a>

		<div class="l-city__map">
			<div class="m-map--container">
				<div id="map" class="m-map--container__map"></div>
				<div class="m-map--container__selections">
					@include('modules.selectionlist', ['selections' => $selections, 'filters' => $filters])
				</div>
			</div>
		</div>

		<div class="m-map--container">
			<div class="m-map--container__measures">

			</div>
		</div>

		<div class="m-map--container">
			@if (count($measures))
				<div class="m-map--container__measures">
					<h2>Maatregelen</h2>
					@foreach ($measures as $measure)
						<div>
							<p>{{$measure->name}} - {{$measure->description}}</p>
							@if ($measure->pdf_path)
								<i class="fas fa-file-pdf"></i>
								<a href={{ asset('storage/maatregelen/'.$measure->pdf_path) }}>Pdf</a>
							@endif
						</div>
					@endforeach
				</div>
			@endif
		</div>
		
	</div>

	<div class="m-php">
		<div class="m-php__lat">{{$municipality->lat}}</div>
		<div class="m-php__long">{{$municipality->long}}</div>
        <div class="m-php__measures">{{$measures}}</div>
        <div class="m-php__layers">{{$layers}}</div>
	</div>

	<script src="{{ asset('js/map.js') }}" defer></script>
@endsection