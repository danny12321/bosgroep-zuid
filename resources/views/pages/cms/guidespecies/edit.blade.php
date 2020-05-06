@extends('layouts.cms')

@section('content')
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
        
        <button type="submit" class="btn btn-primary">Opslaan</button>
        
    </form>
    
@endsection