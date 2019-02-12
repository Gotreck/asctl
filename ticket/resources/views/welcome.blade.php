@extends('layout.master') 
@section('content')
<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg" alt="background parallax">
        </div>
    </div>
</section>


@endsection
 
@section('scripts')
<script>
    

$(document).ready(function () {
            $('.parallax').parallax();
        });

</script>
@endsection