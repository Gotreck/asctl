<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order : {{$id}}</title>

    <style type="text/css">

table {
  margin-left : 190px;
  margin-top:50px;
  width: 90%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr td {
  border: solid black 0.3px;
}

table th,
table td {
  text-align: left;
}

table th {
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  background-color: #9f0909;
  color: white;
  border: 0.3px solid black;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;


}

table .service,
table .desc {
  text-align: left;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;

}

table td {
  padding: 20px;
  text-align: left;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;

}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;

}

table td.grand {
  border-top: 0.5px solid #5D6975;;
}


#logoAS{
  height: 200px;
  position: absolute;
}


#logoAS h4{
  color: #9f0909;
  margin-top: 50px;
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
}

#pdf-table h4{
  
  color: #9f0909;
  margin-left: 250px;
  margin-top: 100px;
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
}

#pdf-body #gultig{
  
  color: #9f0909;
  margin-top: 300px;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
}

#pdf-body h4{
  color: #9f0909;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
}

#pdf-table h4{
  font-size: 16;
  margin-top: -200px;
  margin-bottom: 15px;
  color: #9f0909;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
}

p{
  font-family: 'Rubik', sans-serif;
  margin: 0;
  padding: 0;
  color: #696969;
}

#pdf-table p{
  margin-left: 250px;
}

a{
  color: #696969;
}
#QRCode{
  margin-left: 600px;
  height: 200px;
  position: absolute;}

.img{
  height: 100px;;
}
      #info-text{
        position: absolute;
        bottom: 10px;
      }

    </style>
</head>

<body>

<div id="logoAS">
  <h4>{{__("TICKET FÜR")}}</h4>
  <p>{{ $user->last_name}} {{ $user->first_name}}</p>
  <p><a href="mailto:{{ $user->email}}">{{ $user->email}}</a></p>
</div>

  <div id="pdf-body">
    <div id="body-info">
      <h4 id="gultig">{{__("GÜLTIG FÜR")}}</h4>
      <p>{{__("19 - 21 Juni 2020")}}</p>

      <h4>{{__("INFO & KONTAKT")}}</h4>
      <p>info@10anniversary-as.fr</p>
    </div>
    <div id="pdf-table"> 
      <h4>{{__("RECHNUNG")}}</h4>
      <p>{{__("Voverkauf: Early Bird Ticket")}}</p>
      <p>{{__("Bestellnummer")}}: {{ $cart->id }}</p>
      <p>{{__("Status: Bezahlt")}}</p>
        <table>
            <thead>
              <tr>
                <th>{{__("Beschreibung")}}</th>
                <th>{{__("Menge")}}</th>
                <th>{{__("Einzelpreis")}}</th>
              </tr>
            </thead>
            <tbody>
                @php
                  $tickets = $cart->tickets;
              @endphp
            @for ($i = 0; $i < 1; $i++)
            @php
                $ticket = $tickets[$i]
            @endphp
            <tr>
              <td>
                  {{$ticket->type()->name}}
              </td>
              <td>
                  {{$cart->totalarticles()}}
              </td>
              <td>
                  {{$ticket->type()->price}}
              </td>
          </tr>
          @endfor
              
              <tr>
                <td></td>
                <td>{{__("Gesamt")}}</td>
                <td>{{$cart->totalprice()}} CHF</td>
              </tr>
            </tbody>
          </table>
    </div>
    <div id="info-text">
      <p>
        {{__("Gegen Abgabe der Rechnung erhaltet ihr an der Kasse euer Ticket. Bei nicht Teilnahme sind keine Rückerstattungen möglich.")}}
        <br>
        {{__("Wir bedanken uns für deinen Auftrag. Mit freundlichen Grüssen ")}}

      </p>
      <br>
      <br>
    </div>
  </div>
  </div>

    {{-- </div>
    <div class="col l6 right-align">
        <div class="logo">
          <img src="..\public\image\aikido.jpg">
        </div>
      </div>
  </div>
        <header class="clearfix">
                <h1>Order n° {{ $id }}</h1>
                <div id="project">
                <div><span>ORDER ID</span> {{ $cart->id }}</div>
                  <div><span>USER ID</span> {{ $user->id}}</div>
                  <div><span>LAST NAME</span> {{ $user->last_name}}</div>
                  <div><span>FIRST NAME</span> {{ $user->first_name}}</div>
                  <div><span>EMAIL</span> <a href="mailto:{{ $user->email}}">{{ $user->email}}</a></div>
                </div>
              </header>
              <main>
                <table>
                  <thead>
                    <tr>
                      <th class="service">TICKET ID</th>
                      <th>TICKET VALIDITY</th>
                      <th class="desc">TICKET TYPE</th>
                      <th>TICKET DESCRIPTION</th>
                      <th>TICKET PRICE</th>
                    </tr>
                  </thead>
                  <tbody>
                        @php
                        $tickets = $cart->tickets;
                    @endphp
                @foreach ($tickets as $ticket)
                <tr>
                    <td>
                        {{$ticket->id}}
                    </td>
                    <td>
                        {{$cart->validate}}
                    </td>
                    <td>
                        {{$ticket->type()->name}}
                    </td>
                    <td>
                        {{$ticket->type()->description}}
                    </td>
                    <td>
                        {{$ticket->type()->price}}
                    </td>
                </tr>
                @endforeach
                    
                    <tr>
                      <td colspan="4" class="grand total">TOTAL</td>
                      <td class="grand total">{{$cart->totalprice()}} €</td>
                    </tr>
                  </tbody>
                </table>
                <div id="notices">
                  <div>NOTICE:</div>
                  <div class="notice">For any problem or refund request, please contact the administrator at the following address <a href="mailto:contact@contact.com">contact@contact.com</a></div>
                </div>
              </main>
              <footer>
Any information here              </footer> --}}
</body>
</html>