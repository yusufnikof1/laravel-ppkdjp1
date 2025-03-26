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
        <h1>Kontak Kami</h1>
        <p>
            <small>Berinteraksi Dengan Kami</small>
        </p>
        <hr />
    </header>
    <hr> <!-- horizontal line -->
    <div class="content">
        <form action="" method="post"> <!-- enctype="multipart/form-data" -->
            <label for="">Nama</label>
            <input type="text" name="nama" id="nama" required />
            <!-- <input type="file"> -->

            <label for="">Email</label>
            <input type="email" name="email" id="email" required />

            <label for="">Pesan</label>
            <textarea name="pesan" id="pesan"></textarea>

            <button type="submit">Kirim Pesan</button>
            <!-- <input type="submit" type="submit" value="Kirim Pesan"/> -->
        </form>
    </div>
    <footer>&copy; Website Design By Yusuf Niko Fitranto</footer>
</body>
</html>