<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro PDS</title>

    @include('partials.head', ['pageTitle'=>'Registro PDS', 'metaTitle'=>'Registro PDS'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

<header>
    @include('partials.navbar')
</header>

<main class="contents">
    {{ $slot }}
</main>

</body>
</html>


</html>
