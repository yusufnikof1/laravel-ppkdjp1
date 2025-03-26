<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Client: disisi client -->
    <h1>Selamat Datang</h1>
    <div>
        <h2>Ini H2</h2>
    </div>
    <script>
        let el = document.querySelector('h1');
        el.innerText = "Selamat Datang Yusuf";

        let h2 = document.createElement("h2");
        let div = document.createElement("div");
        div.append(h2);
        h2.innerText = "Ini H2"
    </script>
</body>

</html>