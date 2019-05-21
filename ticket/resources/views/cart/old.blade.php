@extends('layout.master')
@section('content')

@php
    $n=0;
@endphp
<!-- Parralax image with border -->
<div id="title-guest" class="row ">
    <div class="col l6 offset-l3"><h2 id="title">{{__("Deine Einkaufe")}}</h2></div>
</div>

<div class="row" id="ticket-list">
    <div class="col l6 offset-l3">
        <div class="col l12">
            <h2>{{__("Rechnungen")}}</h2>
        </div>
        <div class="col l2">
            <h3>{{__("Bestellnummer")}}</h3>
        </div>
        <div class="col l4">
            <h3>{{__("Bestelldatum")}}</h3>  
        </div>
        <div class="col l3">
            <h3>{{__("Bestellwert")}}</h3>  
        </div>
        <div class="col l3">
            <h3>{{__("Dokumente")}}</h3>
        </div>
    </div>
    <div class="col l6 offset-l3">
            <hr>
            <br>
        </div>

    @foreach ($carts as $cart)

    <div class="col l6 offset-l3">
        <div class="col l2">
            <h3>{{$cart->id}}</h3>
        </div>
        <div class="col l4">
            <h3>    {{$cart->created_at}}</h3>  
        </div>
        <div class="col l3">
            <h3>{{$cart->totalprice()}} CHF</h3>  
        </div>
        <div class="col l3">
            <h3><a href="/order/pdf/{{$cart->id}}">  <i class="material-icons">file_download</i></a></h3>
        </div>
    </div>
    @endforeach
</div>
@endsection
    
@section('scripts')
    <script>
    $(document).ready(function () {
     
    }); 
    </script>
@endsection
