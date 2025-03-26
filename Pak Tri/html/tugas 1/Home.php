<?php
require_once "Koneksi.php";

// $tampilProfile = mysqli_query($con, "SELECT profiles.id AS idnyaprofile, profiles.photo, profiles.nama, profiles.jabatan, profiles.deskripsi, more_profiles.id_profile, GROUP_CONCAT(more_profiles.skill SEPARATOR '<br>') AS skl, GROUP_CONCAT(more_profiles.pengalaman SEPARATOR '<br>') AS pgl FROM more_profiles LEFT JOIN profiles ON more_profiles.id_profile = profiles.id WHERE profiles.id = 10"); //mengambil satu id

$tampilProfile = mysqli_query($con, "SELECT profiles.id AS idnyaprofile, profiles.photo, profiles.nama, profiles.jabatan, profiles.deskripsi, more_profiles.id_profile, GROUP_CONCAT(more_profiles.skill SEPARATOR '<br>') AS skl, GROUP_CONCAT(more_profiles.pengalaman SEPARATOR '<br>') AS pgl FROM profiles LEFT JOIN more_profiles ON more_profiles.id_profile = profiles.id WHERE profiles.status = 1"); //Ganti gambar pake boolean


$row = mysqli_fetch_assoc($tampilProfile);
// var_dump($row); //print untuk mengetahui error
?>

<!-- Homepage -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="Home.css">
</head>

<body>
    <ul>
        <li><a href="Home.php">Home</a></li>
        <li><a href="DownloadCV.html">Download CV</a></li>
        <li><a href="Contact.html">Contact</a></li>
        <li><a href="Aboutme.html">About me</a></li>
        <li><a href="Login.php">Login</a></li>
    </ul>
    <div class="gambar">
        <img src="<?php echo 'assets/uploads/' . $row['photo']; ?>" alt="">
    </div>

    <div class="nama">
        <h1><?php echo $row['nama']; ?></h1>
        <p><?php echo $row['jabatan']; ?></p>
    </div>
    <hr>
    <div class="overview">
        <h2>Overview</h2>
        <p><?php echo $row['deskripsi']; ?></p>
    </div>
    <div>
        <table style="margin: auto;  border:1px solid black;  border-collapse: collapse;">
            <tr>
                <th>Skill</th>
                <th>Pengalaman</th>
            </tr>
            <tr>
                <td><?php echo $row['skl'] ?></td>
                <td><?php echo $row['pgl'] ?></td>
            </tr>
            <tr>
                <td>CSS</td>
                <td>Pernah bekerja di B</td>
            </tr>
            <tr>
                <td>Python</td>
                <td>Pernah bekerja di C</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        Copyright 2025 @ Yusuf Niko Fitranto
    </div>
</body>

</html>