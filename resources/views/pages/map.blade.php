<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc.head')

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/css/ol.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/build/ol.js"></script>
</head>
<body>
    <div class="m-map--container">
        <img src="http://gmd.has.nl:8080/geoserver/biodiversiteithorst/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&STRICT=false&style=biodiversiteithorst:StijlStressfactoren&legend_options=dx:5;&TRANSPARENT=true" alt="Legenda" class="m-map--container__legend">
        <div id="map" class="m-map--container__map"></div>
        <div class="m-map--container__selections">
            @include('modules.selectionlist', ['selections' => $selections, 'filters' => $filters])
        </div>
    </div>

    <script src="{{ asset('js/map.js') }}" defer></script>
	
	{{-- PHP vars to JS --}}
	<div class="m-php">
		<div class="m-php__lat">{{$municipality->lat}}</div>
		<div class="m-php__long">{{$municipality->long}}</div>
	</div>
</body>
</html>
