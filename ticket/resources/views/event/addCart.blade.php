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

<!-- Parralax image with border -->
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax">
        <img src="/image/info.jpg" alt="parallax background">
    </div>
</div>
<section class="container">
    <div class="row">
        <h4 class="center-align">All Tickets</h4>
    </div>
    <div> 
        {{-- class="card-panel grey lighten-5" --}}
    @foreach ($tickets as $ticket)
    <ul class="collapsible">
        <li>
            {{-- @if($n==0)class="active"@endif --}}
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
@endforeach
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