<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background: linear-gradient(to right, white, rgb(220, 147, 21), #fff);
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 20px;
        }

        .headerr {
            display: flex;
        }

        .headerr img {
            max-width: 300px;
            align-self: flex-start;
        }

        .kata {
            margin-top: 30px;
            padding-left: 30px;
            flex-grow: 1;
        }

        .kata p {
            margin-top: 80px;
        }

        .btn-option {
            background-color: rgb(3, 28, 251);
            color: #fff;
            text-decoration: none;
            padding: 15px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            width: 250px;
            height: 120px;
            font-size: 18px;
            font-weight: bold;
            align-items: center;

        }

        .options {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 60px;
            margin-left: 85px;
            margin: 60px 0px 85px 0px;
        }

        .btn-option:hover {
            background-color: rgb(62, 80, 245);
        }

        footer {
            position: fixed;
            bottom: 5px;
            background-color: rgb(3, 28, 251);
            width: 100%;
            color: white;
            padding: 7px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="headerr">
            <div class="kata">
                <h4>Assalamualaikum Wr, Wb.</h4>
                <h5>Selamat Datang di PT. Sejahtera</h5>
                <p>Silahkan Pilih Jenis Transaksi</p>
            </div>
            <img src="img/Logo.png" alt="Bank Syariah Riyal">
        </div>

        <div class="options">
            <a href="" class="btn-option">Customer Service</a>
            <a href="" class="btn-option">Teller Officer</a>
            <a href="" class="btn-option">Pengaduan Nasabah</a>
        </div>

    </div>

    <footer>
        <marquee direction="right">Selamat Datang di PT. Sejahtera</marquee>
    </footer>
</body>

</html>