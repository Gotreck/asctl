@section('content')
@extends('layout.master')

@php
    $lang = \App::getLocale()
@endphp
<div class="carousel carousel-slider" id="top-carousel">
    <div class="carousel-item"><img src="\image\slide_1.jpg"></div>
    <div class="carousel-item" href="#two!"><img src="\image\slide_2.jpg"></div>
    <div class="carousel-item" href="#three!"><img src="\image\slide_3.jpg"></div>
    <div class="carousel-fixed-item center centered" id="title">
            AIKIDO SWITZERLAND <br>10TH ANNIVERSARY
          </div>
</div>

<div class="circle hide-on-small-only" id="logo"></div>
<div class="container" id="descrip">
        <a href="../locale/en">English</a>
        <a href="../locale/de">Deutsch</a>
        <a href="../locale/fr">fr</a>
        
    </div>

<div id="guest-index">
<div class="container">
    <div class="col l9 offset-l3 left-align">
        <h2>{{__("Our Gaste")}} : {{$guest->last_name}} {{$guest->first_name}}</h2>
    </div>

    <div class="row">

        <div class="col l8 guest-description">
            @if ($lang == "en")
                {!! $guest->description_en !!}
            @elseif($lang == "fr")
                {!! $guest->description_fr !!}
            @else
                {!! $guest->description !!}
            @endif
        </div>
        <div class="col l4 m9 s12">
            <div class="item-detail" id="{{$guest->picture()->id}}">
                <img class="img-guest-detail" src="/storage/{{$guest->picture()->link}}"  alt="">
            </div>
        </div>
    </div>
    <div class="col l12 center-align"> <a class="waves-effect waves-light btn" href="/">Zuruch</a></div>
    
</div>

</div>
 


@endsection
 
@section('scripts')
<script>

if(n == undefined){
    var n=0;
};


    

function autoplay() {
        if(n!=1){
            setTimeout(autoplay, 3000);
            n=1;
        }
        else {
            $('.carousel').carousel('next');
            setTimeout(autoplay, 4000);
        }
    };

$(document).ready(function () {
    $('.carousel').carousel();
    autoplay();         
});


</script>
@endsection