@extends('layouts.cms')

@section('content')
<div class="m-question--edit">

    <h1>Vraag wijzigen</h1>

    <form id="question_form" method="POST" action="{{ route('cms_questions_update', ['municipality' => $municipality->id, 'question' => $question->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="question">Vraag</label>
        <input class="form-control @error('question') is-invalid @enderror" value="{{$question->question}}" type="text" name="question" id="question">

            @error('question') 
                <div class="invalid-feedback">
                    {{ $errors->first("question") }}
                </div>
            @enderror
        </div>

        <h2>Antwoorden</h2>
        <div class="m-question--edit__answers">
            @foreach ($question->answers as $answer)
                
                <div class="row">
                    <div class="col-md-10 form-group">
                        <input type="text" class="form-control" value="{{ $answer->answer }}" placeholder="Antwoord">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-info">Selecteer lagen</button>
                    </div>

                    <div class="col-md-12">

                        <ul class="m-question--edit__answers__layers">
                            @foreach ($answer->layers as $layer)
                                <li data-layer-id="<?= $layer->id ?>">{{ $layer->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            @endforeach
        </div>

        <button id="addAnswer" class="btn btn-success">Voeg antwoord toe</button>
            

        <input id="answers" name="answers" type="hidden">
        <input name="municipality_id" type="hidden" value="{{$municipality->id}}">
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>


    <div class="m-question--edit__layer--select">
        <div class="m-question--edit__layer--select__form">
            <h2>Lagen</h2>

            <div class="m-question--edit__layer--select__form__selection">
                @foreach ($municipality->layers as $layer)
                <div class="form-group">
                    <input type="checkbox" id="{{$layer->id}}" value="{{$layer->title}}">
                    <label for="{{$layer->id}}">{{$layer->title}}</label>
                </div>
                @endforeach
            </div>

            <button id="saveSelection" class="btn btn-primary">Opslaan</button>
        </div>
    </div>

    <script src="{{ asset('js/questions.js') }}" defer></script>
</div>
@endsection