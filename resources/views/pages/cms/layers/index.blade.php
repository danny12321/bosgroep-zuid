@extends('layouts.cms')

@section('content')
    <h1>Lagen</h1>
    <a href="{{ route('cms_layers_create') }}">Laag toevoegen</a>

    @foreach ($layers as $layer)
    <div>
        <span>{{$layer->name}}</span>

        <form action="{{ route('cms_layers_destroy', ['layer' => $layer->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
    @endforeach
@endsection