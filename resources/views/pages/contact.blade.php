@extends('layouts.app')

@section('content')
    <div class="l-home__header" style="background-image: url({{ asset($HomeImage) }})">
        <div class="l-home__header__filter">
            <h1>Neem contact met ons op</h1>
        </div>
    </div>

    <div class="container">

        <div class="m-contact">
            <div>
                <h1>Contact</h1>
                <p>Wij willen graag uw feedback horen, deze kunt u hieronder invullen. Voor andere vragen kunt u ons bereiken op de onderstaande contactgegevens. </p>
                <div class="m-contact__contact--details">
                    <h2>Onze contactgegevens</h2>
                    <p>Bezoekadres: {{$contact['adres']}}</p>
                    <p>t <a href="tel:{{$contact['telefoon']}}">{{$contact['telefoon']}}</a></p>
                    <p>f {{$contact['fax']}}</p>
                    <p>E-mail: <a href="mailto:{{$contact['emailadres']}}">{{$contact['emailadres']}}</a></p>
                </div>
            </div>
            <div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
        
                <form method="POST" action="/contact/send">
                    @csrf
                    <div class="field" name="form" id="form">
                        <div class="form-group">
                            <label class="label" for="naam">Wat is uw naam?</label>
                            <input class="form-control" required type="text" name="naam" id="naam">
                        </div>
        
                        <div class="form-group">
                            <label class="label" for="feedback">Wat is uw feedback?</label>
                            <textarea  class="form-control" required type="text" name="feedback" id="feedback"></textarea>
                        </div>
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="btn btn-success is-link" type="submit">Verstuur</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection