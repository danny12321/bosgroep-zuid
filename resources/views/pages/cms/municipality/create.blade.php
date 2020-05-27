@extends('layouts.cms')

@section('content')
    <div class="m-card">

        <h1>Gemeente toevoegen</h1>
        
        <form method="POST" action="{{ route('cms_municipality_store') }}">
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
                <label for="lat">Breedtegraad (Lat)</label>
                <input class="form-control @error('lat') is-invalid @enderror" value="{{ old('lat') }}" type="number" step="any" name="lat" id="lat">
                
                @error('lat') 
                <div class="invalid-feedback">
                    {{ $errors->first("lat") }}
                </div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="long">Lengtegraad (Long)</label>
                <input class="form-control @error('long') is-invalid @enderror" value="{{ old('long') }}" type="number" step="any" name="long" id="long">
                
                @error('long') 
                <div class="invalid-feedback">
                    {{ $errors->first("long") }}
                </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
@endsection 