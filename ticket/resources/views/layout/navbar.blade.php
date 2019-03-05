@php 
$connected = false; 
if(session()->has('user')){ 
    $connected = true;
    $user = App\user::find(session()->get('user')[0]);
} 
@endphp

<nav id="top-nav">
    <div class="nav-wrapper top">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="navitem"><a href="/event">Home</a></li>
            <li class="navitem"><a href="/event/1/tickets">Ticket</a></li>
            @if(!$connected)
                <li class="navitem"><a href="/login">Login</a></li>
                <li class="navitem"><a href="/register">Sign in</a></li>
            @endif

            @if($connected)
                <li class="navitem"><a href="/order">Cart</a></li>
                <li class="navitem"><a href="/logout">Logout</a></li>
            @endif

            @if($connected && $user->hasRole('admin'))
                <li class="navitem"><a href="/admin">Admin</a></li>
            @endif
            {{-- <li class="navitem">
                    <a href="" class="dropdown-button" data-activates="services-dropdown"><img alt="German"src="https://lipis.github.io/flag-icon-css/flags/4x3/de.svg" class="paises">  <span >€</span>
                    <!-- <i class="material-icons right">arrow_drop_down</i> -->
                      
                    </a>             
                    </li> --}}
        </ul>
        
            
        <ul class="navitem sidenav-trigger right hide-on-large-only" data-target="slide-out">
                <li class="navitem">
                    <a href="#">
                        <i class="material-icons">menu</i>
                    </a>
                </li>
            </ul>
    </div>
</nav>


<div id="services-dropdown" class="dropdown-content">
        <ul class="vertical-tabs col s4">
            <li><a href="hl?=gb" style="font-weight: bolder"><img alt="English"src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg" class="paises"><span  class="moedas">£</span></a></li>
            <li><a href="?hl=ka" style="font-weight: bolder"><img alt="English"src="https://lipis.github.io/flag-icon-css/flags/4x3/ge.svg" class="paises"><span  class="moedas">₾</span></a></li>
            <li><a href="?hl=us" style="font-weight: bolder"><img alt="English"src="https://lipis.github.io/flag-icon-css/flags/4x3/us.svg" class="paises"><span  class="moedas">$</span></a></li>
            <li><a href="hl=jp" style="font-weight: bolder"><img alt="English"src="https://lipis.github.io/flag-icon-css/flags/4x3/jp.svg" class="paises"><span  class="moedas">¥</span></a></li>
        </ul>
      </div>

      <script>$('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrainWidth: false,
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: true, // Displays dropdown below the button
        stopPropogation: true
            }
        );</script>