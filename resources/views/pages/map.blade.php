<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc.head')
    @include('inc.openlayers')
</head>
<body>
    <div class="m-map--container">
        <img src="{{ $municipality->legend }}" alt="Legenda" class="m-map--container__legend">
        <div id="map" class="m-map--container__map"></div>
        <div class="m-map--container__selections">
            @include('modules.selectionlist', ['municipality' => $municipality])
        </div>
    </div>

    <script src="{{ asset('js/map.js') }}" defer></script>
	
	{{-- PHP vars to JS --}}
	<div class="m-php">
        <div class="m-php__lat">{{$municipality->lat}}</div>
        <div class="m-php__long">{{$municipality->long}}</div>
        <div class="m-php__url-geoserver">{{$url_geoserver}}</div>
        <div class="m-php__measures">{{$measures}}</div>
        <div class="m-php__layers">{{$layers}}</div>
        <div class="m-php__zoom">{{$municipality->zoom}}</div>
	</div>
</body>
</html>
