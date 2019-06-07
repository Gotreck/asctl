@extends('layout.master') 
@section('content')


<div id="title-guest" class="row ">
        <div class="col l6 m6 offset-l3 s3 offset-s1"><h2 id="title">{{__("Ort")}}</h2></div>
    </div>

<div class="row" id="basel">
        <div class="col l6 offset-l3 m10 offset-m1 s10 offset-s1">
            <h2>{{__("Basel")}}</h2>
            <p>{{__("Am Rheinknie zwischen Schweiz, Deutschland und Frankreich gelegen, zeichnet sich durch ein reges wirtschaftliches und kulturelles Leben aus. Die Universität ist durch humanistische Tradition geprägt. Die Kunst- und Musikinstitutionen der Stadt sind weltbekannt. Die Museen sind schier unzählbar, einige davon einmalig. Benutzt euer Besuch, um Basel zu entdecken, es lohnt sich. In Basel kommt man überall bequem, schnell und günstig mit dem öffentlichen Verkehr hin.")}}</p>
            <div class="row">
                <div class="col l12">
                    <img class="ort-pic" src="\image\slide_1.jpg" alt="">
                </div>   
            </div>       
        </div>
    </div>

<div class="row" id="ort">
        <div class="col l6 offset-l3 m10 offset-m1 s10 offset-s1">
            <h2>{{__("Veranstaltungsort")}}</h2>
            <p>{{__("Die ganze Jubiläumsveranstaltung wird in der St. Jakobshalle stattfinden.")}}</p>
            <div class="col l6 m6 s12 left-align">
                    <i class="Tiny material-icons left">arrow_forward</i><a href="http://www.stjakobshalle.ch">www.stjakobshalle.ch</a>
            </div>
            <div class="col l6 m6 s12 hide-on-med-and-up">
                <div class="row">
                    <img class="ort-pic" src="\image\StJakobshalle2018_Aussenansicht.jpg" alt="">
                </div>
                </div>


            <div class="col l6 m6 right-align hide-on-small-only">
                    <i class="Tiny material-icons right">arrow_forward</i><a href="http://www.stjakobshalle.ch">www.stjakobshalle.ch</a>
            </div>

            <div class="col s12 left-align hide-on-med-and-up">
                    <i class="Tiny material-icons left">arrow_forward</i><a href="http://www.stjakobshalle.ch">www.stjakobshalle.ch</a>
            </div>

            <div class="col l6 m6 s12 hide-on-med-and-up" style="padding-bottom:5vw;">
                    <div class="row">

                    <img class="ort-pic" src="\image\StJakobshalle2018_Halle_3.jpg" alt="">
                    </div>
                </div>


            <div class="row hide-on-small-only">
                <div class="col l12">
                    <div class="row">
                        <div class="col l6 m6 s6">
                            <img class="ort-pic" src="\image\StJakobshalle2018_Aussenansicht.jpg" alt="">
                        </div>
                        <div class="col l6 m6 s6">
                            <img class="ort-pic" src="\image\StJakobshalle2018_Halle_3.jpg" alt="">
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="row" id="basel">
        <div class="col l6 offset-l3 m10 offset-m1 s10 offset-s1">
            <h2>{{__("Anfahrt mit der ÖV")}}</h2>
            <p>{{__("Das «Joggeli», wie die Basler das St Jakobshalle nennen, ist mit Tram Nr. 14 und 10 sowie mit Bus 36 und 37 bis Haltestelle «St.Jakob» bequem zu erreichen.  Siehe auch die BVB Website für spezielle Angebote")}}</p>
            <i class="Tiny material-icons left">arrow_forward</i><a href="www.bvb.ch">www.bvb.ch</a>
            <div class="row">
                <div class="col l12">
                    <div class="row">
                        <div class="col l6 m6">
                            <img class="ort-pic" src="\image\StJakobshalle2018_Aussenansicht.jpg" alt="">
                        </div>
                    
                        <div class="col l6 m6">
                            <img class="ort-pic" src="\image\StJakobshalle2018_Halle_3.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    
    <div class="row" id="ort">
        <div class="col l6 offset-l3 m10 offset-m1 s10 offset-s1">
            <h2>{{__("Anfahrt mit dem Auto")}}</h2>
            <p>{{__("Die St. Jakobshalle liegt am südöstlichen Rand der Stadt Basel und ist mit dem Auto bestens erreichbar.")}}</p>
            <div class="row">
                <div class="col l12">
                    <a href="https://www.google.com/maps/place/St.+Jakobshalle+Basel/@47.5410802,7.616096,1139m/data=!3m1!1e3!4m5!3m4!1s0x4791b826183b1cb5:0xc621a62cb6e3cac8!8m2!3d47.540397!4d7.6182139"><img class="ort-pic" src="\image\map.jpg" alt=""></a>
                </div> 
            </div>
        </div>
    </div>


    <div class="row" id="basel">
            <div class="col l6 offset-l3 m10 offset-m1 s10 offset-s1">
                <h2>{{__("Übernachtung in Basel")}}</h2>

                <div  ></div>
                <div class="hide-on-med-and-up"></div>
                <p class="hide-on-small-only">{{__("Wir haben für euch ein paar Übernachtungsmöglichkeiten zusammengestellt.")}}</p>
                <p class="hide-on-med-and-up">{{__("Her ein paar Übernachtungsmöglichkeiten.")}}</p>
                <i class="Tiny material-icons left">arrow_forward</i><a href="www.bvb.ch">www.bvb.ch</a>
                <div  class="row hotel">
                    <div class="col l12 m12 s12">
                        <div class="row">
                            <div class="col l6 m6 s12">
                                <h2>{{__("ibis budget Basel City")}}</h2>
                                <p>{{__("1.6 km vom St. Jakobshalle")}}</p>
                                <i class="Tiny material-icons left">arrow_forward</i><a href=" https://www.accorhotels.com/de/hotel-8211-ibis-budget-basel-city/index.shtml"> https://www.accorhotels.com/</a>
                            </div>
                            <div class="col l6 m6 s12">
                                <img class="ort-pic" src="\image\StJakobshalle2018_Halle_3.jpg" alt="">
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="row hotel">
                    <div class="col l12 m12">
                        <div class="row">
                            <div class="col l6 m6">
                                <h2>{{__("Coop Tagungshotel")}}</h2>
                                <p>{{__("1.2 km vom St. Jakobshalle")}}</p>
                                <i class="Tiny material-icons left">arrow_forward</i><a href=" https://www.cooptagungszentrum.ch/de/hotel.html">  https://www.cooptagungszentrum.ch    </a>
                            </div>
                            <div class="col l6 m6">
                                <img class="ort-pic" src="\image\StJakobshalle2018_Halle_3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row hotel">
                    <div class="col l12 m12">
                        <div class="row">
                            <div class="col l6 m6">
                                <h2>{{__("Youth Hostel Basel")}}</h2>
                                <p>{{__("2.3 km vom St. Jakobshalle")}}</p>
                                <i class="Tiny material-icons left">arrow_forward</i><a href="https://www.youthhotstel.ch/de/hostels/basel/"> https://www.youthhotstel.ch  </a>
                            </div>
                            <div class="col l6 m6">
                                <img class="ort-pic" src="\image\StJakobshalle2018_Halle_3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div> 
                 <div class="row hotel">
                    <div class="col l12 m12">
                        <div class="row">
                            <div class="col l6 m6">
                                <h2>{{__("Aikidoschule Basel")}}</h2>
                                <p>{{__("3.7 km vom St. Jakobshalle")}}</p>
                                <p >{{__("Her ein paar Übernachtungsmöglichkeiten.")}}</p>
                                <p >{{__("Übernachtung im Dojo der Aikidoschule Basel € 5.-/Nacht")}}</p>
                                <img class="ort-pic hide-on-med-and-up" src="\image\StJakobshalle2018_Halle_3.jpg" alt="">

                                <br>
                                <h2>{{__("Weitere Hotels unter:")}}</h2>
                                <i class="Tiny material-icons left">arrow_forward</i><a href="https://www.booking.com"> Booking</a>
                            </div>
                            <div class="col l6 m6 hide-on-small-only">
                                <img class="ort-pic" src="\image\StJakobshalle2018_Halle_3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                 </div>  
                
            </div>
        </div>

        
        

@endsection