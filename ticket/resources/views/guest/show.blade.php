@section('content')
@extends('layout.master')

@php
    $lang = \App::getLocale()
@endphp





<div id="title-guest" class="row ">
        <div class="col l6 offset-l3"><h2 id="title">{{__("Senseïs")}}</h2></div>
    </div>

<div id="guest-index-white">


    <div class="row" style="min-height: 60vh;">
        <div class = "col l3 m4 offset-l1 offset-m1 hide-on-small-only">
            <div class = "item-detail" id = "{{$guest->picture()->id}}">
                <img class = "img-guest-detail" src = "/{{$guest->picture()->link}}" alt = "">
            </div>
            <div class = "guest-description media hide-on-large-only col s10 offset-s1">
                <div class = "row">
                    <h2 id = "guest-media">{{__("Link")}}</h2>
                </div>

                @if($guest->youtube != "none")
                    <div class = "row">
                        <a target = "_blank" href = "{{$guest->youtube}}">youtube.com <i class = "material-icons left">link</i></a>
                    </div>
                @endif
                @if($guest->social != "none")
                    <div class = "row">
                        <a target = "_blank" href = "{{$guest->social}}">Social <i class = "material-icons left">link</i></a>
                    </div>
                @endif
                @if($guest->website != "none")
                    <div class = "row">
                        <a target = "_blank" href = "{{$guest->website}}">website <i class = "material-icons left">link</i></a>
                    </div>
                @endif
            </div>
        </div>
        <div class = "col l4 m6 s10 offset-s1  guest-description text">
            <div class = "col s12 hide-on-med-and-up center-align">
                <div class = "item-detail " id = "{{$guest->picture()->id}}">
                    <img class = "img-guest-detail" src = "/{{$guest->picture()->link}}" alt = "">
                </div>
                <h2>{{$guest->last_name}} {{$guest->first_name}}</h2>
            </div>
            <h2 class = "hide-on-small-only">{{$guest->last_name}} {{$guest->first_name}}</h2>
            <div id = "text_min{{$guest->id}}">
                <div class = "hide-on-small-only">
                    @if ($lang == "en")
                        @php
                            echo truncate_str($guest->description_en, 750)
                        @endphp
                        ...
                    @elseif($lang == "fr")
                        @php
                            echo truncate_str($guest->description_fr, 750)
                        @endphp
                        ...
                    @else
                        @php
                            echo truncate_str($guest->description, 750)
                        @endphp
                        ...
                    @endif
                </div>

                <div class = "hide-on-med-and-up">
                    @if ($lang == "en")
                        @php
                            echo truncate_str($guest->description_en, 300)
                        @endphp
                        ...
                    @elseif($lang == "fr")
                        @php
                            echo truncate_str($guest->description_fr, 300)
                        @endphp
                        ...
                    @else
                        @php
                            echo truncate_str($guest->description, 300)
                        @endphp
                        ...
                    @endif
                </div>

            </div>
            <div id = "text_full{{$guest->id}}" class = "hide">
                @if ($lang == "en")
                    {!! $guest->description_en !!}
                @elseif($lang == "fr")
                    {!! $guest->description_fr !!}
                @else
                    {!! $guest->description !!}
                @endif

                @if($guest->movie != "none")
                    <hr>

                    <h2>Media</h2>
                    <div class = "video-container">
                        <iframe width = "560" height = "315" src = {{ $guest->movie}} frameborder="0"
                                allow = "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @endif

                <div class="hide-on-med-and-up">
                    <hr>
                    <div class = "col s12">
                        <h2 id = "guest-media">{{__("Link")}}</h2>
                    </div>

                    @if($guest->youtube != "none")
                        <div class = "col s12">
                            <a target = "_blank" href = "{{$guest->youtube}}">youtube.com <i class = "material-icons left">link</i></a>
                        </div>
                    @endif
                    @if($guest->social != "none")
                        <div class = "col s12">
                            <a target = "_blank" href = "{{$guest->social}}">Social <i class = "material-icons left">link</i></a>
                        </div>
                    @endif
                    @if($guest->website != "none")
                        <div class = "col s12">
                            <a target = "_blank" href = "{{$guest->website}}">website <i class = "material-icons left">link</i></a>
                        </div>
                    @endif
                </div>
            </div>
            <div class = "col l9 offset-l3 right-align">
                <button class = "btn read-btn" id = "{{$guest->id}}" type = "submit" name = "submit"><i
                            class = "Tiny material-icons left">arrow_downward</i>{{__("Read more")}}
                </button>
            </div>
            <br>
            <br>
            <br>
        </div>


        <div class = "col l2 offset-l1 m3 s12  guest-description media hide-on-med-and-down">
            <div class = "row">
                <h2 id = "guest-media">{{__("Link")}}</h2>
            </div>

            @if($guest->youtube != "none")
                <div class = "row">
                    <a target = "_blank" href = "{{$guest->youtube}}">youtube.com <i class = "material-icons left">link</i></a>
                </div>
            @endif
            @if($guest->social != "none")
                <div class = "row">
                    <a target = "_blank" href = "{{$guest->social}}">Social <i class = "material-icons left">link</i></a>
                </div>
            @endif
            @if($guest->website != "none")
                <div class = "row">
                    <a target = "_blank" href = "{{$guest->website}}">website <i class = "material-icons left">link</i></a>
                </div>
            @endif
        </div>


    </div>

</div>

    @php
        function truncate_str($str, $maxlen) {
    if ( strlen($str) <= $maxlen ) return $str;

    $newstr = substr($str, 0, $maxlen);
    if ( substr($newstr,-1,1) != ' ' ) $newstr = substr($newstr, 0, strrpos($newstr, " "));

    return $newstr;
    }
    @endphp





@endsection

@section('scripts')
<script>

if(n == undefined){
    var n=0;
};

var id = $('.btn').attr('id');
var full = "#text_full" + $('.btn').attr('id');
var min = "#text_min" + $('.btn').attr('id');
var click = 0;

$('.btn').click(function () {



        if (click == 0) {
            $(min).addClass('hide ');
            document.getElementById(id).innerHTML = "<i class='Tiny material-icons left'>arrow_upward</i>{{__('Read less')}}";
            $(full).removeClass('hide ');
            click = 1;
        } else {
            $(full).addClass('hide');
            document.getElementById(id).innerHTML = "<i class='Tiny material-icons left'>arrow_downward</i>{{__('Read more')}}";
            $(min).removeClass('hide');
            click = 0;

        }

});




function autoplay() {
        if(n!=1){
            setTimeout(autoplay, 3000);
            n=1;
        }
        else {
            $('.carousel').carousel('next');
            setTimeout(autoplay, 4000);
        }
    };

$(document).ready(function () {
    $('.carousel').carousel();
    autoplay();
});


</script>
@endsection