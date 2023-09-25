<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1> wedstrijd-overzicht</h1>

<div><p>wedstrijd <a href="/wedstrijd">bekijken</a></p></div>
@foreach($matches as $match)
    <p>{{$match->home_id}}</p>
    <p>{{$match->away_id}}</p>
@endforeach
</body>
</html>
