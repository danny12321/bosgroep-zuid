@extends('layouts.cms')

@section('content')
    <h1>Lagen</h1>
    <a href="{{ route('cms_layers_create') }}">Laag toevoegen</a>

    @foreach ($layers as $layer)
    <div>
        {{$layer->name}}
    </div>
    @endforeach
@endsection