@section('content')
@extends('layout.master')

@php
    $lang = \App::getLocale()
@endphp
{{-- <div class="carousel carousel-slider" id="top-carousel">
    <div class="carousel-item"><img src="\image\slide_1.jpg"></div>
    <div class="carousel-item" href="#two!"><img src="\image\slide_2.jpg"></div>
    <div class="carousel-item" href="#three!"><img src="\image\slide_3.jpg"></div>
    <div class="carousel-fixed-item center centered" id="title">
            AIKIDO SWITZERLAND <br>10TH ANNIVERSARY
          </div>
</div>

<div class="circle hide-on-small-only" id="logo"></div> --}}

<div id="title-guest" class="row ">
        <div class="col l6 offset-l3"><h2 id="title">{{__("Senseï")}}</h2></div>
    </div>

<div id="guest-index-white">
  

    <div class="row">
            <div class="col l3 m3 offset-l1">
                <div class="item-info" id="{{$guest->picture()->id}}">
                    <img class="img-guest-detail" src="/storage/{{$guest->picture()->link}}"  alt="">
                </div>
            </div>
            <div  class="col l4 m6 s12  guest-description">
                <h2>{{$guest->last_name}} {{$guest->first_name}}</h2>
                    <div id="text_full{{$guest->id}}">
                            @if ($lang == "en")
                                {!! $guest->description_en !!}              
                            @elseif($lang == "fr")
                                {!! $guest->description_fr !!} 
                            @else
                                {!! $guest->description !!} 
                            @endif
                            <hr>
                            <h2>Media</h2>
                            <div class="video-container">
                                <iframe width="560" height="315" src={{ $guest->movie}} frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                              
                    </div>
            </div>
            
    
            <div class="col l2 offset-l1 m3 s12  guest-description">
                    <div class="row">
                        <h2>Website</h2>
                        <a href="{{$guest->website}}">{{$guest->website}}</a>
                    </div>
                    <div class="row">
                        <h2>Media</h2>
                        <a href="{{$guest->movie}}">{{$guest->movie}}</a>
                    </div>
            
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