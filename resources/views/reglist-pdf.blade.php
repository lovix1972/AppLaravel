<!DOCTYPE html>
<html lang="it">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Stampa Reglist</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
<h1>Anteprima di Stampa - Elenco Preavvisi</h1>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Capitolo</th>
        <th>Articolo</th>
        <th>Prog</th>
        <th>Preavviso</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datiReglist as $dati)
        <tr>
            <td>{{ $dati->id}}</td>
            <td>{{ $dati->capitolo }}</td>
            <td>{{ $dati->art }}</td>
            <td>{{ $dati->prog }}</td>
            <td>{{ number_format($dati->preavviso ,2,',','.')}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>