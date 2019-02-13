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
</div>
<section>
    @foreach ($events as $event)
        @php
            $user=App\user::find($event->user_id);
        @endphp 
                <div class="row">
                    <div class="col s12">
                        <!-- User who created the event profile-->
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class= "row">
                                <div class="col s12 m12 l12">
                                    
                                    <div class="row">
                                        <div class="col s12 m12 l12 center-align">
                                            <h5>{{ $event->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="row valign-wrapper">
                                        <div class="col s6 m6 l6 left-align">
                                            <h6>Start : {{ $event->start_date }}</h6>
                                        </div>
                                        <div class="col s6 m6 l6 right-align">
                                            <h6>End : {{ $event->end_date }}</h6>
                                        </div>
                                    </div>
                                    <hr class="divider">
                                    <!-- Event Description -->
                                    <div>
                                        <div class="row">
                                            <div class="col s12 m12 l12">
                                            <p>{{ $event->description }}</p>
                                               
                                            </div>
                                            
                                            <div class="col s12 m12 l12 right-align ">
                                                <a class="waves-effect waves-dark btn btn-event see" href="/event/{{$event->id}}/tickets"><i class="fas fa-eye right"></i>Commander des tickets</a>
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
