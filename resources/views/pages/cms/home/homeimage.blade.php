@extends('layouts.cms')

@section('content')
     <div class="m-card">
          <h1>Home achtergrond foto wijzigen</h1>
          <h2>Huidig</h2>
          <img src="{{asset($Image)}}" width="50%" height="50%">
          <h2>Nieuwe situatie</h2>
          <form method="post" action="{{ route('cms_homepage_editImage')}}" enctype="multipart/form-data">
               @csrf
               <input type="file" id="homeImage" name="homeImage" accept="image/jpg, image/jpeg, image/png" >
               <br>
               <button type="submit" class="btn btn-primary">Opslaan</button>
          </form>
     </div>
@endsection