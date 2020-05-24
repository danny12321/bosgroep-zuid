@extends('layouts.app')

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
	
@endsection