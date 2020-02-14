@extends('layouts.app')

@section('content')
    <div class="l-home">

        @guest
            <h1>Home</h1>
            
        @else
            <h1>Welkom {{ Auth::user()->name }}</h1>
        @endguest

    </div>
@endsection
