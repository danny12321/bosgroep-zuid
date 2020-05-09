@extends('layouts.cms')

@section('content')
    <div class="m-municipality">
        <h1>
            <a href="{{route('show_municipality', ['slug'=> $municipality->slug])}}">Gemeente {{$municipality->name}}</a>
        </h1>

        <div class="m-municipality__grid">

            <div class="m-municipality__grid__grid--item">
                <div class="m-municipality__grid__grid--item__header">
                    <h2>Gidssoorten</h2>
                    <a href="{{ route('cms_guidespecies_create', ['municipality' => $municipality->id]) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>

                <table class="m-table m-municipality__table">
                    <thead>
                        <th>Naam</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @if(!count($guidespecies))
                            <tr class="last-hover">
                                <td><i>Geen gevonden</i></td>
                            </tr>
                        @endif
                        @foreach ($guidespecies as $guidespecie)
                            <tr class="hover last-hover">
                                <td>{{$guidespecie->name}}</td>
                                <td class="m-table__edit">
                                    <a href="{{ route('cms_guidespecies_edit', ['municipality' => $municipality->id, 'guideSpecie' => $guidespecie->id]) }}"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div class="m-municipality__grid__grid--item">
                <div class="m-municipality__grid__grid--item__header">
                    <h2>GeoServer Lagen</h2>
                    <a href="{{ route('cms_layers_create', ['municipality' => $municipality->id]) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
        
                <table class="m-table m-municipality__table">
                    <thead>
                        <th>Titel</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @if(!count($layers))
                            <tr class="last-hover">
                                <td><i>Geen gevonden</i></td>
                            </tr>
                        @endif
                        @foreach ($layers as $layer)
                            <tr class="hover last-hover">
                                <td>{{$layer->title}}</td>
                                <td class="m-table__edit">
                                    <a href="{{ route('cms_layers_edit', ['municipality' => $municipality->id, 'layer' => $layer->id]) }}"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div class="m-municipality__grid__grid--item">
                <div class="m-municipality__grid__grid--item__header">
                    <h2>Vragenlijst</h2>
                    <a href="{{route('cms_questions_create', ['municipality' => $municipality->id])}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
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
        
            </div>
    
            <div class="m-municipality__grid__grid--item">
                <div class="m-municipality__grid__grid--item__header">
                    <h2>Maatregelen</h2>
                    <a href="{{ route('cms_measure_create', ['municipality' => $municipality->id]) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
                
                @foreach ($measures as $measure)
                <div>
                    {{$measure->name}}
        
                    <form action="{{ route('cms_measure_destroy', ['municipality' => $municipality->id, 'measure' => $measure->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
        
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection