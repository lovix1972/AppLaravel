<!doctype html>
<html lang="en">
@include('partials.head', ['pageTitle'=>'HomePage', 'metaTitle'=>'HomePage'])

<body>
@include('partials.navbar')

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
</body>
</html>
