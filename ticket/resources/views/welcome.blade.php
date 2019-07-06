@section('content')
    @extends('layout.master')
    <div class = "carousel carousel-slider hide-on-small-only" id = "top-carousel">
        <div class = "carousel-item"><img src = "\image\slide_2.jpg"></div>
        <div class = "carousel-item" href = "#two!"><img src = "\image\slide_1.jpg"></div>
        <div class = "carousel-item" href = "#three!"><img src = "\image\slide_3.jpg"></div>
        <div class = "carousel-fixed-item center centered" id = "title">
            AIKIDO SWITZERLAND <br>10TH ANNIVERSARY
        </div>
    </div>


    <div class = "circle hide-on-small-only" id = "logo"></div>

    <div id = "intro" class = "row">
        <div class = "col l6 offset-l3 center-align">
            <h2>{{__("Herzlich willkommen zum 10-jährigen Jubiläum von Aikido Switzerland.")}}</h2>
            <div class = "col l12 m10 offset-m1" id = "descrip">
                {{__("19 – 21 June 2020 Basel")}}
                <div class = "row" id = "intro-text">
                    <div class = "col l6">
                        <p>{{__("Der Dachverband «Aikido Switzerland» besteht aus aktiven Aikidokas und Dojos, in denen Aikido geübt, gefördert und verbreitet wird. Der Verband ist vom Hombu Dojo anerkannt und gewährleistet die Verbindung mit dem Hombu Dojo. Die Dojos, die dem Verband angehören, sind in Gruppierungen organisiert, die in ihrem Stil, ihrer Organisation und Didaktik frei sind.")}}</p>
                    </div>
                    <div class = "col l6">
                        <p>{{__("Unser Verband charakterisiert sich durch eine Vielfalt einzelner Aikidostile. Er basiert auf gegenseitigem Respekt gegenüber persönlichen Unterschieden und Ausdrucksweisen von Ai, Ki & Do.")}}</p>
                        <img src = "\image\Logo_AS.png" alt = "Logo_AS.png">
                    </div>
                    <div class = "col l12" id = "kaufen-button">
                        <a href = "/ticket/info">{{__("Jetzt «Early Bird Ticket» kaufen!")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class = "row" id = "guest">
        <div class = "col l6 offset-l3">
            <div class = "col l12 m4 offset-m5 left-align" id = "guest-title">
                <h2>{{__("Senseïs")}}</h2>
            </div>

            <div class = "row">
                <div class = "col l12 m8 offset-m2 s10 offset-s1">
                    @foreach ($guests as $guest)
                        <div class = "col l4 m4 s6" class = "guest">
                            <div class = "img-guest-container" id = "{{$guest->picture()->id}}">
                                <a href = "/guest/{{$guest->id}}"><img class = "img-guest" src = "/{{$guest->picture()->link}}" alt = ""></a>
                            </div>
                            <div class = "guest-name" id = "text{{$guest->picture()->id}}">
                                {{$guest->last_name}}
                                {{$guest->first_name}}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id = "see-guest" class = "col l12 m4 offset-m4 s12 right-align">
                    <a href = "/guest"><i class = "Tiny material-icons right">arrow_forward</i>{{__("Zur Seite : Senseï")}}</a>
                </div>
            </div>
        </div>
    </div>



    <div class = "row" id = "programm">
        <div class = "col l6 offset-l3 m10 offset-m1">
            <div class = "col l12 m4 offset-m4 left-align">
                <h2 id = "Trainsplan">{{__("Trainingsplan")}}</h2>
            </div>
            <div class = "col l12 m12">
                <p>{{__("Wir sind glücklich, dass uns eine Vielzahl von Senseis zugesagt haben. Jeder von ihnen wird zwei Trainings leiten. Einige Trainings sind unterteilt. Dies erlaubt es allen Teilnehmern mit unterschiedlichen Lehrern zu trainieren und bietet die Möglichkeit, die großartige Ausdruckvielfalt des Aikido an diesem Anlass zu erleben.")}}</p>
                <div class = "row right">
                    <a href = "\storage\programm.pdf">{{__("Download Programm")}}<i class = "Tiny material-icons right">file_download</i></a>
                </div>
            </div>

            <div class = "row hide-on-small-only">
                <img class = "programm-pic" src = "\image\freitag.jpg" alt = "">
            </div>
            <div class = "row hide-on-small-only">
                <img class = "programm-pic" src = "\image\samstag.jpg" alt = "">
            </div>
            <div id = "more-about-programm" class = "row hide">
                <img class = "programm-pic" src = "\image\sonntag.jpg" alt = "">
            </div>
            <div class = "row">
                <div class = "col l6 m6 s6 left-align hide-on-small-only">
                    <button class = "btn" id = "see-more-btn" type = "submit" name = "submit"><i class = "Tiny material-icons left">arrow_downward</i>Read more
                    </button>
                </div>
                <div class = "col l6 m6 s12  right-align">
                    <a href = "/event/programm">{{__("Zur Seite : Programm")}}<i class = "Tiny material-icons right">arrow_forward</i></a>
                </div>
            </div>

            <div class = "col l12" id = "kaufen-button">
                <a href = "/ticket/info">{{__("Zum Ticketshop")}}</a>
            </div>
        </div>
    </div>




    <div class = "row" id = "ort">
        <div class = "col l6 offset-l3  m10 offset-m1">
            <div class = "col l12 m4 offset-m4 left-align">
                <h2>{{__("Veranstaltungsort")}}</h2>
            </div>
            <div class = "col l12 m12">

                <p>{{__("Die ganze Jubiläumsveranstaltung wird in der St. Jakobshalle stattfinden.")}}</p>
            </div>
            <div class = "col l12 m12">
                <div class = "col l6 m6 s12">
                    <div class = "row">
                        <img class = "ort-pic" src = "\image\StJakobshalle2018_Aussenansicht.jpg" alt = "">
                    </div>
                </div>
                <div class = "col l6 m6 s12">
                    <div class = "row">
                        <img class = "ort-pic" src = "\image\StJakobshalle2018_Halle_3.jpg" alt = "">
                    </div>
                </div>


            </div>

            <div class = "row">
                <div class = "col l6 m6 s6 left-align hide-on-small-only">
                    <a href = "http://www.stjakobshalle.ch">{{__("Veranstalter :")}} stjakobshalle
                        <i class = "Tiny material-icons left">arrow_forward</i>
                    </a>
                </div>
                <div class = "col s12 right-align hide-on-med-and-up">
                    <a href = "http://www.stjakobshalle.ch">{{__("Veranstalter :")}} stjakobshalle
                        <i class = "Tiny material-icons right">arrow_forward</i>
                    </a>
                </div>
                <div class = "col l6 m6 s12  right-align">
                    <a href = "/event/ort">{{__("Zur Seite : Ort")}}
                        <i class = "Tiny material-icons right">arrow_forward</i>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class = "row" id = "basel">
        <div class = "col l6 offset-l3  m10 offset-m1">
            <div class = "col l12 m4 offset-m5 left-align">
                <h2>{{__("Basel")}}</h2>
            </div>
            <div class = "col l12 m12">

                <p>{{__("Am Rheinknie zwischen Schweiz, Deutschland und Frankreich gelegen, zeichnet sich durch ein reges wirtschaftliches und kulturelles Leben aus. Die Universität ist durch humanistische Tradition geprägt. Die Kunst- und Musikinstitutionen der Stadt sind weltbekannt. Die Museen sind schier unzählbar, einige davon einmalig. Benutzt euer Besuch, um Basel zu entdecken, es lohnt sich. In Basel kommt man überall bequem, schnell und günstig mit dem öffentlichen Verkehr hin.")}}</p>
            </div>
            <div class = "col l12">
                <img class = "ort-pic" src = "\image\slide_1.jpg" alt = "">
            </div>

        </div>
    </div>





@endsection

@section('scripts')
    <script>

        if (n == undefined) {
            var n = 0;
        }


        var click = 0;

        $("#see-more-btn").click(function () {

            if (click == 0) {
                var text = "<i class=\"Tiny material-icons left\"> arrow_upward </i>See less";
                document.getElementById("see-more-btn").innerHTML = text ;
                $("#more-about-programm").removeClass('hide ');
                click = 1;
            } else {
                var text = "<i class=\"Tiny material-icons left\"> arrow_downward </i>See more";
                document.getElementById("see-more-btn").innerHTML = text;
                $("#more-about-programm").addClass('hide');
                click = 0;

            }

        });


        // function anim() {
        //     var scroll = $(window).scrollTop();
        //     var win_height = jQuery( window ).height();
        //     var win= win_height+scroll;
        //     // Anim title

        //     if (win > jQuery("#title").offset().top) {
        //         $("#title").addClass('animated zoomIn')
        //     };

        //     // Anim logo
        //     if (win > jQuery("#logo").offset().top) {
        //         $("#logo").addClass('animated zoomIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
        //             if (win > jQuery("#descrip").offset().top) {

        //             };
        //         });
        //     };

        //     if (win > jQuery("#title").offset().top) {
        //         $("#descrip").addClass('animated slideInUp')
        //     };


        //     // Anim training

        //     if (win > jQuery("#event-list").offset().top) {
        //         $("#training-title").addClass('animated fadeInDown');
        //     };

        //     if (win > jQuery("#event-list").offset().top) {
        //         $("#event-list").addClass('animated slideInLeft')
        //     };

        //     if (win > jQuery("#event-list").offset().top) {
        //         $("#event-detail").addClass('animated slideInRight');
        //     };


        //     // Anim guest


        //     if ($(window).width()>1020) {

        //         if (win > jQuery("#guest-title").offset().top) {
        //             $("#guest-title").addClass('animated fadeInDown');
        //         };
        //         $('.item').each(function()
        //         {
        //             var id = "#text" + $(this).attr('id');

        //             if (win > jQuery(this).offset().top) {
        //                 $(this).addClass('animated slideInRight');
        //                 $(this).css("opacity", 1);
        //                 $(id).addClass('animated slideInLeft');


        //             };
        //         });
        //     };


        //         // $("#descrip").addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
        //         //     // $("#descrip").removeClass('animated fadeIn');
        //         //     // $("#descrip").css("opacity", 1);
        //         // });
        // }

        function autoplay() {
            if (n != 1) {
                setTimeout(autoplay, 3000);
                n = 1;
            } else {
                $('.carousel').carousel('next');
                setTimeout(autoplay, 4000);
            }
        };

        $(document).ready(function () {
            // if ($(window).width()>1020) {
            //     $("#top-nav").css("opacity", 0);
            // }
            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
            });
            autoplay();
            // anim();


// $(window).scroll(function () {
//     // anim();  
//     var opacity = $(window).scrollTop()/250 ;
//             if ($(window).width()>1020) {
//                 $("#top-nav").css("opacity", opacity);
//             }        
// });

// $('.img-guest-container').each(function()
// {
//     var id = "#text" + $(this).attr('id');
//     $(this).hover(function()
//     {
//         $(id).css({"color": "white", "text-shadow": "none"});
//     },function() {
//         $(id).css({"color": "transparent", "text-shadow": "0 0 2px rgba(255, 255, 255, 0.8)"});
//         }
//     );

// });

        });

    </script>
@endsection


{{-- <div class="red-bg" id="training">
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
 --}}