@extends('layouts.cms')

@section('content')
    <div class="m-card">

        <div class="m-municipality__grid__grid--item__header">
            <h1>Gemeentes</h1>
            <a href="{{ route('cms_municipality_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        </div>
    
        <table class="m-table">
            <thead>
                <th>Naam</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($municipalities as $municipality)
                    <tr class="clickable hover last-hover" onclick="document.location = '{{ route('cms_municipality_show', ['municipality' => $municipality->id]) }}';">
                        <td>{{$municipality->name}}</td>
                        <td class="m-table__edit">
                            <a href="{{ route('cms_municipality_edit', ['municipality' => $municipality->id]) }}"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection