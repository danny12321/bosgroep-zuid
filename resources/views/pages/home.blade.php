@extends('layouts.app')

@section('content')
    <div class="l-home__header">
        <div class="l-home__header__filter">
            <h1>Bekijk de biodiversiteit in jouw gemeente</h1>
            <input type="text" class="l-home__header__filter__search" placeholder="Zoek naar gemeente...">
        </div>
    </div>

    <div class="l-home__about">
        <h2>Wie zijn wij</h2>
        <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
    </div>

    <div class="l-home__divider">
        <div class="l-home__divider__img--container">

            <img src="/assets/img/hand_with_seeds.svg" alt="Hand with seeds">
        </div>
    </div>

    <div class="l-home__participating--municipalities">
        <h2>Deelnemende gemeente</h2>
        <div class="l-home__participating--municipalities__municipality">
            <h3 class="l-home__participating--municipalities__municipality__name">Weert</h3>
            <a class="l-home__participating--municipalities__municipality__button" href="/gemeentes/weert/form">Bekijk</a>
        </div>
        <div class="l-home__participating--municipalities__municipality">
            <h3 class="l-home__participating--municipalities__municipality__name">Den Haag</h3>
            <a class="l-home__participating--municipalities__municipality__button" href="/gemeentes/denhaag/form">Bekijk</a>
        </div>
        <div class="l-home__participating--municipalities__municipality">
            <h3 class="l-home__participating--municipalities__municipality__name">Tilburg</h3>
            <a class="l-home__participating--municipalities__municipality__button" href="/gemeentes/tilburg/form">Bekijk</a>
        </div>
        <div class="l-home__participating--municipalities__municipality">
            <h3 class="l-home__participating--municipalities__municipality__name">Horst</h3>
            <a class="l-home__participating--municipalities__municipality__button" href="/gemeentes/horst/form">Bekijk</a>
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


