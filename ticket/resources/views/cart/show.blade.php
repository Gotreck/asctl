@extends('layout.master')
@section('content')


    <div id = "title-guest" class = "row ">
        <div class = "col l6 offset-l3"><h2 id = "title">{{__("Warenkorb")}}</h2></div>
    </div>


    <div class = "row" id = "ticket-list">
        <div class = "col l6 offset-l3 m10 offset-m1 s10 offset-s1">
            <div class = "col l3 m2 s4">
                <h3>{{__("Artikel")}}</h3>
            </div>
            <div class = "col l3 m3 hide-on-small-only">
                <h3>{{__("Beschreibung")}}</h3>
            </div>
            <div class = "col l2 m2 s4">
                <h3>{{__("Preis")}}</h3>
            </div>
            <div class = "col l2 m2 s2 hide-on-small-only">
                <h3>{{__("Anzahl")}}</h3>
            </div>
        </div>

        <div class = "col l6 offset-l3 m10 offset-m1 s10 offset-s1">
            <hr>
            <br>
        </div>
        @if($cart->totalarticles() != 0)
            @foreach ($tickets as $ticket)


                <div class = "col l6 offset-l3 m10 offset-m1 s10 offset-s1">
                    <div class = "col l3 m2 s4">
                        <h3>{{ $ticket->type()->category()->name }}</h3>
                    </div>
                    <div class = "col l3 m3 hide-on-small-only">
                        <h3>{{ $ticket->type()->description}}</h3>
                    </div>
                    <div class = "col l2 m2 s4">
                        <h3>{{ $ticket->type()->price }} CHF</h3>
                    </div>
                    <div class = "col l2 m2 s2 hide-on-small-only">
                        <h3>1</h3>
                    </div>
                    <div class = "col l2 m2 s2">
                        <form method = "POST" action = "/order/delete">
                            @csrf
                            <input type = "hidden" name = "_method" value = "put">
                            <div class = "row">
                                <input type = "hidden" class = "validate" name = "ticket_id" value = "{{$ticket->id}}">
                                <div class = "input-field s6 m6 l6 textyellow">
                                    <button class = "btn waves-effect waves-light" type = "submit"><i class = "material-icons">delete</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



            @endforeach


            <div class = "col l6 offset-l3 m10 offset-m1 s10 offset-s1">
                <hr>
            </div>

            <div class = "col l6 offset-l3 m10 offset-m1 s10 offset-s1">
                <div class = "col l3 m2 s4">
                    <h3>Total</h3>
                </div>

                <div class = "col l2 offset-l3 m2 offset-m3 s4">
                    <h3>{{$cart->totalprice()}} CHF</h3>
                </div>
                <div class = "col l3 m3">
                    <h3>{{$cart->totalarticles()}}</h3>
                </div>
            </div>

            <div class = "col l6 offset-l3 m10 offset-m1 s10 offset-s1">
                <hr>
                <br>
            </div>
            {{--  echo $cart->totalprice()  --}}

            <div class = "col l6 offset-l3 m10 offset-m1 s10 offset-s1 @if($cart->totalarticles() == 0)hide @endif">


                <div id = "jetz-kaufen" class = "col l3 offset-l6 m3 offset-m5 s12 center-align ">
                    <h3>{{__("Jetzt kaufen")}}</h3>
                </div>
                <div id = "paypal-button-wrapper" class = "col l3 m4 s12 center-align">
                </div>


                <script src = "https://www.paypal.com/sdk/js?client-id=AQPCOWbPf2QJwGeAt9gXPVOWSJLKNhlpRcNxzxRll9ABx5yohzYtmuLW0PgUj8QuG4YueBhmGlYLjh72&currency=CHF"></script>


                <script>
                    paypal.Buttons({
                        createOrder: function (data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: <?php echo $cart->totalprice() ?>
                                    }
                                }]
                            });

                        },


                        onApprove: function (data, actions) {

                            actions.order.capture();

                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: 'post',
                                url: `/paypal-transaction-complete/${data.orderID}/` + <?php echo $cart->id ?> ,
                            });


                            M.toast({
                                html: 'Transaction completed.', //details.payer.name.given_name,
                                classes: 'green darken-3 rounded white-text',
                                displayLength: 5000
                            });

                            setTimeout(() => location.replace('/order/old'), 2000);


                        }
                    }).render('#paypal-button-wrapper');
                </script>

            </div>
        @else
            <div class = "row" style = "margin-bottom: 10rem">
            </div>
        @endif


        <div class = "col l6 offset-l3 m10 offset-m1 s10 offset-s1">
            <a href = "/order/old">{{__("Old order")}}</a>

            <br><br>
            <p class = "bold-info">{{__("Onlinebezahlung")}}</p>
            <p class = "no-space">{{__("Die Online-Zahlung erfolgt über PayPal. Keine Registrierung bei PayPal notwendig. Es braucht nur eine Kreditkarte.")}}</p>
            <br>
            <p class = "bold-info">{{__("Rechnung")}}</p>
            <p class = "no-space">{{__("Die Rechnungsbestätigung erhaltet ihr per E-Mail und ist gleichzeitig das Eintrittsticket für den Lehrgang. Bitte mitbringen und an der Kasse vorweisen!")}}</p>

        </div>
    </div>
    <br>
    <br>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.parallax').parallax();
        });
        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true
        });
        autoplay();

        function autoplay() {
            $('.carousel').carousel('next');
            setTimeout(autoplay, 3000);
        }

        $(document).ready(function () {
            $('.sidenav.right').sidenav({edge: 'right', preventScrolling: false});
        });
        $(document).ready(function () {
            $('.sidenav.left').sidenav({edge: 'left', preventScrolling: false});
        });
        $('.dropdown-trigger').dropdown({
            constrainWidth: false,
            coverTrigger: false
        });</script>
@endsection
