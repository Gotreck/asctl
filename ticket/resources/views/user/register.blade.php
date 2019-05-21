@extends('layout.master') 
@section('content')

<div id="title-guest" class="row ">
    <div class="col l8 offset-l2"><h2 id="title">{{__("Register")}}</h2></div>
</div>

<div id="register">
	<div class="row">
		<form class="col l8 offset-l2" method="POST" action="/user" id="register_form">
			@csrf
			<div class="row">
				<div class="input-field col s12 m6">
					<input id="first_name" type="text" class="validate" name="first_name" value="{{old('first_name')}}">
					<label for="first_name">Prénom</label>
				</div>
				<div class="input-field col s12 m6">
					<input id="last_name" type="text" class="validate" name="last_name" value="{{old('last_name')}}">
					<label for="last_name">Nom</label>
				</div>
				<div class="input-field col s12 m6">
					<input id="country" type="text" class="validate" name="country" value="{{old('country')}}">
					<label for="country">Pays</label>
				</div>
				<div class="input-field col s12 m6">
					<input id="club" type="text" class="validate" name="club" value="{{old('club')}}">
					<label for="club">Club</label>
				</div>
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">email</i>
					<input id="email" type="email" class="validate" name="email" value="{{old('email')}}">
					<label for="email">Email</label>
				</div>

				<div class="input-field col s12 m6">
					<i class="material-icons prefix">email</i>
					<input id="email_confirm" type="email" class="validate" name="email_confirm">
					<label for="email_confirm">Confirmation</label>
				</div>

				<div class="input-field col s12 m6">
					<i class="material-icons prefix">lock</i>
					<input id="password" type="password" class="validate" name="password">
					<label for="password">Mot de passe</label>
				</div>

				<div class="input-field col s12 m6">
					<i class="material-icons prefix">lock</i>
					<input id="password_confirm" type="password" class="validate" name="password_confirm">
					<label for="password_confirm">Confirmation</label>
				</div>
				<label>
					<input type="checkbox" name="accept" value="true"/>
					<span class="black-text">Je reconnais avoir lu et compris les <a href="/gcu">CGU</a> et je les accepte.</span>
				</label>

				<div class="input-field col s12 right-align">
					<button class="btn waves-effect waves-light" id="" type="submit" name="submit">Continuer</button>
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
