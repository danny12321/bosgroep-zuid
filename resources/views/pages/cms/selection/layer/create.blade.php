@extends('layouts.cms')

@section('content')
    <h1>Laag toevoegen</h1>

    <form method="POST" action="{{ route('cms_selection_layer_store', ['selection' => $selection]) }}">
        @csrf

        <div class="form-group">
            <label for="layer">Laag</label>
            <select class="form-control @error('layer') is-invalid @enderror" name="layer" id="layer">
                @foreach ($layers as $layer)
                    <option value="{{$layer->id}}">{{$layer->name}}</option>
                @endforeach
            </select>

            @error('layer') 
                <div class="invalid-feedback">
                    {{ $errors->first("layer") }}
                </div>
            @enderror
        </div>

        <input name="municipality_id" type="hidden" value="{{$municipality->id}}">

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
@endsection