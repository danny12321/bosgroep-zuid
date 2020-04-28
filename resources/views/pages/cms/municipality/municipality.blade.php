@extends('layouts.cms')

@section('content')
    <h1>Gemeente {{$municipality->name}}</h1>

    <h2>Gidssoorten</h2>
    <a href="{{ route('cms_guidespecies_create', ['municipality' => $municipality->id]) }}">Gidssoort toevoegen</a>

    @foreach ($guidespecies as $guidespecie)
    <div>
        {{$guidespecie->name}}
        <br>
        <a href="{{ route('cms_guidespecies_edit', ['municipality' => $municipality->id, 'guideSpecie' => $guidespecie->id]) }}">Wijzig</a>

        <form action="{{ route('cms_guidespecies_destroy', ['municipality' => $municipality->id, 'guideSpecie' => $guidespecie->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
    @endforeach

    <h2>Lagen</h2>
    <a href="{{ route('cms_layers_create', ['municipality' => $municipality->id]) }}">Laag toevoegen</a>

    @foreach ($layers as $layer)
    <div>
        {{$layer->name}}

        <form action="{{ route('cms_layers_destroy', ['municipality' => $municipality->id, 'layer' => $layer->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
    @endforeach

    <h2>Selectie mogelijkheden</h2>
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
    </div>
@endsection