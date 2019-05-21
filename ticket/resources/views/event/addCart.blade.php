@extends('layout.master') 
@section('content') 
@php $connected = false; 
if(session()->has('user')) { 
    $connected = true; 
    $user= App\user::find(session()->get('user')[0]); 
    $cart = $user->cart(); 
    
} 
$n=0;
@endphp


<div id="title-guest" class="row ">
        <div class="col l6 offset-l3"><h2 id="title">{{__("Ticket Shop")}}</h2></div>
    </div>

<div class="row" id="ticket-list">
    <div class="col l6 offset-l3">
        <div class="col l3">
            <h3>{{__("Artikel")}}</h3>
        </div>
        <div class="col l3">
            <h3>{{__("Beschreibung")}}</h3>  
        </div>
        <div class="col l2">
            <h3>{{__("Einzelpreis")}}</h3>
        </div>
        <div class="col l2">
            <h3>{{__("Anzahl")}}</h3>
        </div>
    </div>

    <div class="col l6 offset-l3">
        <hr>
        <br>
    </div>
    @foreach ($tickets as $ticket)
    
    <form method="POST" action="/order/add">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="col l6 offset-l3">
        <div class="col l3">
            <h3>{{ $ticket->category()->name }}</h3>
        </div>
        <div class="col l3">
            <h3>{{ $ticket->description }}</h3>  
        </div>
        <div class="col l2">
            <h3>{{ $ticket->price }} €</h3>
        </div>
        <div class="col l1">
            <input type="hidden" class="validate" name="ticket_id" value="{{$ticket->id}}">
            <select name="quantity">
                @for ($i = 1; $i <= 20; $i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="col l2 offset-l1">
            @if (session()->has('user'))
                <div class="row">
                    <div class="input-field s6 m6 l6 textyellow">
                        <button class="btn waves-effect waves-light" type="submit">Zum Warenkorb</button>
                    </div>
                </div>
            </form>
        @endif
        </div>
   @endforeach
   
</div>
<div class="col l6 offset-l3">
        <hr>
        <br>
    </div>
    
    <div class="col l6 offset-l3">
            <br><br><br><br>
            <p>{{__("Onlinebezahlung")}}</p>
                <p>{{__("
                Die Online-Zahlung erfolgt über PayPal. Keine Registrierung bei PayPal notwendig. 
                Es braucht nur eine Kreditkarte.")}}</p>
                <br>
                <p>{{__("Rechnung ")}}</p>
                <p>{{__("Die Rechnungsbestätigung erhaltet ihr per E-Mail und ist gleichzeitig das Eintrittsticket für den Lehrgang. Bitte mitbringen und an der Kasse vorweisen!")}}</p>
        
            </div>
    </div>
    </section>
    @endsection
 
@section('scripts')
<script>
    $(document).ready(function () {
            $('.parallax').parallax();
            $('.collapsible').collapsible();
            $('select').formSelect();
        });       
</script>
@endsection


{{-- </div>
@foreach ($tickets as $ticket)
<ul class="collapsible">
    <li>
        @php
            $n +=1;
        @endphp
        <div class="collapsible-header" style="color:{{ $ticket->category()->color }};" >
            <i class="material-icons">reorder</i>
            {{ $ticket->name }}
        </div>
        <div class="collapsible-body">
            <div class="row">
                <div class="col l6 m12 s12">
                    <div class="row">
                            <h5 class="center-align">{{ $ticket->category()->name }}</h5>
                    </div>
                    <div class="row">
                        <div class="col l6 m12 s12" style="text-align: justify">
                            <p>{{ $ticket->description }}</p>
                        </div>
                        <div class="col l6 m12 s12 center-align">
                            <div class="col l12 m12 s12">
                                <h6>Price :{{ $ticket->price }} €</h6>
                            </div>
                            <div class=" col l12 m12 s12">
                                <h6> Valide date : {{ $ticket->date }} </h6>
                            </div>
                            <div class="col l12 m12 s12">
                                @if (session()->has('user'))
                                    <form method="POST" action="/order/add">
                                        @csrf
                                        <input type="hidden" name="_method" value="put">
                                        <div class="row">
                                            <input type="hidden" class="validate" name="ticket_id" value="{{$ticket->id}}">
                                            <select name="quantity">
                                                @for ($i = 1; $i <= 20; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                            <div class="input-field s6 m6 l6 textyellow">
                                                <button class="btn waves-effect waves-light" type="submit">Ajouter au panier</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l6 m12 s12 center-align">
                    <img class="img-product" src="/storage/{{$ticket->picture()->link}}" alt="">
                </div>
            </div>
        </div>
    </li>
</ul>
@endforeach</div>
@foreach ($tickets as $ticket)
<ul class="collapsible">
    <li>
        @php
            $n +=1;
        @endphp
        <div class="collapsible-header" style="color:{{ $ticket->category()->color }};" >
            <i class="material-icons">reorder</i>
            {{ $ticket->name }}
        </div>
        <div class="collapsible-body">
            <div class="row">
                <div class="col l6 m12 s12">
                    <div class="row">
                            <h5 class="center-align">{{ $ticket->category()->name }}</h5>
                    </div>
                    <div class="row">
                        <div class="col l6 m12 s12" style="text-align: justify">
                            <p>{{ $ticket->description }}</p>
                        </div>
                        <div class="col l6 m12 s12 center-align">
                            <div class="col l12 m12 s12">
                                <h6>Price :{{ $ticket->price }} €</h6>
                            </div>
                            <div class=" col l12 m12 s12">
                                <h6> Valide date : {{ $ticket->date }} </h6>
                            </div>
                            <div class="col l12 m12 s12">
                                @if (session()->has('user'))
                                    <form method="POST" action="/order/add">
                                        @csrf
                                        <input type="hidden" name="_method" value="put">
                                        <div class="row">
                                            <input type="hidden" class="validate" name="ticket_id" value="{{$ticket->id}}">
                                            <select name="quantity">
                                                @for ($i = 1; $i <= 20; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                            <div class="input-field s6 m6 l6 textyellow">
                                                <button class="btn waves-effect waves-light" type="submit">Ajouter au panier</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l6 m12 s12 center-align">
                    <img class="img-product" src="/storage/{{$ticket->picture()->link}}" alt="">
                </div>
            </div>
        </div>
    </li>
</ul>
@endforeach --}}