@extends('layouts.cms')

@section('content')
    <h1>Gemeentes</h1>
    <a href="{{ route('cms_municipality_create') }}">Gemeente toevoegen</a>

    <table class="m-table">
        <thead>
            <th>Name</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($municipalities as $municipality)
                <tr class="clickable hover last-hover" onclick="document.location = '{{ route('cms_municipality_show', ['municipality' => $municipality->id]) }}';">
                    <td>{{$municipality->name}}</td>
                    <td class="m-table__edit">
                        <a href="{{ route('cms_municipality_edit', ['municipality' => $municipality->id]) }}">Wijzig</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection