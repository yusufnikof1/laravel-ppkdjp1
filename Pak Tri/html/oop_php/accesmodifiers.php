<?php
// class Penduduk
// {
//     public $namaP;
//     protected $umurP;
//     private $alamatP;
// }
// $ppdk = new Penduduk();
// echo $ppdk->namaP = "Fitranto"; //Berjalan
// echo $ppdk->umurP = 22; //Error
// echo $ppdk->alamatP = "Jakarta Pusat"; //Error
?>

<?php
class Penduduk
{
    public $namaP;
    protected $umurP;
    private $alamatP;

    public function setUmurP($umurP)
    {
        $this->umurP = $umurP;
    }
    public function getUmurP()
    {
        return $this->umurP;
    }
    public function setAlamatP($alamatP)
    {
        $this->alamatP = $alamatP;
    }
    public function getAlamatP()
    {
        return $this->alamatP;
    }
}
$pddk = new Penduduk();
$pddk->setUmurP(43);
$pddk->setAlamatP("Jakarta Barat");
echo $pddk->namaP = "Andri";
echo "<br>";
echo $pddk->getUmurP();
echo "<br>";
echo $pddk->getAlamatP();
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