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