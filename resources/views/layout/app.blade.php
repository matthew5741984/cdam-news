<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - CDAM News</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/all.css') }}">
</head>

<body>
    <div id="app">
        @include('partials.nav')
        <div class="main">
            @yield('maincontent')
        </div>
        @include('partials.footer')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/all.js') }}"></script>
</body>

</html>
