<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Laravel</title>
</head>

<body style="background-color:chartreuse;">
    <h1 style="font-size:20; text-align:center">Form Bagi</h1>
    <form action="/action-bagi" method="post">
        @csrf
        <label for="">Angka 1</label>
        <input type="number" name="angka1">
        <br><br>
        <label for="">Angka 2</label>
        <input type="number" name="angka2">
        <br>
        <button type="submit">Proses</button>
    </form>
    <br><br>
    <h3>Totalnya adalah : {{ $bagi }}</h3>
</body>

</html>
