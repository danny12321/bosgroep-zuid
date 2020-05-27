@extends('layouts.cms')

@section('content')
     <div class="m-card">
          <h1>Home Text wijzigen</h1>
          <h2>Huidig</h2>
          <p>{{$homeText}}</p>
          <h2>Nieuwe situatie</h2>
          <form method="post" action="{{ route('cms_homepage_editText')}}">
               @csrf
               @method('PUT')
               <textarea rows="4" cols="80" name="homeText"></textarea>
               <br>
               <button type="submit" class="btn btn-primary">Opslaan</button>
          </form>
     </div>
@endsection