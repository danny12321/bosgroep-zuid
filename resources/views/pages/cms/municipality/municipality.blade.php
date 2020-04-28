@extends('layouts.cms')

@section('content')
    <h1>Gemeente {{$municipality->name}}</h1>

    <h2>Lagen</h2>
    <a href="{{ route('cms_layers_create', ['municipality' => $municipality->id]) }}">Laag toevoegen</a>

    <table class="m-table">
        <thead>
            <th>Laag titel</th>
            <th>Laag naam</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($layers as $layer)
                <tr>
                    <td>{{$layer->title}}</td>
                    <td>{{$layer->name}}</td>
                    <td class="m-table__edit">
                        <a href="{{ route('cms_layers_edit', ['municipality' => $municipality->id, 'layer' => $layer->id]) }}">Wijzig</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <h2>Selectie mogelijkheden</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="MainMenu">
                    <div class="list-group panel">
                        @include('pages.cms.selection.list', ['selections' => $selections])

                        <div class="m-2 text-right">

                            <a href="{{route('cms_selection_folder_create', ['municipality' => $municipality->id]) }}" class="btn btn-primary">Folder toevoegen</a>
                            <a href="{{route('cms_selection_layer_create', ['municipality' => $municipality->id]) }}" class="btn btn-primary">Laag toevoegen</a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>  
    </div> --}}
@endsection