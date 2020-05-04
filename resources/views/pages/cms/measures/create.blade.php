@extends('layouts.cms')

@section('content')
    <h1>Maatregel toevoegen</h1>

    <form method="POST" action="{{ route('cms_measures_store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Titel</label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title">

            @error('title') 
                <div class="invalid-feedback">
                    {{ $errors->first("title") }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Beschrijving</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description">

            @error('description') 
                <div class="invalid-feedback">
                    {{ $errors->first("description") }}
                </div>
            @enderror
        </div>

        <input name="municipality_id" type="hidden" value="{{$municipality->id}}">

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
@endsection