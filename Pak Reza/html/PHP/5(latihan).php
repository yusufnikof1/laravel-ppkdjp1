<!-- Simulasi Angsuran Pembiayaan -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Angsuran Pembiayaan</title>
</head>

<body>
    <h1>Simulasi Angsuran Pembiayaan</h1>
    <form action="" method="post">
        <label for="">Jumlah Permohonan</label>
        <input type="number" name="permohonan" id="" class="">
        <br><br>
        <label for="">Jangka Waktu</label>
        <select name="jangka_waktu" id="">
            <option value="12">12 Bulan</option>
            <option value="24">24 Bulan</option>
            <option value="36">36 Bulan</option>
            <option value="48">48 Bulan</option>
            <option value="60">60 Bulan</option>
        </select>
        <br><br>
        <button name="proses" type="submit">Proses</button>
    </form>

    <?php
    $hasil = 0;

    if (isset($_POST['proses'])) {
        $permohonan = $_POST['permohonan'];
        $jangka_waktu = $_POST['jangka_waktu'];
        $rate = 0.18;

        $hasil = ($permohonan * $rate / $jangka_waktu) + ($permohonan / $jangka_waktu);
    }
    ?>

    <p><strong>ESTIMASI ANGSURAN/BULAN : <?php echo "Rp. " . number_format($hasil); ?></strong></p>
    <p>
    </p>
</body>

</html>