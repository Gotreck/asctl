@extends('layout.master')
@section('content')


<!-- Parralax image with border -->
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax">
        <img src="/image/info.jpg" alt="parallax background">
    </div>
</div>
@php
    $n=1;
@endphp
<section class="container">

@foreach ($carts as $cart)
    <ul class="collapsible">
        <li>
            <div class="row collapsible-header">
                <h4 class="center-align">Order n° {{$n}}</h4>
            </div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col l4 m6 s12">
                        <h6 class="center-align">Number article : {{$cart->totalarticles()}} </h6>
                    </div>
                    <div class="col l4 m6 s12">
                        <h6 class="center-align">Total Price : {{$cart->totalprice()}} €</h6>
                    </div>
                    <div class="col l4 m6 s12">
                        <h6 class="center-align">Order ID : {{$cart->id}}</h6>
                    </div>
                </div>
                <div class="row">
                    <a href="/order/pdf/{{$cart->id}}">Print</a>
                </div>
                @php
            $tickets = $cart->tickets;
            $n +=1;
            @endphp
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
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
        </li>            
    </ul>   
    @endforeach
</section>

@endsection
    
@section('scripts')
    <script>
    $(document).ready(function () {
        $('.collapsible').collapsible();
        $('.parallax').parallax();
    }); 
    </script>
@endsection
