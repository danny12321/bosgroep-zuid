@extends('layouts.cms')

@section('content')
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
        <button type="submit" class="btn btn-primary">Opslaan</button>
        
    </form>
    
@endsection