<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<header>

    @include('partials.head', ['pageTitle'=>'Registro PDS', 'metaTitle'=>'Registro PDS'])
    @include('partials.navbar')

</header>

<body>
<main class="contents">
       {{ $slot }}
</main>

</body>


</html>
