@extends('layouts.cms')

@section('content')
    <div class="m-card">
        <h1>Opgave wijzigen</h1>
        
        <form method="post" action="{{ route('cms_problem_update', ['problem' => $problem->id]) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Naam</label>
                <input class="form-control @error('name') is-invalid @enderror" value="{{ $problem->name }}" type="text" name="name" id="name">
                
                @error('name') 
                <div class="invalid-feedback">
                    {{ $errors->first("name") }}
                </div>
                @enderror
            </div>
            
            <input name="municipality_id" type="hidden" value="{{$problem->municipality_id}}">
            
            <div class="m-cms__content__action--buttons">
                <button type="submit" class="btn btn-primary">Opslaan</button>
                <button class="btn btn-danger" type="submit" form="delete-form">Delete</button>
            </div>
            
        </form>

        <form action="{{ route('cms_problem_destroy', ['municipality' => $problem->municipality_id, 'problem' => $problem->id]) }}" id="delete-form" method="post">
            @csrf
            @method('DELETE')
        </form>
    </div>
        
@endsection