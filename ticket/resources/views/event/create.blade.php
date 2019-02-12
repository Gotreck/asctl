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
    <h4 class="center-align">Event creation</h4>
    <form method="POST" action="/event" id="event_form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input-field">
                <input id="name" type="text" class="validate" name="name" data-length="50" value="{{old('name')}}"">
                <label for="name">Event name</label>
            </div>
            <div class="input-field">
                <textarea id="description" class="validate materialize-textarea" name="description" data-length="500" value="{{old('description')}}"></textarea>
                <label for="description">Event description</label>
            </div>

            <div class="input-field">
                <input id="start_date" type="text" class="validate datepicker" name="start_date" value="{{old('start_date')}}">
                <label for="start_date">Event start date</label>
            </div>

            <div class="input-field">
                <input id="end_date" type="text" class="validate datepicker" name="end_date" value="{{old('end_date')}}">
                <label for="end_date">Event end date</label>
            </div>
        </div>
        <div class="input-field center-align">
            <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Add this event</button>
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

$(document).ready(function () {
    $('.parallax').parallax();
    $('input#name, textarea#description').characterCounter();
    $('#start_date, #end_date').datepicker({
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
