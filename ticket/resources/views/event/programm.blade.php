@section('content')
@extends('layout.master')

<div id="title-guest" class="row ">
    <div class="col l4 m4 s12 offset-l3"><h2 id="title">{{__("Programm")}}</h2></div>
</div>


<div id="programm">

    <div class="row">
        <div class="col l6 m10 s10 offset-s1 offset-m1 offset-l3">
            <h2> {{__("Trainingsplan")}}  </h2>
            <p>{{__("Wir sind glücklich, dass uns eine Vielzahl von Senseis zugesagt haben. Einige Trainings sind unterteilt. Dies erlaubt es allen Teilnehmern mit unterschiedlichen Lehrern zu trainieren und bietet die Möglichkeit, die großartige Vielfalt des Aikido  zu erleben.")}}</p>
        </div>
    </div>
    <div class="row hide-on-small-only">
        <div class="col l6 m10 offset-m1 offset-l3">
            <img class="programm-pic" src="\image\freitag.jpg" alt="">
        </div>
    </div>

    <div class="row hide-on-small-only">
        <div class="col l6 m10 offset-m1 offset-l3">
            <img class="programm-pic" src="\image\Samstag.jpg" alt="">
        </div>
    </div>

    <div class="row hide-on-small-only">
        <div class="col l6  m10 offset-m1 offset-l3">
            <img class="programm-pic" src="\image\Sonntag.jpg" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col l6 offset-l3 s10 offset-s1 m10 offset-m1">
            <div class="right-align"> <a href="\storage\programm.pdf"><i class="Tiny material-icons right">file_download</i>{{__("Download Programm")}}</a></div>

        </div>
    </div>
</div>  


<div id="plan">
        <div class="row">
            <div class="col l6 offset-l3 m10 offset-m1 s10 offset-s1">
                <h2> {{__("Hallenplan")}} </h2>
                <p>{{__("Hall 3 : Eingang/Kasse & Trainingshalle / Parking")}}</p>
                <img class="plan-pic" src="\image\PlanHall3.jpg" alt="">
                <p>{{__("Hall 5 : Vortrag & Party / Hall 4 Japanfestival")}}</p>
                <img class="plan-pic" src="\image\PlanHall2.jpg" alt="">
            </div>
        </div>
</div>

<div id="programm">

        <div class="row">
            <div class="col l6 offset-l3 m10 offset-m1 s10 offset-s1">
                <h2> {{__("Verpflegung & Freizeit")}}  </h2>
                <p>{{__("Das Japanfestival kann man frei besuchen und sich dort auch kostengünstig verpflegen. Zudem befindet sich gegenüber der St. Jakobshalle ein grosses Einkaufsareal, mit vielen Läden und etlichen Restaurants.")}}</p>
                <p class="hide-on-small-only">{{__("Bei schönem Wetter bietet die unmittelbare Umgebung mit dem Park im Grünen eine wunderbare Picknick- und Erholungsoase. Ebenfalls hat es neben der Trainingshalle ein olympisches Freibad.")}}</p>
               <div class="col l12 m12">
                    <i class="Tiny material-icons left">arrow_forward</i><a href="https://www.parkimgruenen.ch">{{__("parkimgruenen.ch")}}</a>
               </div>
               <div class="col l12 m12">
                    <i class="Tiny material-icons left">arrow_forward</i><a href="http://badi-info.ch/bs/st-jakob.html">{{__("badi-info.ch/bs/st-jakob.html")}}</a>   
               </div>  
            </div>
        </div>
        <div class="row">
                <div class="col l6 offset-l3 m10 offset-m1 s10 offset-s1">
                    <hr id="japan-hr">
                    <h3> {{__("Japanfestival")}} </h3>
                    <p>{{__("Hall 4 und auf dem vorgelagerten Platz beim Parking. Samstag, 20. Juni.")}}</p>
                    <img class="plan-pic" src="\image\japanfestival.jpg" alt="">
                    <p>{{__("Es erwartet euch ein vielfältiges japanisches Kulturfestival mit japanischen Köstlichkeiten.")}} </p>
                           <p> {{__("Mehr Informationen unter:")}} <a href="http://www.samourai-matsuri.ch">www.samurai-matsuri.ch</a> </p>
                </div>
            </div>
</div>  
    


    


@endsection
 
@section('scripts')

@endsection
    