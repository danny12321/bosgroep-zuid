@extends('layouts.app')

@section('content')
    <div class="m-header">
        <div class="m-header__filter">
            <h1>Bekijk de biodiversiteit in jouw gemeente</h1>
            <input type="text" class="m-header__filter__search" placeholder="Zoek naar gemeente...">
        </div>
    </div>
    {{-- <div class="l-home">

        @guest
            <h1>Home</h1>
            
        @else
            <h1>Welkom {{ Auth::user()->name }}</h1>
        @endguest

    </div> --}}
@endsection


