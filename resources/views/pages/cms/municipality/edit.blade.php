@extends('layouts.cms')

@section('content')
    <h1>Gemeente wijzigen</h1>

    <form method="post" action="{{ route('cms_municipality_update', ['municipality' => $municipality->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Naam gemeente</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ $municipality->name }}" type="text" name="name" id="name">

            @error('name') 
                <div class="invalid-feedback">
                    {{ $errors->first("name") }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">Url naam (slug)</label>
            <input class="form-control @error('slug') is-invalid @enderror" value="{{ $municipality->slug }}" type="text" name="slug" id="slug">
            <span class="help-block">Dit wordt gebruikt in de url. bijv. /gemeentes/[hier de slug]</span>

            @error('slug') 
                <div class="invalid-feedback">
                    {{ $errors->first("slug") }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="lat">Breedtegraad (Lat)</label>
            <input class="form-control @error('lat') is-invalid @enderror" value="{{ $municipality->lat }}" type="number" name="lat" id="lat">

            @error('lat') 
                <div class="invalid-feedback">
                    {{ $errors->first("lat") }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="long">Lengtegraad (Long)</label>
            <input class="form-control @error('long') is-invalid @enderror" value="{{ $municipality->long }}" type="number" name="long" id="long">

            @error('long') 
                <div class="invalid-feedback">
                    {{ $errors->first("long") }}
                </div>
            @enderror
        </div>

        <div class="m-cms__content__action--buttons">
            <button type="submit" class="btn btn-primary">Opslaan</button>
            <button class="btn btn-danger" type="submit" form="delete-form">Verwijder</button>
        </div>
    </form>
    
    <form action="{{ route('cms_municipality_destroy', ['municipality' => $municipality->id]) }}" id="delete-form" method="post">
        @csrf
        @method('DELETE')

    </form>
@endsection