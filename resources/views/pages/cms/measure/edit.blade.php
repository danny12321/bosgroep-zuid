@extends('layouts.cms')

@section('content')
<div class="m-card">
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
            <label>Gidssoort</label>
            
            @foreach ($municipality->guide_species as $guidespecie)
            <div class="form-group">
                <input type="radio" name="guidespecie_id" id="guide-specie-{{$guidespecie->id}}" value="{{$guidespecie->id}}" @if($guidespecie->id == $measure->guidespecie_id)) checked @endif>
                <label for="guide-specie-{{$guidespecie->id}}">{{$guidespecie->name}}</label>
            </div>
            @endforeach
            
            <div class="form-group">
                <input type="radio" name="guidespecie_id" id="guide-specie-null" value="" @if($guidespecie->id === null)) checked @endif>
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
                    <input type="radio" name="problem_id" id="problem-{{$problem->id}}" value="{{$problem->id}}" @if($problem->id === $measure->problem_id)) checked @endif>
                    <label for="problem-{{$problem->id}}">{{$problem->name}}</label>
                </div>
                
                <div class="form-group">
                    <input type="radio" name="problem_id" id="problem-null" value="" @if($problem->id == $measure->problem_id)) checked @endif>
                    <label for="problem-null">Geen</label>
                </div>
                @endforeach
                
            </div>
            
            
            <input name="municipality_id" type="hidden" value="{{$measure->municipality_id}}">
            
            <div class="m-cms__content__action--buttons">
                <button type="submit" class="btn btn-primary">Opslaan</button>
                <button class="btn btn-danger" type="submit" form="delete-form">Verwijder</button>
            </div>
            
            <div class="form-group">
                <input type="radio" name="problem_id" id="problem-null" value="" @if($problem->id === null)) checked @endif>
                <label for="problem-null">Geen</label>
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
    </div>
<form action="{{ route('cms_measure_destroy', ['measure' => $measure]) }}" id="delete-form" method="post">
    @csrf
    @method('DELETE')
    
</form>
@endsection