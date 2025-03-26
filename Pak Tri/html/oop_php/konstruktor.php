<?php
class Mahasiswa
{
    public $nama;
    public $umur;

    public function __construct($nama, $umur)
    {
        $this->nama = $nama;
        $this->umur = $umur;
    }
    public function getNama()
    {
        return $this->nama;
    }
    public function getUmur()
    {
        return $this->umur;
    }
}
$mhs1 = new Mahasiswa("Niko", 22);
echo $mhs1->getNama();
echo "<br>";
echo $mhs1->getUmur();
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