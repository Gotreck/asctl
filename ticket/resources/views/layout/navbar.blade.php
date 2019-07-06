@php
    $connected = false;
    if(session()->has('user')){
        $connected = true;
        $user = App\user::find(session()->get('user')[0]);
    }
        $lang = App::getLocale()
@endphp

<nav id = "top-nav">
    <div class = "nav-wrapper top">
        <a href = "/"><img class = " brand-logo hide-on-med-and-down" id = "logo-navbar" src = "\image\Event_logo.jpg" alt = "Logo_AS.png"></a>
        <ul id = "nav-mobile" class = "right hide-on-med-and-down">
            <li class = "navitem underline"><a href = "/">{{__("Startseite")}}</a></li>
            <li class = "navitem underline"><a href = "/guest">{{__("Senseïs")}}</a></li>
            <li class = "navitem underline"><a href = "/event/programm">{{__("Programm")}}</a></li>
            <li class = "navitem underline"><a href = "/event/ort">{{__("Ort")}}</a></li>

            @if(!$connected)
                <li class = "navitem underline"><a href = "/ticket/info">{{__("Kosten")}}</a></li>
                <li class = "navitem underline"><a href = "/login">{{__("Login")}}</a></li>
            @endif

            @if($connected)
                <li class = "navitem underline"><a href = "/event/1/tickets">{{__("Ticketshop")}}</a></li>
                <li class = "navitem underline"><a href = "/order">{{__("Warenkorb")}}</a></li>
                <li class = "navitem underline"><a href = "/logout">{{__("Ausloggen")}}</a></li>
            @endif

            @if($connected && $user->hasRole('admin'))
                <li class = "navitem underline"><a href = "/admin">{{__("Admin")}}</a></li>
            @endif
            <li class = "navitem">
                @if ($lang =="")
                    <a class = 'dropdown-trigger' href = '#' data-target = 'dropdown1'><img id = "lang-flag" alt = "de" src = "\image\de.jpg">
                    </a>
                @else
                    <a class = 'dropdown-trigger' href = '#' data-target = 'dropdown1'><img id = "lang-flag" alt = "{{$lang}}" src = "\image\{{$lang}}.jpg">
                    </a>
                @endif

            </li>
        </ul>


        <ul class = "navitem sidenav-trigger right hide-on-large-only" data-target = "slide-out">
            <li class = "navitem hide-on-med-and-down">
                <a class = 'dropdown-trigger' href = '#' data-target = 'dropdown2'><img id = "lang-flag" alt = "{{$lang}}" src = "\image\{{$lang}}.jpg">
                </a>
            </li>
            <li class = "navitem">
                <a href = "#" data-target = "mobile-demo" class = "sidenav-trigger"><i class = "material-icons">menu</i></a>
            </li>

        </ul>
    </div>
</nav>


<!-- Dropdown Structure -->
<ul id = 'dropdown1' class = 'dropdown-content'>
    <a class = "lang-item" href = "/locale/fr"><img class = "lang-flag" alt = "france" src = "\image\fr.jpg"></a>
    <a class = "lang-item" href = "/locale/de"><img class = "lang-flag" alt = "france" src = "\image\de.jpg"></a>
    <a class = "lang-item" href = "/locale/en"><img class = "lang-flag" alt = "france" src = "\image\en.jpg"></a>
</ul>

<ul id = 'dropdown2' class = 'dropdown-content'>
    <a class = "lang-item" href = "/locale/fr"><img class = "lang-flag" alt = "france" src = "\image\fr.jpg"></a>
    <a class = "lang-item" href = "/locale/de"><img class = "lang-flag" alt = "france" src = "\image\de.jpg"></a>
    <a class = "lang-item" href = "/locale/en"><img class = "lang-flag" alt = "france" src = "\image\en.jpg"></a>
</ul>

<ul class = "sidenav" id = "mobile-demo">

    <div class = "col s12 center-align">

    <a href = "/"><img class = " brand-logo " id = "logo-sidenav" src = "\image\Event_logo.jpg" alt = "Logo_AS.png"></a>
    </div>
    <div class = "col s12 center-align">
        <li class = "navitem"><a href = "/">{{__("Startseite")}}</a></li>
    </div>
    <div class = "col s12 center-align">
        <li class = "navitem"><a href = "/guest">{{__("Senseïs")}}</a></li>
    </div>
    <div class = "col s12 center-align">
        <li class = "navitem"><a href = "/event/programm">{{__("Programm")}}</a></li>
    </div>
    <div class = "col s12 center-align">
        <li><a href = "/event/ort">{{__("Ort")}}</a></li>

    </div>

    @if(!$connected)
        <div class = "col s12 center-align">
            <li class = "navitem underline"><a href = "/ticket/info">{{__("Kosten")}}</a></li>
        </div>
        <div class = "col s12 center-align">
            <li class = "navitem underline"><a href = "/login">{{__("Login")}}</a></li>
        </div>

    @endif

    @if($connected)
        <div class = "col s12 center-align">
            <li class = "navitem underline"><a href = "/event/1/tickets">{{__("Ticketshop")}}</a></li>

        </div>
        <div class = "col s12 center-align">
            <li class = "navitem underline"><a href = "/order">{{__("Warenkorb")}}</a></li>

        </div>
        <div class = "col s12 center-align">
            <li class = "navitem underline"><a href = "/logout">{{__("Ausloggen")}}</a></li>

        </div>


    @endif

    @if($connected && $user->hasRole('admin'))
        <div class = "col s12 center-align">
            <li class = "navitem underline"><a href = "/admin">{{__("Admin")}}</a></li>

        </div>

    @endif
    <div class = "row center-align">
        <li>
            <a href = "/locale/fr"><img class = "lang-flag" alt = "france" src = "\image\fr.jpg"></a>
        </li>

        <li><a href = "/locale/de"><img class = "lang-flag" alt = "france" src = "\image\de.jpg"></a>
        </li>
        <li><a href = "/locale/en"><img class = "lang-flag" alt = "france" src = "\image\en.jpg"></a></li>

    </div>


</ul>

<script>

    $('.sidenav').sidenav();
    $('.dropdown-trigger').each(function () {
        $(this).dropdown({
            coverTrigger: false
        });
    })
</script>