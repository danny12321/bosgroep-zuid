@extends('layouts.app')

@section('content')
    <h1>{{ $city }}</h1>

    @for($i = 1; $i <= count($answers); $i++)
    
        <p>vraag {{ $i }}: {{$answers["vraag$i"]}} </p>

    @endfor

@endsection