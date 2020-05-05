@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>{{ $municipality->name }}</h1>

		<h2>Kaart</h2>

		<a 
			target="_blank"
			href="{{route('map', ['slug' => $municipality->slug])}}">
			Open in volledig scherm
		</a>

		<div class="l-city__map">
			<iframe 
				src="{{route('map', ['slug' => $municipality->slug])}}"
				frameborder="0">
			</iframe>
		</div>

		<div class="m-map--container">
        	<div class="m-map--container__measures">
				<h2>Maatregelen</h2>
			@foreach ($measures as $measure)
    			<div>
        			<p>{{$measure->name}} - {{$measure->description}}</p>

        		</div>
			@endforeach	
			</div>
		</div>
		
	</div>
	
@endsection