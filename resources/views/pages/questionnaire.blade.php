@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>{{ $municipality->name }}</h1>
        
        <h2>Vragenlijst</h2>
        <a href="{{route('show_municipality_skip', ['slug' => $municipality->slug])}}"> overslaan </a>
        <form method="GET" action="{{ route('show_municipality_questionnaire', ['slug' => $municipality->slug])}}">
            @csrf
        <p>Hier onder vindt u een aantal vragen die u helpen met een intressante kaart voor u te genereren</p>
        @foreach($municipality->questions as $question)
        <label class="label" for="{{$question->id}}">{{$question->question}}</label>
        <br>
            @foreach($question->answers as $answer)
            <label>
                <input class="radio" required type="radio" name="{{$question->id}}" id="{{$question->id}}" value="{{$answer->layer}}">
                {{$answer->answer}}
            </label>    
            <br>
            @endforeach
        @endforeach
        <button class="btn btn-success is-link" type="submit">Submit</button>
        </form>
    </div>
@endsection