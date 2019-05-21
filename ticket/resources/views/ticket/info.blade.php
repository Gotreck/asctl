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

<div id="title-guest" class="row ">
    <div class="col l8 offset-l2"><h2 id="title">{{__("Kosten")}}</h2></div>
</div>



<div class="row" id="ticket-shop">
    <div class="col l8 offset-l2">
        {{-- <h2>{{__("Kosten")}}</h2> --}}
        <p>{{__("Im Preis ist alles inbegriffen (exkl. Essen & Trinken)")}}</p> <br>
        <p>{{__("            Reguläre Preise            ")}}</p>
        <p>{{__("            Ganzer Stage:	CHF 90.– 
            ")}}</p>   
        <p>{{__("            Ganzer Tag:		CHF 60.– 
            ")}}</p>   
        <p>{{__("            Halber Tag:		CHF 30.– 
            ")}}</p>   <br>
        <p>{{__("            Vor Ort nur Barzahlungen möglich. In CHF und € zum Tageskurs
            ")}}</p>   <br>
        <p>{{__("            Vorverkauf «Early Bird Ticket»
            ")}}</p>   
        <p>{{__("            Nutzen Sie die Early Bird Preis von CHF 70.– (nur ganzes Weekend möglich). 
            ")}}</p>   
        <p>{{__("            Der Vorverkauf ist bis Ende Mai 2020 offen! 
            ")}}</p>   <br>
        <p>{{__("            Onlinebezahlung
            ")}}</p>   
        <p>{{__("            Die Online-Zahlung erfolgt über PayPal. Keine Registrierung bei PayPal notwendig. Es braucht nur eine Kreditkarte.
            ")}}</p>   <br>
        <p>{{__("            Das Ausfüllen des Kontaktformulars ist für eine Bestellung erforderlich. 
            ")}}</p>   
        <p>{{__("            Das Passwort ist gleichzeitig das Login zum Ticketshop. Bestellungen können nach Bezahlung nicht storniert werden. Bei nicht Teilnahme sind keine Rückerstattungen möglich.
            ")}}</p>   



        <div class="col l12" id="kaufen-button">
            <a href=
            @php 
            if($connected) { 
                echo "/event/1/tickets";
                
            } 
            else{
                echo"/register";
            }
            @endphp
            >{{__("Zum Ticket Shop")}}</a> 
        </div> 


        <p>{{__("            Rechnung 
            ")}}</p>   
        <p>{{__("            Die Rechnungsbestätigung erhaltet ihr per E-Mail und ist gleichzeitig das Eintrittsticket für den Lehrgang. Bitte mitbringen und an der Kasse vorweisen!
            ")}}</p>   <br>
        <p>{{__("            Info & Kontakt
            ")}}</p>   
        <p>{{__("            info@10anniversary-as.ch 
            ")}}</p>   

            
            
            
            
            
            
    </div> 
</div>



@endsection