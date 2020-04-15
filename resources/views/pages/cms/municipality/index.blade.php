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
                    <tr>
                        <td>{{$municipality->name}}</td>
                        <td class="m-table__edit">
                            <a href="{{ route('cms_municipality_edit', ['municipality' => $municipality->id]) }}">Wijzig</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



        {{-- <div>
            <a href="">{{$municipality->name}}</a>

            <form action="{{ route('cms_municipality_destroy', ['municipality' => $municipality->id]) }}" method="post">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger" type="submit">Verwijder</button>
            </form>
        </div> --}}
@endsection