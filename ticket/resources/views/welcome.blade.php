@section('content')
@extends('layout.master') 
<div class="carousel carousel-slider">
    <div class="carousel-item"><img src="\image\slide_1.jpg"></div>
    <div class="carousel-item" href="#two!"><img src="\image\slide_2.jpg"></div>
    <div class="carousel-item" href="#three!"><img src="\image\slide_3.jpg"></div>
        <div class="centered">
            AIKIDO SWITZERLAND <br>10TH ANNIVERSARY
        </div>
</div>

<div class="circle"></div>

<div class="container" id="description">
    Aikido Switzerland ist eine Dachorganisation und umfasst verschiedene Gruppen 
    von Dojos. Jede Gruppe ist eine eigene Organisation, muss jedoch die Regeln von Aikido Switzerland, welche sich auf das internationale Reglement des 
    Aikikai Hombu Dojo in Tokyo stützen, beachten.
</div>


<div class="red-bg">
    <div class="container" style="height:1000px;"></div>
</div>


<div class="container" id="guest">
    <div class="row">
        <div class="col l9 offset-l3 left-align">
            <h2>Our Gaste</h2>
            <p>Mehr uber und freunde und Gaste</p>
        </div>
    </div>

    <div class="row">

        <div class="col l3 m3 s4">
            <ul>
                @php
                    $i=1;
                @endphp
                @foreach ($guests as $guest)
                @if ($i==1)
                    <div id="guest-list">
                @endif
                    <li class="description" id="{{$guest->picture()->id}}">
                        {{$guest->last_name}}
                        {{$guest->first_name}}
                    </li>
                @if ($i==3)
                </div>
                @php
                    $i=0;
                @endphp
                @endif
                
                @php
                    $i=$i+1;
                @endphp
                @endforeach
            </ul>
        </div>
        <div class="col l9 m9 s8">
                @php
                    $i = 0
                @endphp
                @foreach ($guests as $guest)
                <div class="col s4">
                @php
                    $i = $i+1
                @endphp
                <img class="img-guest" src="/storage/{{$guest->picture()->link}}" id="{{$guest->picture()->id}}" alt="">
                </div>
                @endforeach
        </div>
    </div>
    
</div>
       


@endsection
 
@section('scripts')
<script>

if(n == undefined){
    var n=0;
}
$(document).ready(function () {
    $("#top-nav").css("opacity", 0);   
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
    });
    autoplay();
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

    

window.onscroll = function opac() {
        var opacity = $(window).scrollTop()/300 ;  
        $("#top-nav").css("opacity", opacity);
        }

$('.img-guest').each(function()
{
    $(this).hover(function()
    {
        var id = "#" + $(this).attr('id');
        console.log(id);
        $(id).css("font-weight", "bold");
},function() {
    var id = "#" + $(this).attr('id');

    $(id).css("font-weight", "normal");
    });

});


$('.img-guest').each(function()
{
    $(this).onclick(function()
    {
        var id = "#" + $(this).attr('id');
        console.log(id);
        $(id).css("font-weight", "bold");
},function() {
    var id = "#" + $(this).attr('id');

    $(id).css("font-weight", "normal");
    });

});

});

</script>
@endsection