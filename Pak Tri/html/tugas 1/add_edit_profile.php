<?php
require_once "Koneksi.php";
session_start();
session_regenerate_id();

if (empty($_SESSION['email'])) {
    header("Location: Login.php");
    exit;
}

//INSERT
if (isset($_POST["add-profile"])) {
    $photo = $_FILES['photo'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = $_POST['deskripsi'];
    var_dump($photo);

    if ($photo["error"] == 0) {
        $fillName = uniqid() . "_" . basename($photo["name"]);
        $fillPath = "assets/uploads/" . $fillName;
        move_uploaded_file($photo["tmp_name"], $fillPath);
        $q_insert = mysqli_query($con, "INSERT INTO profiles (photo, nama,jabatan,deskripsi) VALUES ('$fillName','$nama','$jabatan','$deskripsi')");
        if ($q_insert) {
            header("Location: Profile.php");
        } else {
            header("Location: add_edit_profile.php");
        }
    }
}

if (isset($_GET['idEdt'])) {
    $idEdt = base64_decode($_GET['idEdt']);
    $edit = mysqli_query($con, "SELECT * FROM profiles WHERE id = $idEdt");
    $row = mysqli_fetch_assoc($edit);
    // var_dump($row);
}

//UPDATE
if (isset($_POST['edit-profile'])) {
    $idEdt = base64_decode($_GET['idEdt']);
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = $_POST['deskripsi'];
    $photo = $_FILES['photo'];

    if ($photo["error"] == 0) {
        $fillName = uniqid() . "_" . basename($photo["name"]);
        $fillPath = "assets/uploads/" . $fillName;
        $fieldPhoto = "";

        if (move_uploaded_file($photo['tmp_name'], $fillPath)) {
            // CEK FOTONYA:
            $cekFoto = mysqli_query($con, "SELECT photo FROM profiles WHERE id = $idEdt");
            $rowPhoto = mysqli_fetch_assoc($cekFoto);
            //Jika ada fotonya maka di unlink()
            if ($rowPhoto && file_exists("assets/uploads/" . $rowPhoto['photo'])) {
                unlink("assets/uploads/" . $rowPhoto['photo']);
            }
            $fieldPhoto = "photo='$fillName',";
        } else {
            echo "Gagal upload";
        }
    }


    $update = mysqli_query($con, "UPDATE profiles SET $fieldPhoto nama='$nama', jabatan='$jabatan', deskripsi='$deskripsi' WHERE id=$idEdt");
    if ($update) {
        header("Location: Profile.php");
    } else {
        header("Location: add_edit_profile.php?idEdt=$idEdt");
    }
}


// Mencegah caching agar halaman tidak bisa diakses dengan tombol Back
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require_once '../inc/navbardashboard.php'; ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center fw-bold"><?php echo isset($_GET['idEdt']) ? 'Edit' : 'ADD' ?> Profile</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mt-1">
                                <label for="" class="form-lable">Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                            <?php if (isset($_GET['idEdt'])) {
                            ?>
                                <div class="mt-1">
                                    <img src="assets/uploads/<?php echo $row['photo']; ?>" alt="" width="135">
                                </div>
                            <?php
                            } ?>
                            <div class="mt-1">
                                <label for="" class="form-lable">Nama</label>
                                <input type="text" class="form-control" value="<?php echo isset($_GET['idEdt']) ? $row['nama'] : ''; ?>" name="nama">
                            </div>
                            <div class="mt-1">
                                <label for="" class="form-lable">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" value="<?php echo isset($_GET['idEdt']) ? $row['jabatan'] : ''; ?>">
                            </div>
                            <div class="mt-1">
                                <label for="" class="form-lable">Deskripsi</label>
                                <textarea name="deskripsi" cols="30" rows="3" class="form-control"><?php echo isset($_GET['idEdt']) ? $row['deskripsi'] : ''; ?></textarea>
                            </div>
                            <div class="mt-1">
                                <a class="btn btn-secondary" href="Profile.php">Back</a>
                                <button class="btn btn-success" name="<?php echo isset($_GET['idEdt']) ? 'edit-profile' : 'add-profile'; ?>" type="submit"><?php echo isset($_GET['idEdt']) ? 'Update' : 'ADD' ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>