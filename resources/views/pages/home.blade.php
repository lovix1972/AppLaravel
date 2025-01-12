<!doctype html>
<html lang="en">
@include('partials.head', ['pageTitle'=>'HomePage', 'metaTitle'=>'HomePage'])

<body>
@include('partials.navbar')


@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
    @else
        {{session('session_destroy')}}
    @endif
</div>

</body>
</html>
