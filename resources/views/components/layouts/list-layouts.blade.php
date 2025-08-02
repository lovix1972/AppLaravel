<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<header>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @include('partials.head', ['pageTitle'=>'Registro PDS', 'metaTitle'=>'Registro PDS'])
@include('partials.navbar')

</header>

<body>


<main class="contents">

       {{ $slot }}
</main>

</body>


</html>
