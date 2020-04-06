@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Contact</h1>
      
        <div class="explanation">
        <p>Wij willen graag uw feedback horen, deze kunt u hieronder invullen. Voor andere vragen kunt u ons bereiken op de onderstaande contactgegevens. </p>
        </div>        
        <form method="GET" >
            @csrf
            <div class="field" name="form" id="form">
                <label class="label" for="naam">Wat is uw naam?</label>
                
                <div class="text">
                    <label>
                        <input  class="text" required type="text" name="naam" id="naam">
                        
                    </label>
                
                </div> 
                
                <label class="label" for="feedback">Wat is uw feedback?</label>
                <div class="text">
                    <label>
                        <input class="text" required type="text" name="feedback" id="feedback">
                      
                    </label>
                </div> 
                
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="btn btn-success is-link" type="submit">Verstuur</button>
                </div>
            </div>
        </form>

        <div class="contact">
        <br>
        <h2>Onze contactgegevens:</h2>
            <p>Bezoekadres: Huisvenseweg 14, 5591 VD HEEZE</p>
            <p>t (040) 20 66 360</p>
            <p>f (040) 20 66 361 </p>
            <p>E-mail: zuidnederland@bosgroepen.nl</p>
        </div>
        
    </div>
@endsection