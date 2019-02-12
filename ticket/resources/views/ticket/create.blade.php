@extends('layout.master')
@section('content')
@php
$connected = false; if(session()->has('user')){
    $connected = true;
    $user = App\user::find(session()->get('user')[0]);
}
@endphp

<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax"><img src="/image/info.jpg">
    </div>
</div>

<!-- Top actualité -->
<section class="container">
    <h4 class="center-align">Create Ticket</h4>
    <form method="POST" action="/ticket" id="event_form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input-field">
                <input id="name" type="text" class="validate" name="name" data-length="50" value="{{old('name')}}"">
                <label for="name">Ticket name</label>
            </div>
            <div class="input-field">
                <textarea id="description" class="validate materialize-textarea" name="description" data-length="500" value="{{old('description')}}"></textarea>
                <label for="description">Ticket description</label>
            </div>

            <div class="input-field">
                <input id="date" type="text" class="validate datepicker" name="date" value="{{old('date')}}">
                <label for="date">Ticket Date</label>
            </div>
            <div class="input-field">
                    <input id="price" type="number" class="validate " name="price" value="0">
                    <label for="price">Price</label>
                </div>

                <div class="input-field">
                    <select name="category">
                            <option value="" disabled selected>Choose category</option>
                            @foreach ($categorys as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>  
                            @endforeach
        
                        </select>
                    <label>Category</label>
                </div>

                <div class="input-field">
                    <select name="event">
                        <option value="" disabled selected>Choose event</option>
                            @foreach ($events as $event)
                                <option value="{{$event->id}}">{{$event->name}}</option>  
                            @endforeach        
                    </select>
                    <label>Event</label>
                </div>
                <p>Add category <a href="/category/create">here</a><p>
                <p>Add event <a href="/event/create">here</a><p>

        </div>
        <div class="input-field center-align">
                <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Publier votre ticket</button>
            </div>
    </form>
    



    


    @if (count($errors) > 0)
    <div class="card-panel red lighten-5 login_waper">
        <ul>
            @foreach ($errors->all() as $error)
            <h6>
                <li class="red-text">{{ $error }}</li>
            </h6>
            @endforeach
        </ul>
    </div>
    @endif
</section>
@endsection

@section('scripts')


<script>
$(document).ready(function(){
    $('select').formSelect();
  });

    $(document).ready(function() {
    $('input#name, textarea#description').characterCounter();
  });

  $(document).ready(function(){
    $('.datepicker').datepicker({
        i18n: {
        months: [ 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' ],
		monthsShort: [ 'Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec' ],
		weekdays: [ 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi' ],
		weekdaysShort: [ 'Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam' ],
        weekdaysAbbrev: [ 'D', 'L', 'M', 'M', 'J', 'V', 'S' ],
		today: 'Aujourd\'hui',
		clear: 'Réinitialiser',
        close: 'Fermer'
        },
        format: 'yyyy-mm-dd'
    });
  });

  

</script>
@endsection
