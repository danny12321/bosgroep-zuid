@extends('layouts.cms')

@section('content')
    <h1>Maatregel toevoegen</h1>

    <form method="POST" action="{{ route('cms_measure_store') }}">
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

        <div class="form-group">
            <label for="description">Beschrijving</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description">

            @error('description') 
                <div class="invalid-feedback">
                    {{ $errors->first("description") }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="guidespecie_id">Gidssoort</label>
            
            @foreach ($municipality->guide_species as $guidespecie)
                <div class="form-group">
                    <input type="checkbox" id="{{$guidespecie->id}}" value="{{$guidespecie->name}}">
                    <label for="{{$guidespecie->id}}">{{$guidespecie->name}}</label>
                </div>
            @endforeach
        </div>

         <div class="form-group">
            <label for="problem_id">Opgave</label>
            <input class="form-control @error('problem_id') is-invalid @enderror" type="dropdown" name="problem_id" id="problem_id">

            @error('problem_id') 
                <div class="invalid-feedback">
                    {{ $errors->first("problem_id") }}
                </div>
            @enderror
        </div>

        <input name="municipality_id" type="hidden" value="{{$municipality->id}}">

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
@endsection