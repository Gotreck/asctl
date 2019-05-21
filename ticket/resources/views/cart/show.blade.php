@extends('layout.master')
@section('content')


<div id="title-guest" class="row ">
    <div class="col l6 offset-l3"><h2 id="title">{{__("Warenkorb")}}</h2></div>
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
    
    
    <div class="col l6 offset-l3">
        <div class="col l3">
            <h3>{{ $ticket->type()->category()->name }}</h3>
        </div>
        <div class="col l3">
            <h3>{{ $ticket->type()->description}}</h3>  
        </div>
        <div class="col l2">
            <h3>{{ $ticket->type()->price }} €</h3>
        </div>
        <div class="col l2">
            <h3>1</h3>
        </div>
        <div class="col l2">
            <form method="POST" action="/order/delete">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="row">
                    <input type="hidden" class="validate" name="ticket_id" value="{{$ticket->id}}">
                    <div class="input-field s6 m6 l6 textyellow">
                        <button class="btn waves-effect waves-light" type="submit"><i class="material-icons">delete</i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    
        
   @endforeach


    <div class="col l6 offset-l3">
        <hr>
        <br>
    </div>

    <div class="col l6 offset-l3">
        <div class="col l3">
            <h3>Total</h3>
        </div>
        
        <div class="col l2 offset-l3">
            <h3>{{$cart->totalprice()}} €</h3>
        </div>
        <div class="col l3">
            <h3>{{$cart->totalarticles()}}</h3>  
        </div>
    </div>

    <div class="col l6 offset-l3">
            <hr>
            <br>
        </div>
    
        <div class="col l6 offset-l3">
            
            
            <div id="jetz-kaufen" class="col l3 offset-l6">
                <h3>Jetz kaufen</h3>
            </div>
            <div id="paypal-button-wrapper" class="col l3">
                <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
                <script>paypal.Buttons().render('#paypal-button-wrapper');</script>
            </div>
        </div>
    
    
    <div class="col l6 offset-l3">
            <a href="/order/old">Old order</a>

            <br><br>
            <p class="bold-info">{{__("Onlinebezahlung")}}</p>
                <p  class="no-space" >{{__("
                Die Online-Zahlung erfolgt über PayPal. Keine Registrierung bei PayPal notwendig. 
                Es braucht nur eine Kreditkarte.")}}</p>
                <br>
                <p class="bold-info">{{__("Rechnung ")}}</p>
                <p  class="no-space" >{{__("Die Rechnungsbestätigung erhaltet ihr per E-Mail und ist gleichzeitig das Eintrittsticket für den Lehrgang. Bitte mitbringen und an der Kasse vorweisen!")}}</p>
        
            </div>
    </div>
    </section>
   
{{-- 
<!-- Parralax image with border -->
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax">
        <img src="/image/info.jpg" alt="parallax background">
    </div>
</div>
<section class="container">
    <div class="row">
        <h4 class="center-align">Your card</h4>
    </div>
    <div class="row">
        <div class="col l4 m6 s12">
            <h6 class="center-align">Number article : {{$cart->totalarticles()}} </h6>
        </div>
        <div class="col l4 m6 s12">
            <h6 class="center-align">Total Price : {{$cart->totalprice()}} €</h6>
        </div>
        <div class="col l4 m6 s12">
            <form method="POST" action="/order/validate">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="row">
                    <input type="hidden" class="validate" name="order_id" value="{{$cart->id}}">
                    <button class="btn @if ($cart->totalarticles() == 0)
                        disabled
                    @endif waves-effect waves-light" type="submit">To order</button>
                </div>
            </form>       
        </div>
    </div>
    <div class="row">
        <a href="/order/old">Old order</a>
    </div>
    @foreach ($tickets as $ticket)
        <div class="card-panel grey lighten-5 z-depth-1">
            <div class= "row">
            <h5 class="center-align" style="color:{{ $ticket->type()->category()->color }}">{{ $ticket->type()->name }}</h5>
            </div>
            <div class="row">
                    <div class="col l6 m12 s12" style="text-align: justify">
                        <p>{{ $ticket->type()->description }}</p>

                    </div>
                    <div class="col l6 m12 s12 center-align">
                        <div class="col l12 m12 s12">
                            <p>Ticket number : {{ $ticket->id }}</p>
                        </div>
                        <div class="col l12 m12 s12">
                            <p>Price : {{ $ticket->type()->price }}</p>
                        </div>
                        <div class="col l12 m12 s12">
                                <form method="POST" action="/order/delete">
                                    @csrf
                                    <input type="hidden" name="_method" value="put">
                                    <div class="row">
                                        <input type="hidden" class="validate" name="ticket_id" value="{{$ticket->id}}">
                                        <div class="input-field s6 m6 l6 textyellow">
                                            <button class="btn waves-effect waves-light" type="submit">Supprimer du panier</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
            </div>
        </div>
   @endforeach 



</section>
  --}}
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
            $('.parallax').parallax();
        });        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true
        });
        autoplay();
        function autoplay() {
        $('.carousel').carousel('next');
        setTimeout(autoplay, 3000);
}        $(document).ready(function () {
            $('.sidenav.right').sidenav({ edge: 'right', preventScrolling: false });        });
        $(document).ready(function () {
            $('.sidenav.left').sidenav({ edge: 'left', preventScrolling: false });
        });        $('.dropdown-trigger').dropdown({
            constrainWidth: false,
            coverTrigger: false
        });</script>
@endsection
