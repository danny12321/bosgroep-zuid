@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Vragenlijst {{ $municipality->name }}</h1>
        <form method="GET" id="question-form" action="{{ route('show_municipality', ['slug' => $municipality->slug])}}">
            <p>Hier onder vindt u een aantal vragen die u helpen met een intressante kaart voor u te genereren</p>

            @foreach($municipality->questions as $question)
            <h2>{{$question->question}}</h2>

                @foreach($question->answers as $answer)
                <div>
                    <input class="radio" type="radio" id="{{$question->id}} {{$answer->id}}" name="{{$question->id}}" value="{{$answer->layers}}">
                    <label for="{{$question->id}} {{$answer->id}}">
                        {{$answer->answer}}
                    </label>
                </div>
                @endforeach
            @endforeach

            <div>
                <button class="btn btn-success is-link" type="submit">Lagen genereren</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/answerQuestion.js') }}" defer></script>
@endsection