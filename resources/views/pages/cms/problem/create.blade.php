@extends('layouts.cms')

@section('content')
    <h1>Opgave toevoegen</h1>

    <form method="POST" action="{{ route('cms_problem_store') }}">
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

        <input name="municipality_id" type="hidden" value="{{$municipality->id}}">
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
@endsection