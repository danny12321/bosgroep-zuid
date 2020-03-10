@extends('layouts.app')

@section('content')
    <h1>{{ $city }}</h1>
    <h2> Vragenlijst </h2>


    <form method="GET" action="/gemeentes/{{$cityname}}">
        @csrf

    <div class="field" name="form" id="form">
        <label class="label" for="vraag1">Vraag1</label>

        <div class="radio">
            <label>
                <input class="radio" type="radio" name="vraag1" id="vraag1" value="antwoord 1">
                Antwoord 1
            </label>
            </div> 
            <div class="radio">
            <label>
                <input class="radio" type="radio" name="vraag1" id="vraag1" value="antwoord 2">
                Antwoord 2
            </label>
            </div> 
            <div class="radio">
            <label>
                <input class="radio" type="radio" name="vraag1" id="vraag1" value="antwoord 3">
                Antwoord 3
            </label>
        </div> 
        <label class="label" for="vraag2">Vraag2</label>

        <div class="radio">
            <label>
                <input class="radio" type="radio" name="vraag2" id="vraag2" value="antwoord 1">
                Antwoord 1
            </label>
            </div> 
            <div class="radio">
            <label>
                <input class="radio" type="radio" name="vraag2" id="vraag2" value="antwoord 2">
                Antwoord 2
            </label>
            </div> 
            <div class="radio">
            <label>
                <input class="radio" type="radio" name="vraag2" id="vraag2" value="antwoord 3">
                Antwoord 3
            </label>
        </div> 
    </div>

    <div class="field is-grouped">
        <div class="control">
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </div>
    </form>
    </div>
</div>

@endsection