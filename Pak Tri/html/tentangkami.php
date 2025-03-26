<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        nav{
            background-color: #112D4E;
            color: white;
            padding: 10px;
            display: flex;
            gap: 30px;
        }
        nav a {
            text-decoration: none;
            color: white;
        }
        nav a:hover {
            color: bisque;
        }
        .content {
            background-color: #DBE2EF; /* background-color = properties  */
            box-shadow: 0 0 3px black;
            padding: 15px;
            min-height: 100px;
        }
        h3 {
            font-weight: normal;
        }
        ol {
            font-size: small;
        }
        form label {
            font-weight: bold;
            display: block;
        }
        form input, textarea {
            width: 98%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #3F72AF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
        }
        footer {
            position: fixed;
            bottom: 0;
            background-color: #112D4E;
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
        }
        .gallery {
            display: flex;
            flex-wrap:wrap;
            gap: 20px;
            justify-content: center;
        }
        .gallery img {
            width: 300px;
            height: 150px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, .1);
        }
    </style>
</head>
<body>
    <nav>
        <a href="#">Beranda</a>
        <a href="tentangkami.html">Tentang Kami</a>
        <a href="gallery.html">Gallery</a>
        <a href="kontak.html">Kontak</a>
    </nav>
    <header>
        <h1>Visi Misi Kami</h1>
    </header>
    <hr> <!-- horizontal line -->
    <div class="content">
        <div class="about">
            <h2>Visi</h2>
            <p>Menjadikan diri sendiri menjadi lebih baik</p>
            <h2>Misi</h2>
            <ol>
                <li>Membangun konsistensi setiap hari meskipun cuman 1%</li>
                <li>Meninggalkan hal-hal negatif</li>
                <li>Berusaha dan berikhtiar kepada Allah SWT</li>
            </ol>
        </div>
        <div class="gallery">
            <img src="https://images.unsplash.com/photo-1597783232324-8622cff1bf3b?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="gambar1">
        </div>
    </div>
    <footer>&copy; Website Design By Yusuf Niko Fitranto</footer>
</body>
</html>