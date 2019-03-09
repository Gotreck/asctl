@php 
$connected = false; 
if(session()->has('user')){ 
    $connected = true;
    $user = App\user::find(session()->get('user')[0]);
}
    $lang = \App::getLocale()
@endphp

<nav id="top-nav">
    <div class="nav-wrapper top">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="navitem underline"><a href="/">{{__("Startseite")}}</a></li>
            <li class="navitem underline"><a href="/training">{{__("Ort")}}</a></li>

            <li class="navitem underline"><a href="/training">{{__("Trainingsplan")}}</a></li>
            <li class="navitem underline"><a href="/training">{{__("Gäste")}}</a></li>

            {{-- <li class="navitem underline"><a href="/event/1/tickets">{{__("Tickets")}}</a></li> --}}

            @if(!$connected)
                <li class="navitem underline"><a href="/login">{{__("Log in")}}</a></li>
                <li class="navitem underline"><a href="/register">{{__("Tickets kaufen")}}</a></li>
            @endif

            @if($connected)
                <li class="navitem underline"><a href="/order">{{__("Warenkorb")}}</a></li>
                <li class="navitem underline"><a href="/logout">{{__("Ausloggen")}}</a></li>
            @endif

            @if($connected && $user->hasRole('admin'))
                <li class="navitem underline"><a href="/admin">{{__("Admin")}}</a></li>
            @endif
            <li class="navitem">
                @if ($lang =="")
                <a class='dropdown-trigger' href='#' data-target='dropdown1'><img id="lang-flag"alt="de"src="\image\de.jpg">
                </a> 
                @else
                <a class='dropdown-trigger' href='#' data-target='dropdown1'><img id="lang-flag"alt="{{$lang}}"src="\image\{{$lang}}.jpg">
                </a>
                @endif
                
            </li>
        </ul>
        
            
        <ul class="navitem sidenav-trigger right hide-on-large-only" data-target="slide-out">
                <li class="navitem">
                    <a class='dropdown-trigger' href='#' data-target='dropdown2'><img id="lang-flag"alt="{{$lang}}"src="\image\{{$lang}}.jpg">
                    </a>
                </li>
                <li class="navitem">
                    <a href="#">
                        <i class="material-icons">menu</i>
                    </a>
                </li>
                
            </ul>
    </div>
</nav>


  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
        <a class="lang-item" href="/locale/fr"><img class="lang-flag"alt="france"src="\image\fr.jpg"></a>
        <a class="lang-item" href="/locale/de"><img class="lang-flag"alt="france"src="\image\de.jpg"></a>
        <a class="lang-item" href="/locale/en"><img class="lang-flag"alt="france"src="\image\en.jpg"></a>
  </ul>

  <ul id='dropdown2' class='dropdown-content'>
        <a class="lang-item" href="/locale/fr"><img class="lang-flag"alt="france"src="\image\fr.jpg"></a>
        <a class="lang-item" href="/locale/de"><img class="lang-flag"alt="france"src="\image\de.jpg"></a>
        <a class="lang-item" href="/locale/en"><img class="lang-flag"alt="france"src="\image\en.jpg"></a>
  </ul>

<script>

$('.dropdown-trigger').each(function()
    {
       $(this).dropdown({
           coverTrigger : false
           });
    })
</script>