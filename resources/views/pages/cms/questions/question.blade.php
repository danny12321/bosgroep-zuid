@extends('layouts.cms')

@section('content')
<div class="m-question m-card">
    <div class="m-question__header">
        <h2>{{$question->question}}</h2>
    </div>

    <div class="m-question__answers">
        @foreach ($question->answers as $answer)
            <div class="m-question__answer">
                <h6>{{ $answer->answer }}</h6>
                <ul class="m-question__edit__answers__layers">
                    @foreach ($answer->layers as $layer)
                        <li data-layer-id="<?= $layer->id ?>">{{ $layer->title }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

    <a class="btn" href="{{ route('cms_questions_edit', ['municipality' => $municipality->id, 'question' => $question->id]) }}"><i class="fas fa-edit"></i></a> 

    <form id="delete-question-{{$question->id}}" action="{{ route('cms_questions_destroy', ['municipality' => $municipality->id, 'question' => $question->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" form="delete-question-{{$question->id}}" type="submit"><i class="fas fa-trash-alt"></i></button>
    </form>

</div>
@endsection