<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<header>

    @include('partials.head', ['pageTitle'=>'Registro PDS', 'metaTitle'=>'Registro PDS'])
    @include('partials.navbar')
    @vite('resources/css/app.css')
</header>

<body>

<main class="contents">
       {{ $slot }}
</main>

</body>



</html>
