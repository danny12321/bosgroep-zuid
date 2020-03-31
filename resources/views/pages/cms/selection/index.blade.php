@extends('layouts.cms')

@section('content')
    <h1>Selectie mogelijkheden</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="MainMenu">
                    <div class="list-group panel">
                        @include('pages.cms.selection.list', ['selections' => $selections])

                        <div class="m-2 text-right">

                            <a href="{{route('cms_selection_folder_create') }}" class="btn btn-primary">Folder toevoegen</a>
                            <a href="{{route('cms_selection_layer_create') }}" class="btn btn-primary">Laag toevoegen</a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>  
    </div>

            
      

@endsection