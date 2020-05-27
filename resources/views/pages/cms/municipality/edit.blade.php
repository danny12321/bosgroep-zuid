@extends('layouts.cms')

@section('head')
    @include('inc.openlayers')
@endsection

@section('content')
    <div class="m-card">
        <h1>Gemeente wijzigen</h1>
        
        <form id="municipality-form" method="post" action="{{ route('cms_municipality_update', ['municipality' => $municipality->id]) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Naam gemeente</label>
                <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $municipality->name) }}" type="text" name="name" id="name">
                
                @error('name')
                <div class="invalid-feedback">
                    {{ $errors->first("name") }}
                </div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="slug">Url naam (slug)</label>
                <input class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $municipality->slug) }}" type="text" name="slug" id="slug">
                <span class="help-block">Dit wordt gebruikt in de url. bijv. /gemeentes/[hier de slug]</span>
                
                @error('slug') 
                <div class="invalid-feedback">
                    {{ $errors->first("slug") }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="legend">Legenda url</label>
            <input class="form-control @error('legend') is-invalid @enderror" value="{{ old('legend', $municipality->legend) }}" type="text" name="legend" id="legend">
            <span class="help-block">Dit wordt gebruikt om de legenda weer te geven.</span>

            @error('legend')
                <div class="invalid-feedback">
                    {{ $errors->first("legend") }}
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

        <input class="form-control d-none @error('lat') is-invalid @enderror" value="{{ old('lat', $municipality->lat) }}" type="number" step="any" name="lat" id="lat">
        <input class="form-control d-none @error('long') is-invalid @enderror" value="{{ old('long', $municipality->long) }}" type="number" step="any" name="long" id="long">
        <input class="form-control d-none @error('zoom') is-invalid @enderror" value="{{ old('zoom', $municipality->zoom) }}" type="number" step="any" name="zoom" id="zoom">

        <div class="m-cms__content__action--buttons">
            <button type="submit" class="btn btn-primary">Opslaan</button>
            <button class="btn btn-danger" type="submit" form="delete-form">Verwijder</button>
        </div>
    </form>
    
    <form action="{{ route('cms_municipality_destroy', ['municipality' => $municipality->id]) }}" id="delete-form" method="post">
        @csrf
        @method('DELETE')
    </form>

    <script src="{{ asset('js/municipalityMap.js') }}" defer></script>
@endsection