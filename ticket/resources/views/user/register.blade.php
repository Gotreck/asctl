@extends('layout.master') 
@section('content')

<div id="title-guest" class="row ">
    <div class="col l6 offset-l3 m10  s10"><h2 id="title">{{__("Registrieren")}}</h2></div>
</div>

<div id="register">
	<div class="row">
		<form class="col l6 offset-l3 m10 offset-m1 s10 offset-s1" method="POST" action="/user" id="register_form">
			@csrf
			<div class="row">
				<div class="input-field col s12 m6">
					<input id="first_name" type="text" class="validate" name="first_name" value="{{old('first_name')}}">
					<label for="first_name">Name</label>
				</div>
				<div class="input-field col s12 m6">
					<input id="last_name" type="text" class="validate" name="last_name" value="{{old('last_name')}}">
					<label for="last_name">Vorname</label>
				</div>
				<div class="input-field col s12 m6">
					<input id="country" type="text" class="validate" name="country" value="{{old('country')}}">
					<label for="country">Land</label>
				</div>
				<div class="input-field col s12 m6">
					<input id="club" type="text" class="validate" name="club" value="{{old('club')}}">
					<label for="club">Klub</label>
				</div>
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">email</i>
					<input id="email" type="email" class="validate" name="email" value="{{old('email')}}">
					<label for="email">Email</label>
				</div>

				<div class="input-field col s12 m6">
					<i class="material-icons prefix">email</i>
					<input id="email_confirm" type="email" class="validate" name="email_confirm">
					<label for="email_confirm">Bestätigung</label>
				</div>

				<div class="input-field col s12 m6">
					<i class="material-icons prefix">lock</i>
					<input id="password" type="password" class="validate" name="password">
					<label for="password">Password</label>
				</div>

				<div class="input-field col s12 m6">
					<i class="material-icons prefix">lock</i>
					<input id="password_confirm" type="password" class="validate" name="password_confirm">
					<label for="password_confirm">Bestätigung</label>
				</div>
				<label>
					<input type="checkbox" name="accept" value="true"/>
					<span class="black-text">Ich habe die <a href="/gcu">Datenschutzerklärung</a> gelesen und bin damit einverstanden.</span>
				</label>

				<div class="input-field col s12 right-align">
					<button class="btn waves-effect waves-light" id="" type="submit" name="submit">Registrieren</button>
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
