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

    <div id = "title-guest" class = "row ">
        <div class = "col l6 offset-l3 m10  s10 "><h2 id = "title">{{__("Kosten")}}</h2></div>
    </div>



    <div class = "row" id = "ticket-shop">
        <div class = "col l6 offset-l3 m10 offset-m1 s10 offset-s1">
            <p style = "font-weight:bold">{{__("Vorverkauf «Early Bird Ticket»")}}</p>
            <p>{{__("Nutzen Sie die Early Bird Preis von CHF 70.– (nur ganzes Weekend möglich).")}}</p>
            <p>{{__("Der Vorverkauf ist bis Ende Mai 2020 offen! ")}}</p><br>
            <p style = "font-weight:bold">{{__("Onlinebezahlung")}}</p>
            <p>{{__("Die Online-Zahlung erfolgt über PayPal. Keine Registrierung bei PayPal notwendig. Es braucht nur eine Kreditkarte.")}}</p>
            <div class = "cpl l12" id = "kaufen-button">
                <a href =
                        @php
                            if($connected) {
                                echo "/event/1/tickets";

                            }
                            else{
                                echo"/register";
                            }
                        @endphp
                >{{__("Jetzt Ticket kaufen")}}</a>
            </div>
            <p style = "font-weight:bold">{{__("Reguläre Preise")}}</p>
            <p>{{__("Ganzer Stage:CHF 90.–")}}</p>
            <p>{{__("Ganzer Tag:CHF 60.–")}}</p>
            <p>{{__("Halber Tag:CHF 30.–")}}</p>   <br>
            <p>{{__("Im Preis ist alles inbegriffen (exkl. Essen & Trinken). Vor Ort nur Barzahlungen möglich. In CHF und € zum Tageskurs")}}</p>   <br>
            <p style = "font-weight:bold">{{__("Kontaktformulare")}}</p>
            <p>{{__("Das Ausfüllen des Kontaktformulars ist für eine Bestellung erforderlich.")}}</p>
            <p>{{__("Das Passwort ist gleichzeitig das Login zum Ticketshop. Bestellungen können nach Bezahlung nicht storniert werden. Bei nicht Teilnahme sind keine Rückerstattungen möglich.")}}</p>


        </div>

        <div class = "col l6 offset-l3 m10 offset-m1 s10 offset-s1">
            <br>

            <p style = "font-weight:bold">{{__("Rechnung")}}</p>
            <p>{{__("Die Rechnungsbestätigung erhaltet ihr per E-Mail und ist gleichzeitig das Eintrittsticket für den Lehrgang. Bitte mitbringen und an der Kasse vorweisen!")}}</p>   <br>
            <p style = "font-weight:bold">{{__("Info & Kontakt")}}</p>
            <p>{{__("info@10anniversary-as.ch")}}</p>
        </div>


    </div>



@endsection