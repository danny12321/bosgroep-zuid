@extends('layouts.app')

@section('content')
	<div class="container">
		@if (is_null($municipality->logo))
			<h1>{{ $municipality->name }}</h1>
		@else
			<h1>
			<img src="{{asset($municipality->logo)}}"  height="40px" width="auto">	
			{{ $municipality->name }}</h1>
		@endif
		
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
			href="{{route('map', ['slug' => $municipality->slug, 'filters' => join('-', $filters)])}}">
			Open in volledig scherm
		</a>

		<div class="l-city__map">
			<iframe 
				src="{{route('map', ['slug' => $municipality->slug, 'filters' => join('-', $filters)])}}"
				frameborder="0">
			</iframe>
		</div>

		<div class="m-map--container">
			@if (count($measures))
				<div class="m-map--container__measures">
					<h2>Maatregelen</h2>
					@foreach ($measures as $measure)
						<div>
							<p>{{$measure->name}} - {{$measure->description}}</p>
						</div>
					@endforeach	
				</div>
			@endif
		</div>
		
	</div>
	
@endsection