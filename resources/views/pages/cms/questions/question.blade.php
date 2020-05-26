@extends('layouts.cms')

@section('content')
    <div class="m-question m-card">
        <div class="m-question__header">
            <h2>{{$question->question}}</h2>
            <a class="btn btn-primary" href="{{ route('cms_questions_edit', ['municipality' => $municipality->id, 'question' => $question->id]) }}">Wijzig</a> 

            <form id="delete-question-{{$question->id}}" action="{{ route('cms_questions_destroy', ['municipality' => $municipality->id, 'question' => $question->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" form="delete-question-{{$question->id}}" type="submit">Verwijder</button>
            </form>
        </div>

        <div class="m-question__answers">
            <h5>Mogelijke antwoorden</h5>
            @foreach ($question->answers as $answer)
                <div class="m-question__answer">
                    <div class="m-question__answer__head">{{ $answer->answer }}</div>
                    <ul class="m-question__edit__answers__layers">
                        @foreach ($answer->layers as $layer)
                            <li data-layer-id="<?= $layer->id ?>">{{ $layer->title }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        

    </div>
@endsection