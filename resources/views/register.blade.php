<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrazione</title>
</head>
<body>
<div class="container mt-5">
    <form action="{{ route('registerUser }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class ="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old(name) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class ="form-label">email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old(email) }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class ="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old(password) }}" required>
        </div>
        <div class="mb-3">
            <label for="password-confirmation" class ="form-label">Conferma Password</label>
            <input type="password" class="form-control" id="password-confirmation" name="password-confirmation" value="{{ old(password-confirmation) }}" required>
        </div>
        <button type="submit" class ="btn btn-primary">Registrati</button>
    </form>

</div>
</body>
</html>
