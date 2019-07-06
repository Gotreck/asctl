@extends('layout.master') 
@section('content')
<div id="title-guest" class="row">
    <div class="col l4 offset-l3"><h2 id="title">{{__("Login")}}</h2></div>
</div>


<div class="row" id="login">
    <div class="row">
        <form class="col l6 offset-l3" method="POST" action="/login" id="login_form">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="text" class="validate" name="email">
                    <label for="email">{{__("Email")}}</label>
                </div>
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">{{__("Passwort")}}</label>
                </div>
                <div class="input-field col s6 m6 l6 left-align">
                    <button class="btn waves-effect waves-dark" style="font-size: 12px; text-transform: none; padding: 0"><a style="color: darkred" href = "/password/reset">{{__("Passwort vergessen")}}</a></button>
                </div>
                <div class="input-field col s6 m6 l6 right-align">
                    <button class="btn waves-effect waves-dark" id="" type="submit" name="submit">{{__("Einloggen")}}</button>
                </div>

            </div>
        </form>
    </div>
</div>

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

@endsection
 
@section('scripts')
<script>
    

$(document).ready(function () {
            $('.parallax').parallax();
        });

</script>
@endsection