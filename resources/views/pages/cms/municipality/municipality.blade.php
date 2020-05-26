@extends('layouts.cms')

@section('content')
    <div class="m-municipality">
        <div class="m-municipality__head m-card">
            <h1>
                <a href="{{route('show_municipality', ['slug'=> $municipality->slug])}}">Gemeente {{$municipality->name}}</a>
            </h1>
        </div>

        <div class="m-municipality__grid">

            <div class="m-municipality__grid__grid--item m-card">
                <div class="m-municipality__grid__grid--item__header">
                    <h2>Gidssoorten</h2>
                    <a href="{{ route('cms_guidespecies_create', ['municipality' => $municipality->id]) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>

MAATREGELEN
        {{-- <form action="{{ route('cms_guidespecies_destroy', ['municipality' => $municipality->id, 'guideSpecie' => $guidespecie->id]) }}" method="post">
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
    </h3> --}}
END MAATREGELEN
STYLING
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
    
            <div class="m-municipality__grid__grid--item m-card">
                <div class="m-municipality__grid__grid--item__header">
                    <h2>GeoServer Lagen</h2>
                    <a href="{{ route('cms_layers_create', ['municipality' => $municipality->id]) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
END STYLING
        
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
    
            <div class="m-municipality__grid__grid--item m-card">
                <div class="m-municipality__grid__grid--item__header">
                    <h2>Vragenlijst</h2>
                    <a href="{{route('cms_questions_create', ['municipality' => $municipality->id])}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>

                <table class="m-table m-municipality__table">
                    <thead>
                        <th>Vraag</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @if(!count($questions))
                            <tr class="last-hover">
                                <td><i>Geen gevonden</i></td>
                            </tr>
                        @endif
                        @foreach ($questions as $question)
                            <tr class="clickable hover last-hover" onclick="document.location = '{{ route('cms_questions_show', ['municipality' => $municipality->id, 'question' => $question->id]) }}';">
                                <td>{{$question->question}}</td>
                                <td class="m-table__edit">
                                    {{-- If the a tag is not here, the transistion of the tr does not work. No idea why ¯\(°_o)/¯ --}}
                                    <a style="opacity: 0;"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        
            </div>
    
MAATREGELEN
    {{-- @foreach ($measures as $measure)
    <div>
        {{$measure->name}}
        
        <a href="{{ route('cms_measure_edit', ['measure' => $measure->id , 'municipality' => $municipality->id]) }}">Wijzig</a>
        
        <form action="{{ route('cms_measure_destroy', ['measure' => $measure->id]) }}" method="post">
            @csrf
            @method('DELETE') --}}
STYLING
            <div class="m-municipality__grid__grid--item m-card">
                <div class="m-municipality__grid__grid--item__header">
                    <h2>Maatregelen</h2>
                    <a href="{{ route('cms_measure_create', ['municipality' => $municipality->id]) }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>

                <table class="m-table m-municipality__table">
                    <thead>
                        <th>Naam</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @if(!count($measures))
                            <tr class="last-hover">
                                <td><i>Geen gevonden</i></td>
                            </tr>
                        @endif
                        @foreach ($measures as $measure)
                            <tr class="hover last-hover">
                                <td>{{$measure->name}}</td>
                                <td class="m-table__edit">
                                    <a style="opacity:0;"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
END STYLING
</div>
@endsection