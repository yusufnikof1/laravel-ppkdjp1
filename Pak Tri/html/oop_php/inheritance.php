<?php
class Penduduk
{
    public $nama;
    protected $umur;
    private $alamat = "Jakarta";
}

class Bansos extends Penduduk
{
    public $nama = "Anton";
    protected $umur = 24;
    public $status = "Miskin";
    private $alamat = "Jakarta";
    public function showPenduduk()
    {
        echo $this->nama . "<br>";
        echo $this->status . "<br>";
        echo $this->umur . "<br>";
        echo $this->alamat . "<br><br>";
    }
}
$penduduk = new Bansos();
$penduduk->showPenduduk(); //Menampilkan Anto, Miskin, 24, Undefined property (Private)
echo $penduduk->nama . "<br>";
echo $penduduk->status . "<br>";
echo $penduduk->umur . "<br>";
echo $penduduk->alamat . "<br>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>