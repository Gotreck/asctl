@extends('layout.master')
@section('content')
    @php
        $connected = false; if(session()->has('user')){
            $connected = true;
            $user = App\user::find(session()->get('user')[0]);
        }
    @endphp

    <div class = "parallax-container center valign-wrapper borderdown">
        <div class = "parallax"><img src = "/image/info.jpg">
        </div>
    </div>

    <!-- Top actualité -->
    <section class = "container">
        <h4 class = "center-align">Create guest</h4>
        <form method = "POST" action = "/guest/create" id = "event_form" enctype = "multipart/form-data">
            @csrf
            <div class = "row">
                <div class = "input-field">
                    <input id = "name" type = "text" class = "validate" name = "last_name" value = "{{old('last_name')}}">
                    <label for = "name">guest last name</label>
                </div>

                <div class = "input-field">
                    <input id = "name" type = "text" class = "validate" name = "first_name" value = "{{old('first_name')}}">
                    <label for = "name">guest first name</label>
                </div>

                <div class = "input-field">
                    <input id = "movie" type = "text" class = "validate" name = "movie" value = "{{old('movie')}}">
                    <label for = "movie">movie</label>
                </div>

                <div class = "input-field">
                    <input id = "website" type = "text" class = "validate" name = "website" value = "{{old('website')}}">
                    <label for = "website">website</label>
                </div>
                <div class = "input-field">
                    <input id = "social" type = "text" class = "validate" name = "social" value = "{{old('social')}}">
                    <label for = "social">social</label>
                </div>
                <div class = "input-field">
                    <input id = "youtube" type = "text" class = "validate" name = "youtube" value = "{{old('youtube')}}">
                    <label for = "youtube">youtube</label>
                </div>

                <label>guest description de</label>
                <textarea id = "description" class = "validate materialize-textarea" name = "description" value = "{{old('description')}}"></textarea>

                <label>guest description fr</label>
                <textarea id = "description_fr" class = "validate materialize-textarea" name = "description_fr" value = "{{old('description')}}"></textarea>

                <label>guest description en</label>
                <textarea id = "description_en" class = "validate materialize-textarea" name = "description_en" value = "{{old('description')}}"></textarea>

            </div>
            <label>Image de présentation</label>
            <div class = "file-field input-field">
                <div class = "btn">
                    <span>Rechercher</span>
                    <input type = "file" name = "image" />
                </div>

                <div class = "file-path-wrapper">
                    <input class = "file-path validate" type = "text" name = "imagetext" placeholder = "Importer un fichier" />
                </div>
            </div>


            <div class = "input-field center-align">
                <button class = "btn waves-effect waves-light" id = "submit" type = "submit" name = "submit">Publier votre guest</button>
            </div>
        </form>


        @if (count($errors) > 0)
            <div class = "card-panel red lighten-5 login_waper">
                <ul>
                    @foreach ($errors->all() as $error)
                        <h6>
                            <li class = "red-text">{{ $error }}</li>
                        </h6>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
@endsection

@section('scripts')

    <script>

        $(document).ready(function () {
            $('select').formSelect();
            $('.parallax').parallax();
            CKEDITOR.replace('description');
            CKEDITOR.replace('description_fr');
            CKEDITOR.replace('description_en');
        });


    </script>
@endsection
