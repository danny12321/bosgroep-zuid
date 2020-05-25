@extends('layouts.cms')

@section('content')
    <h1>
    <a href="{{route('show_municipality', ['slug'=> $municipality->slug])}}">
            Gemeente {{$municipality->name}}
        </a>
    </h1>

    <h2>Gidsoorten</h2>
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

    <h2>Opgaven</h2>
    <a href="{{ route('cms_problem_create', ['municipality' => $municipality->id]) }}">Opgave toevoegen</a>
    
    @foreach ($problems as $problem)
    <div>
        {{$problem->name}}
        
        <a href="{{ route('cms_problem_edit', ['problem' => $problem->id]) }}">Wijzig</a>
        
        <form action="{{ route('cms_problem_destroy', ['municipality' => $municipality->id, 'problem' => $problem->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
    @endforeach

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

    <h2>Maatregelen</h2>
    <a href="{{ route('cms_measure_create', ['municipality' => $municipality->id]) }}">Maatregel toevoegen</a>
    
    @foreach ($measures as $measure)
    <div>
        {{$measure->name}}
        
        <a href="{{ route('cms_measure_edit', ['measure' => $measure->id , 'municipality' => $municipality->id]) }}">Wijzig</a>
        
        <form action="{{ route('cms_measure_destroy', ['measure' => $measure->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
    @endforeach
@endsection