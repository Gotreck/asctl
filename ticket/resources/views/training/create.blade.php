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
    <h4 class="center-align">Create trainig</h4>
    <form method="POST" action="/trainig" id="event_form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input-field">
                <input id="begin_time" type="text" class="validate timepicker" name="begin_time" value="{{old('begin_time')}}">
                <label for="begin_time">trainig begin time</label>
            </div>
            <div class="input-field">
                    <input id="end_time" type="text" class="validate timepicker" name="end_time" value="{{old('end_time')}}">
                    <label for="end_time">trainig end time</label>
                </div>

                <div class="input-field">
                    <select name="guest">
                            <option value="" disabled selected>Choose guest</option>
                            @foreach ($guests as $guest)
                                <option value="{{$guest->id}}">{{$guest->first_name}}{{ $guest->last_name}}</option>  
                            @endforeach
        
                        </select>
                    <label>guest</label>
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
        </div>
        


        <div class="input-field center-align">
                <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Publier votre trainig</button>
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
    $('.parallax').parallax();
  });

    $(document).ready(function() {
    $('input#name, textarea#description').characterCounter();
  });

  $(document).ready(function(){
    $(document).ready(function(){
    $('.timepicker').timepicker();
  });
  });

  

</script>
@endsection
