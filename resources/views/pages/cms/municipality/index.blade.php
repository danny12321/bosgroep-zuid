@extends('layouts.cms')

@section('content')
    <h1>Gemeentes</h1>
    <a href="{{ route('cms_municipality_create') }}">Gemeente toevoegen</a>

    @foreach ($municipalities as $municipality)
    <div>
        <a href="{{ route('cms_municipality_edit', ['municipality' => $municipality->id]) }}">{{$municipality->name}}</a>

        <form action="{{ route('cms_municipality_destroy', ['municipality' => $municipality->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger" type="submit">Verwijder</button>
        </form>
    </div>
    @endforeach
@endsection