@extends('layouts.app')

@section('content')
    <div class="l-home__header__{{$extension}}">
        <div class="l-home__header__filter">
            <h1>Bekijk de biodiversiteit in jouw gemeente</h1>

            <div class="l-home__header__filter__search">
                <input type="search" class="l-home__header__filter__search__input" placeholder="Zoek naar gemeente...">
                <div class="l-home__header__filter__search__items">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="l-home__about">
        <h2>Wie zijn wij</h2>
        <p>{{$HomeText}}</p>
    </div>

    <div class="l-home__divider">
        <div class="l-home__divider__img--container">

            <img src="/assets/img/hand_with_seeds.svg" alt="Hand with seeds">
        </div>
    </div>

    <div class="l-home__participating--municipalities">
        <h2>Deelnemende gemeentes</h2>

        @foreach ($municipalities as $municipality)
            <div class="l-home__participating--municipalities__municipality">
                <h3 class="l-home__participating--municipalities__municipality__name">{{ $municipality->name }}</h3>
                <a class="l-home__participating--municipalities__municipality__button" href="{{route('show_municipality', ['slug' => $municipality->slug])}}">Bekijk</a>
            </div>
        @endforeach
        
    </div>
    {{-- <div class="l-home">
        
        @guest
        <h1>Home</h1>
        
        @else
        <h1>Welkom {{ Auth::user()->name }}</h1>
        @endguest
        
    </div> --}}
    
    {{-- PHP vars to JS --}}
	<div class="m-php">
        <div class="m-php__municipalities">
            {{ json_encode($municipalities) }}
        </div>
    </div>
    
    <script src="{{ asset('js/home.js') }}" defer></script>
@endsection


