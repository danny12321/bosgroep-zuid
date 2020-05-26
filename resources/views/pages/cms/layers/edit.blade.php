@extends('layouts.cms')

@section('content')
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
        <div class="form-group">
            <label>Gidssoort</label>

            @foreach ($municipality->guide_species as $guidespecie)
                <div class="form-group">
                    <input type="radio" name="guidespecie_id" id="guide-specie-{{$guidespecie->id}}" value="{{$guidespecie->id}}" @if($guidespecie->id == $layer->guidespecie_id) checked @endif>
                    <label for="guide-specie-{{$guidespecie->id}}">{{$guidespecie->name}}</label>
                </div>
            @endforeach

            <div class="form-group">
                <input type="radio" name="guidespecie_id" id="guide-specie-null" value="" @if($layer->guidespecie_id == null) checked @endif>
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
                    <input type="radio" name="problem_id" id="problem-{{$problem->id}}" value="{{$problem->id}}" @if($problem->id == $layer->problem_id) checked @endif>
                    <label for="problem-{{$problem->id}}">{{$problem->name}}</label>
                </div>
            @endforeach

            <div class="form-group">
                <input type="radio" name="problem_id" id="problem-null" value="" @if($layer->problem_id == null) checked @endif>
                <label for="problem-null">Geen</label>
            </div>
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
@endsection