@extends('layouts.cms')

@section('content')
    <h1>Maatregel toevoegen</h1>

    <form method="POST" action="{{ route('cms_measure_store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Naam</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name')}}">

            @error('name') 
                <div class="invalid-feedback">
                    {{ $errors->first("name") }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Beschrijving</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description')}}">

            @error('description') 
                <div class="invalid-feedback">
                    {{ $errors->first("description") }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Gidssoort</label>

            @foreach ($municipality->guide_species as $guidespecie)
                <div class="form-group">
                    <input type="radio" name="guidespecie_id" id="guide-specie-{{$guidespecie->id}}" value="{{$guidespecie->id}}" @if($guidespecie->id == old('guidespecie_id')) checked @endif>
                    <label for="guide-specie-{{$guidespecie->id}}">{{$guidespecie->name}}</label>
                </div>
            @endforeach

            <div class="form-group">
                <input type="radio" name="guidespecie_id" id="guide-specie-null" value="" @if(old("guidespecie_id") === null) checked @endif>
                <label for="guide-specie-null">Geen</label>
            </div>

            @error('guidespecie_id') 
                <div class="invalid-feedback">
                    {{ $errors->first("guidespecie_id") }}
                </div>
            @enderror
        </div>


        <div class="form-group">
            <label>Opgave</label>
            
            @foreach ($municipality->problems as $problem)
                <div class="form-group">
                    <input type="radio" name="problem_id" id="problem-{{$problem->id}}" value="{{$problem->id}}" @if($problem->id == old('problem_id')) checked @endif>
                    <label for="problem-{{$problem->id}}">{{$problem->name}}</label>
                </div>
            @endforeach

            <div class="form-group">
                <input type="radio" name="problem_id" id="problem-null" value="" @if(old("problem_id") === null) checked @endif>
                <label for="problem-null">Geen</label>
            </div>
        </div>

        <input name="municipality_id" type="hidden" value="{{$municipality->id}}">

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
@endsection