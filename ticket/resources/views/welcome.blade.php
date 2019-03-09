@section('content')
@extends('layout.master') 
<div class="carousel carousel-slider" id="top-carousel">
    <div class="carousel-item"><img src="\image\slide_1.jpg"></div>
    <div class="carousel-item" href="#two!"><img src="\image\slide_2.jpg"></div>
    <div class="carousel-item" href="#three!"><img src="\image\slide_3.jpg"></div>
    <div class="carousel-fixed-item center centered" id="title">
            AIKIDO SWITZERLAND <br>10TH ANNIVERSARY
          </div>
</div>

<div class="circle hide-on-small-only" id="logo"></div>

<div class="container" id="descrip">     "Aikido Switzerland ist eine Dachorganisation und umfasst verschiedene Gruppen von Dojos. Jede Gruppe ist eine eigene Organisation, muss jedoch die Regeln von Aikido Switzerland, welche sich auf das internationale Reglement des Aikikai Hombu Dojo in Tokyo stützen, beachten.
</div>
    <div class="red-bg" id="training">
    <div class="container row">
        <div class="row">
            <div class="col l9 offset-l3 left-align" id="training-title">
                <h2>{{__("Trainingsplan")}}</h2>
                <p>{{__("Die Trainingseinheiten in der Übersicht")}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col l3 m3 s12 right-align" id="event-list">
                    @foreach ($events as $event)
                    <div class="col l12 m12 s6">
                            <form method="POST" action="/#training" id="trainingform" enctype="multipart/form-data">
                                @csrf
                                    <input id="club" type="text" class="hide" name="id" value="{{$event->id}}">
                                <div class="input-field center-align">
                                    <button class="btn @if ($id == $event->id)
                                        act
                                    @endif " id="submit" type="submit" name="submit">{{$event->date}}</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
            </div>

            @php
                $trainings = $display->training;
            @endphp
            <div id="event-detail" class="col l9 m6 s11 offset-s1">
                @foreach ($trainings as $training)
                    <div class="col l6 m12 s12" id="training-list">
                        <div class="col l8 m8 s8" id="list">
                                {{$training->guest()->last_name}}
                                {{$training->guest()->first_name}}
                                
                            <br>
                            
                            {{$training->begin_time}} -
                            {{$training->end_time}}
                        </div>
                        <div class="col l4 m4 s4">
                            <img class="img-training" src="/storage/{{$training->guest()->picture()->link}}" id="" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="container" id="guest">
    <div class="row">
        <div class="col l9 offset-l3 left-align" id="guest-title">
            <h2>{{__("Our Gaste")}}</h2>
            <p>{{__("Mehr uber und freunde und Gaste")}}</p>
        </div>
    </div>

    <div class="row">

        <div class="col l3 hide-on-small-only">
            <ul>
                @php
                    $i=1;
                @endphp
                @foreach ($guests as $guest)
                @if ($i==1)
                    <div id="guest-list">
                @endif
                    <li>   
                            <div class="descrip" id="text{{$guest->picture()->id}}">{{$guest->last_name}}
                            {{$guest->first_name}}</div>
                            <br>
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
        <div class="col l8 m9 s12">
                @php
                    $i = 0
                @endphp
                @foreach ($guests as $guest)
                <div class="col l4 m4 s6">
                    @php
                        $i = $i+1
                    @endphp
                    <div class="mobile-guest-name">
                        <div class="item" id="{{$guest->picture()->id}}">
                            <a href="/guest/{{$guest->id}}"><img class="img-guest" src="/storage/{{$guest->picture()->link}}"  alt=""></a>
                        </div>
                        <div class="hide-on-med-and-up" id="small{{$guest->picture()->id}}">
                            {{$guest->last_name}}
                            {{$guest->first_name}}</div>
                    </div>
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

function anim() {
    var scroll = $(window).scrollTop();
    var win_height = jQuery( window ).height();
    var win= win_height+scroll;
    // Anim title

    if (win > jQuery("#title").offset().top) {
        $("#title").addClass('animated zoomIn')
    };

    // Anim logo
    if (win > jQuery("#logo").offset().top) {
        $("#logo").addClass('animated zoomIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
            if (win > jQuery("#descrip").offset().top) {
                
            };
        });
    };

    if (win > jQuery("#title").offset().top) {
        $("#descrip").addClass('animated slideInUp')
    };


    // Anim training

    if (win > jQuery("#event-list").offset().top) {
        $("#training-title").addClass('animated fadeInDown'); 
    };

    if (win > jQuery("#event-list").offset().top) {
        $("#event-list").addClass('animated slideInLeft')  
    };

    if (win > jQuery("#event-list").offset().top) {
        $("#event-detail").addClass('animated slideInRight');    
    };
    

    

    // Anim guest

    
    
    if ($(window).width()>1020) {
    
        if (win > jQuery("#guest-title").offset().top) {
            $("#guest-title").addClass('animated fadeInDown'); 
        };
        $('.item').each(function()
        {
            var id = "#text" + $(this).attr('id');

            if (win > jQuery(this).offset().top) {
                $(this).addClass('animated slideInRight'); 
                $(this).css("opacity", 1);
                $(id).addClass('animated slideInLeft'); 


            };
        });    
    };

    
        // $("#descrip").addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
        //     // $("#descrip").removeClass('animated fadeIn');
        //     // $("#descrip").css("opacity", 1);
        // });
}

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
    if ($(window).width()>1020) {
        $("#top-nav").css("opacity", 0);   
    }
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
    });
    autoplay();
    anim();

    

$(window).scroll(function () {
    anim();        
});

$('.item').each(function()
{
    var id = "#text" + $(this).attr('id');
    $(this).hover(function()
    {
        $(id).css({"font-weight": "bold",   "transform" : "translate(-15px, 0)", "transition-duration": "0.5s"});
    },function() {
        $(id).css({"font-weight": "normal",   "transform" : "translate(0, 0)"});
        }
    );

});

});

</script>
@endsection