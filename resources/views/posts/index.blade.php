<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutti i Post</title>
</head>
<body>

@if($posts->isempty())
    <p> Non ci sono Post!</p>
@else
<ul>

    @foreach($posts as $post)
        <li>Post ID:{{$post->id}} | Creato il: {{$post->created_at}} | Testo: {{$post->updated_at}}
        </li>
    @endforeach
</ul>
@endif
</body>
</html>
