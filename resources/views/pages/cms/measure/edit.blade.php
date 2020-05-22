@extends('layouts.cms')

@section('content')
    <h1>Maatregel wijzigen</h1>

    <form method="post" action="{{ route('cms_measure_update', ['measure' => $measure->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Naam</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ $measure->name }}" type="text" name="name" id="name">

            @error('name') 
                <div class="invalid-feedback">
                    {{ $errors->first("name") }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Beschrijving</label>
            <input class="form-control @error('description') is-invalid @enderror" value="{{ $measure->description }}"  type="text" name="description" id="description">

            @error('description') 
                <div class="invalid-feedback">
                    {{ $errors->first("description") }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pdf">Pdf</label>
            <input class="form-control @error('pdf') is-invalid @enderror" type="file" name="pdf" id="pdf">

            @error('pdf') 
                <div class="invalid-feedback">
                    {{ $errors->first("pdf") }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
@endsection