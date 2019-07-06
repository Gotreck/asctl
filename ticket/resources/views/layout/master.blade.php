<!DOCTYPE html>
<html lang = "fr">

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <meta name = "theme-color" content = "#9f0909">
    <meta name = "csrf-token" content = "{{ csrf_token() }}">
    <title>ASCTL Ticket </title>
    <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet">
    <link href = "https://fonts.googleapis.com/css?family=Rubik:400" rel = "stylesheet">
    <link rel = "stylesheet" href = "/css/materialize.css">
    <link rel = "stylesheet" href = "/css/animate.css">
    <link rel = "stylesheet" href = "/css/app.css">
    <script src = "/js/jquery.js"></script>
    <script src = "https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script src = "/js/materialize.js"></script>
    <link rel = "shortcut icon" type = "image/png" href = "/image/faviconAiki.png" />
    @yield('additionalheader')
</head>

<body>

<a class="hide-on-med-and-down" href = "https://fr-fr.facebook.com/"><img id = "fbButton" src = "/image/Overlay Button fb.jpg" alt = "fb"></a>
@include('layout.navbar')
@yield('content')
@yield('scripts')
@include('layout.footer')
<script>
</script>
</body>

</html>