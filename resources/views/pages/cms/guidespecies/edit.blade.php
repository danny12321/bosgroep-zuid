@extends('layouts.cms')

@section('content')
    <div class="m-card">
        <h1>Gidsoort wijzigen</h1>

        <form method="post" action="{{ route('cms_guidespecies_update', ['municipality' => $municipality->id, 'guideSpecie' => $guideSpecie->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Naam Gidsoort</label>
                <input class="form-control @error('name') is-invalid @enderror" value="{{ $guideSpecie->name }}" type="text" name="name" id="name">

                @error('name') 
                    <div class="invalid-feedback">
                        {{ $errors->first("name") }}
                    </div>
                @enderror
            </div>

            <input name="municipality_id" type="hidden" value="{{$municipality->id}}">
            
            <div class="m-cms__content__action--buttons">
                <button type="submit" class="btn btn-primary">Opslaan</button>
                <button class="btn btn-danger" type="submit" form="delete-form">Verwijder</button>
            </div>

            
        </form>

        <form action="{{ route('cms_guidespecies_destroy', ['municipality' => $municipality->id, 'guideSpecie' => $guideSpecie->id]) }}" id="delete-form" method="post">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection