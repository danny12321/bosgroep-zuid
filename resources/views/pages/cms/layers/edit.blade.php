@extends('layouts.cms')

@section('content')
    <div class="m-card">

        <h1>Laag wijzigen</h1>
        
        <form method="post" action="{{ route('cms_layers_update', ['layer' => $layer->id]) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Titel</label>
                <input class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $layer->title) }}" type="text" name="title" id="title">
                
                @error('title') 
                <div class="invalid-feedback">
                    {{ $errors->first("title") }}
                </div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="name">Naam</label>
                <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $layer->name) }}" type="text" name="name" id="name">
                
                @error('name') 
                <div class="invalid-feedback">
                    {{ $errors->first("name") }}
                </div>
                @enderror
            </div>
            
            <input name="municipality_id" type="hidden" value="{{$municipality->id}}">
            
            <div class="m-cms__content__action--buttons">
                <button type="submit" class="btn btn-primary">Opslaan</button>
                <button class="btn btn-danger" type="submit" form="delete-form">Delete</button>
            </div>
        </form>
        
        <form action="{{ route('cms_layers_destroy', ['municipality' => $municipality->id, 'layer' => $layer->id]) }}" id="delete-form" method="post">
            @csrf
            @method('DELETE')
            
        </form>
    </div>
@endsection