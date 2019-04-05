@section('content')
@extends('layout.master')

@php
    $lang = \App::getLocale();
    $color = 0
@endphp
{{-- <div class="carousel carousel-slider" id="top-carousel">
    <div class="carousel-item"><img src="\image\slide_1.jpg"></div>
    <div class="carousel-item" href="#two!"><img src="\image\slide_2.jpg"></div>
    <div class="carousel-item" href="#three!"><img src="\image\slide_3.jpg"></div>
    <div class="carousel-fixed-item center centered" id="title">
            AIKIDO SWITZERLAND <br>10TH ANNIVERSARY
          </div>
</div> --}}

<div class="row title-guest">
    <div class="col l4 offset-l4"><h3>{{__("Our Gaste")}}</h3></div>

    <div class="col l4 offset-l4"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></div>
</div>

@foreach ($guests as $guest)
    

<div id=@if($color%2 == 1)
        "guest-index"
        @else
        "guest-index-white"
    @endif>


    <div class="row">
        <div class="col l3 m3 offset-l1 hide-on-small-only">
            <div class="item-detail" id="{{$guest->picture()->id}}">
                <img class="img-guest-detail" src="/storage/{{$guest->picture()->link}}"  alt="">
            </div>
        </div>
        <div  class="col l4 m6 s12  guest-description">
            <h2>{{$guest->last_name}} {{$guest->first_name}}</h2>
                <div id="text_min{{$guest->id}}">
                    @if ($lang == "en")
                        @php
                            echo truncate_str($guest->description_en, 750)
                        @endphp 
                        ... 
                    @elseif($lang == "fr")
                        @php
                            echo truncate_str($guest->description_fr, 750)
                        @endphp 
                        ... 
                    @else
                        @php
                            echo truncate_str($guest->description, 750)
                        @endphp 
                        ... 
                    @endif
                </div>
                <div id="text_full{{$guest->id}}" class="hide">
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
            <div class="col l9 offset-l3 right-align">
                <button class="btn read-btn" id="{{$guest->id}}" type="submit" name="submit">Read more</button>
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
@php
    $color = $color+1
@endphp</div>
@endforeach

 
@php
    function truncate_str($str, $maxlen) {
if ( strlen($str) <= $maxlen ) return $str;

$newstr = substr($str, 0, $maxlen);
if ( substr($newstr,-1,1) != ' ' ) $newstr = substr($newstr, 0, strrpos($newstr, " "));

return $newstr;
}
@endphp

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

$('.btn').each(function()
{
    var id = $(this).attr('id');
    var full = "#text_full" + $(this).attr('id');
    var min = "#text_min" + $(this).attr('id');
    var click =0;

    


    $(this).click(function()
    {
        
        if (click == 0) {
            $(min).addClass('hide ');
            document.getElementById(id).innerHTML = "Read less"; 
            $(full).removeClass('hide '); 
            click = 1;     
        } else {
            $(full).addClass('hide');
            document.getElementById(id).innerHTML = "Read more"; 
            $(min).removeClass('hide'); 
            click = 0;       

        }
        
    });
});



</script>
@endsection