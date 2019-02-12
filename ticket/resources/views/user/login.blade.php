@extends('layout.master') 
@section('content')
<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg" alt="background parallax">
        </div>
        <div class="container white-text">
            <div class="row">
                <div class="col s12">
                    <h3>Connexion</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col s10 offset-s1">
        <h3 class="center-align">Veuillez entrez vos identifiants</h3>
        <form class="col s12" method="POST" action="/login" id="login_form">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="text" class="validate" name="email">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">Mot de passe</label>
                </div>
                <div class="input-field col s12 m12 l2">
                    <button class="btn waves-effect waves-dark" id="submit" type="submit" name="submit">Se connecter</button>
                </div>
                <div class="input-field col s12 m12 l2 offset-l8 right-align">
                    <a class="btn waves-effect waves-dark" href="/register">S'enregister</a>
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