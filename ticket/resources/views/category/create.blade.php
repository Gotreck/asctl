@extends('layout.master') 
@section('content')
{{-- Parallax header --}}
<section>
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg" alt="background-parallax">
        </div>
        <div class="container white-text">
            <div class="row">
                <div class="col s12">
                    <h5>Création de catégorie</h5>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Add new category --}}
<section class="container center">
    <h5 class>Add new category</h5>
    {{-- form to add a new category --}}
    <form action="/category" method="post">
        <div class="row">
            @csrf
            <div class="input-field col s12">
                <input id="cat" type="text" class="validate" name="category" value="{{old('category')}}">
                <label for="cat">New category</label>
            </div>
            <div class="input-field col s12">
                <input id="color" type="color" class="validate" name="color" value="{{old('color')}}">
                <label for="color">Color</label>
            </div>
            <button type="submit" class="btn">Add</button>
        </div>

    </form>

    @if (count($errors) > 0)
    <div class="card-panel red lighten-5 login_waper">
        <ul>
            @foreach ($errors->all() as $error)
            <h6>
                <li class="red-text">{{ $error }}</li>
            </h6>
            @endforeach
        </ul>
    </div>
    @endif

</section>

@endsection