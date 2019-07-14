<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order : {{$id}}</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        * {
            font-family: Roboto;
        }

        a {
            text-decoration: none;
        }

        table {
            font-size: x-small;
        }

        .tab table {
            margin: 15px;
        }

        .header table {
            padding: 10px;
        }

        h3 {
            text-align: center;
        }
        
        .description {
            padding-left: 40px;
            
        }

        .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
</head>

<body>
        <header class="clearfix">
                <div id="logo">
                  <img src="..\public\image\aikido.jpg">
                </div>
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
                      <td class="grand total">{{$cart->totalprice()}} CHF</td>
                    </tr>
                  </tbody>
                </table>
                <div id="notices">
                  <div>NOTICE:</div>
                  <div class="notice">For any problem or refund request, please contact the administrator at the following address <a href="mailto:contact@contact.com">contact@contact.com</a></div>
                </div>
              </main>
              <footer>
Any information here              </footer>
</body>
</html>