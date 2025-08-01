<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<header>

    @include('partials.head', ['pageTitle'=>'Registro PDS', 'metaTitle'=>'Registro PDS'])
    @include('partials.navbar')

</header>

<body>
<script src="{{ asset('js/app.js') }}" defer></script>
<main class="contents">
       {{ $slot }}
</main>

</body>



</html>
