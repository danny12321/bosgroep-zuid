@extends('layouts.app')

@section('content')
    <h1>{{ $city }}</h1>
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
        width: 400px;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/build/ol.js"></script>

    <h2>Kaart</h2>
    <div id="map" class="map"></div>
    <script type="text/javascript">

      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([{{$long}},{{$lat}}]),
          zoom: 10
        })
      });
    </script>
@endsection