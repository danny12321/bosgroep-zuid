@extends('layouts.cms')

@section('content')
    <h1>Folder toevoegen</h1>

    <form method="POST" action="{{ route('cms_layers_folder_store', ['selection' => $selection]) }}">
        @csrf

        <div class="form-group">
            <label for="name">Naam</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name">

            @error('name') 
                <div class="invalid-feedback">
                    {{ $errors->first("name") }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
@endsection