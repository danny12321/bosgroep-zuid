@extends('layouts.cms')

@section('content')
<h1>Het feedbackonderdeel wijzigen</h1>


<form method="post" action="{{ route('cms_Contactpage_contact_Update')}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Adres</label>
        <p>Format: straat huisnummer, postcode</p>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="Adres" id="Adres" value="{{$contact["adres"]}}">
        @error('name')
        <div class="invalid-feedback">
            {{ $errors->first("name") }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Emailadress</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="Emailadres" id="Emailadres" value="{{$contact["emailadres"]}}">
        @error('name')
        <div class="invalid-feedback">
            {{ $errors->first("name") }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Tellefoon nummer</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="Telefoon" id="Telefoon"value="{{$contact["telefoon"]}}">
        @error('name')
        <div class="invalid-feedback">
            {{ $errors->first("name") }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Fax nummer</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="Fax" id="Fax" value="{{$contact["fax"]}}">

        @error('name')
        <div class="invalid-feedback">
            {{ $errors->first("name") }}
        </div>
        @enderror
        <br>
    </div>
    <button type="submit" class="btn btn-primary">Opslaan</button>
</form>
@endsection