@extends('layouts.cms')

@section('content')
    <h1>
    <a href="{{route('show_municipality', ['slug'=> $municipality->slug])}}">
            Gemeente {{$municipality->name}}
        </a>
    </h1>

    <h2>Lagen</h2>
    <a href="{{ route('cms_layers_create', ['municipality' => $municipality->id]) }}">Laag toevoegen</a>

    @foreach ($layers as $layer)
    <div>
        {{$layer->name}}

        <form action="{{ route('cms_layers_destroy', ['municipality' => $municipality->id, 'layer' => $layer->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger" type="submit">Verwijderen</button>
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

    <h2>Vragenlijst</h2>
    @foreach ($questions as  $indexKey => $question)
    <div>
            
        <h3>
            {{$indexKey + 1}}. {{$question->question}} 
            <a class="btn" href="{{ route('cms_questions_edit', ['municipality' => $municipality->id, 'question' => $question->id]) }}"><i class="fas fa-edit"></i></a> 
            <button class="btn btn-danger" form="delete-question-{{$question->id}}" type="submit"><i class="fas fa-trash-alt"></i></button>
    </h3>
        
        <form id="delete-question-{{$question->id}}" action="{{ route('cms_questions_destroy', ['municipality' => $municipality->id, 'question' => $question->id]) }}" method="post">
            @csrf
            @method('DELETE')
        </form>
        <ul>
            @foreach ($question->answers as $answer)
                <li>
                    {{$answer->answer}}
                    
                    <ul>
                        @foreach ($answer->layers as $layer)
                            <li>{{$layer->title}}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
    @endforeach

    <a class="btn btn-primary" href="{{route('cms_questions_create', ['municipality' => $municipality->id])}}">Voeg vraag toe</a>
@endsection