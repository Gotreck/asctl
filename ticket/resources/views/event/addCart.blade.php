@extends('layout.master')
@section('content')
@php
    $connected = false;
    if(session()->has('user')) {
        $connected = true;
        $user = App\user::find(session()->get('user')[0]);
    }
@endphp

<!-- Parralax image with border -->
<div class="parallax-container center valign-wrapper borderdown">
    <div class="parallax">
        <img src="/image/info.jpg" alt="parallax background">
    </div>
    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h2>Prochain événement</h2>
            </div>
        </div>
    </div>
</div>
<section>
    @foreach ($tickets as $ticket)
                <div class="row">
                    <div class="col s12">
                        <!-- User who created the event profile-->
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class= "row">
                                <div class="col s12 m12 l12">
                                    <div class="row valign-wrapper">
                                        <div class="col s8 m8 l10 right-align">
                                            <p>{{ $ticket->date }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m12 l12 center-align">
                                            <h5>{{ $ticket->name }}</h5>
                                        </div>
                                        <div class="col s12 m12 l12 center-align">
                                            <h5>{{ $ticket->category()->name }}</h5>
                                        </div>
                                    </div>
                                    <hr class="divider">
                                    <!-- Event Description -->
                                    <div>
                                        <div class="row">
                                            <div class="col s12 m12 l12">
                                            <p>{{ $ticket->description }}</p>
                                               
                                            </div>
                                    
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
   @endforeach 
</section>
 

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
            $('.parallax').parallax();
        });        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true
        });
        autoplay();
        function autoplay() {
        $('.carousel').carousel('next');
        setTimeout(autoplay, 3000);
}        $(document).ready(function () {
            $('.sidenav.right').sidenav({ edge: 'right', preventScrolling: false });        });
        $(document).ready(function () {
            $('.sidenav.left').sidenav({ edge: 'left', preventScrolling: false });
        });        $('.dropdown-trigger').dropdown({
            constrainWidth: false,
            coverTrigger: false
        });</script>
@endsection
