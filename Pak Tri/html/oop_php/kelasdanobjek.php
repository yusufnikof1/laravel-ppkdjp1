<?php
class Mahasiswa
{
    public $nama;
    public $umur;

    public function setNama($nama)
    {
        $this->nama = $nama;
    }
    public function getNama()
    {
        return $this->nama;
    }
    public function setUmur($umur)
    {
        $this->umur = $umur;
    }
    public function getUmur()
    {
        return $this->umur;
    }
}
$mhs1 = new Mahasiswa();
$mhs1->setNama('Yusuf');
$mhs1->setUmur('22');
echo $mhs1->getNama();
echo '<br>';
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