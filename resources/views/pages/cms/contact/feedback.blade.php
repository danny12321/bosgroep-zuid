@extends('layouts.cms')

@section('content')
    <h1>Het feedbackonderdeel wijzigen</h1>


   <form method="post" action="{{ route('cms_Contactpage_feedback_Update')}}">
        @csrf
        @method('PUT')
        <label>Emailadress</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="Emailadres" id="Emailadres" value="{{$email}}">

            @error('name') 
                <div class="invalid-feedback">
                    {{ $errors->first("name") }}
                </div>
            @enderror
        <br>
        <button type="submit" class="btn btn-primary">Opslaan</button>
   </form>
@endsection