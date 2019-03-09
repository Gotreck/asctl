@extends('layout.master')
@section('content')


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
