<?php
// $dollar : membuat variabel
$nama = "PPKD Jakarta Pusat"; //varchar : kumpulan angka dan karakter lainnya
$angkatan = 2025; // int: kumpulan angka bilangan bulat
$tinggi = 168.3; // float : kumpulan angka bilangan pecahan (ada komanya)
$true = true;
$false = false;

$nama_depan = "Yusuf";
$nama_belakang = "Niko";

/*
echo $nama; // melakukan print variabel
var_dump($nama); // menampilkan data dan tipe data variabel
print ""; // melakukan print variabel
print_r(); // melakukan print data array
*/


// Array
$keranjang = ['salak', 'mangga', 'pepaya'];
echo "<p>$nama</p>";
print "$nama" . "<br>";
print_r($keranjang);
var_dump($true);
var_dump($false);
echo $nama_depan . " " . $nama_belakang;

echo "<br>";
echo "<br>";
echo "<br>";

echo "<h1>Constan Variabel di php</h1>";

define("mobil", "Mini cooper");
echo mobil;
const motor = "Supra Batok"; //nilainya tidak bisa diubah
define(motor, "Beat mber");
echo motor;
