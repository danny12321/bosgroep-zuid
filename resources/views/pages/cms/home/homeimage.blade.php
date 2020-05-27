@extends('layouts.cms')

@section('content')
    <h1>GeoSever wijzigen</h1>

    <h2>Huidig</h2>
        <img src="{{asset('storage/assets/img/header.' . $extension)}}" width="50%" height="50%">
   <h2>Nieuwe situatie</h2>
   <form method="post" action="{{ route('cms_homepage_editImage')}}" enctype="multipart/form-data">
        @csrf
        <input type="file" id="homeImage" name="homeImage" accept="image/jpg, image/jpeg, image/png" >
        <br>
        <button type="submit" class="btn btn-primary">Opslaan</button>
   </form>
@endsection