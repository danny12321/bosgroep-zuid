@extends('layouts.cms')

@section('content')
    <h1>Het feedbackonderdeel wijzigen</h1>


   <form method="post" action="{{ route('cms_Contactpage_feedback_Update')}}">
        @csrf
        @method('PUT')
        <label>Emailadres</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="Emailadres" id="Emailadres" value="{{$email}}">

            @error('name') 
                <div class="invalid-feedback">
                    {{ $errors->first("name") }}
                </div>
            @enderror
        <br>
        <label>Email format</label>
        <p>Deze email maakt gebruik HTML formatting, om een enter te krijgen moet je &lt;br&gt; neer zetten een "normale" enter werkt niet
            <br>
            Verder moeten ook de volgende tekens voor komen:
            <br>
            &#123;&#123; &#36;data['feedback'] &#125;&#125;
            <br>
            Om de feedback te laten zien in de email
            <br>
            &#123;&#123; &#36;data['naam'] &#125;&#125;
            <br>
            Om de naam van de persoon die feedback stuurt te laten zien
        </p>
        <textarea rows="4" cols="80" name="Body">{{$body}}</textarea>

            @error('name') 
                <div class="invalid-feedback">
                    {{ $errors->first("name") }}
                </div>
            @enderror
        <br>
        <button type="submit" class="btn btn-primary">Opslaan</button>
   </form>
@endsection