@extends('layouts.cms')

@section('head')
    @include('inc.openlayers')
@endsection

@section('content')
    <h1>Gemeente toevoegen</h1>

    <form id="municipality-form" method="POST" action="{{ route('cms_municipality_store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Naam gemeente</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name" id="name">

            @error('name') 
                <div class="invalid-feedback">
                    {{ $errors->first("name") }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">Url naam (slug)</label>
            <input class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" type="text" name="slug" id="slug">
            <span class="help-block">Dit wordt gebruikt in de url. bijv. /gemeentes/[hier de slug]</span>

            @error('slug') 
                <div class="invalid-feedback">
                    {{ $errors->first("slug") }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Standaard kaart weergaven</label>
            <div id="map"
                style="height: 500px"
            ></div>

            @error('lat') 
                <div class="invalid-feedback">
                    {{ $errors->first("lat") }}
                </div>
            @enderror

            @error('long') 
                <div class="invalid-feedback">
                    {{ $errors->first("long") }}
                </div>
            @enderror

            @error('zoom') 
                <div class="invalid-feedback">
                    {{ $errors->first("zoom") }}
                </div>
            @enderror
        </div>

        <input class="form-control d-none @error('lat') is-invalid @enderror" value="{{ old('lat') }}" type="number" step="any" name="lat" id="lat">
        <input class="form-control d-none @error('long') is-invalid @enderror" value="{{ old('long') }}" type="number" step="any" name="long" id="long">
        <input class="form-control d-none @error('zoom') is-invalid @enderror" value="{{ old('zoom') }}" type="number" step="any" name="zoom" id="zoom">

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>

    <script src="{{ asset('js/municipalityMap.js') }}" defer></script>
@endsection