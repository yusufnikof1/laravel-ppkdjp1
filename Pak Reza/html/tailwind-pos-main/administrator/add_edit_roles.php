<?php
session_start();
require '../koneksi.php';

//middleware
if (empty($_SESSION['EMAIL'])) {
    header("location:../login.php");
}
//jika button save di klik
if (isset($_POST['save'])) {
    $name = $_POST['name'];

    $insert = mysqli_query($con, "INSERT INTO roles (name) VALUES ('$name')");
    if ($insert) {
        header("Location: roles.php");
    }
}

if (isset($_GET['Edit'])) {
    $id = $_GET['Edit'];

    $qEdit = mysqli_query($con, "SELECT * FROM roles WHERE id = $id");
    $rowEdt = mysqli_fetch_assoc($qEdit);
}

if (isset($_POST['edit'])) {
    $id = $_GET['Edit'];
    $name = $_POST['name'];
    $is_active = $_POST['is_active'];
    $qUpdate = mysqli_query($con, "UPDATE roles SET name='$name' WHERE id = $id");
    if ($qUpdate) {
        header("location: roles.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Create Role</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/assets-adm/img/logo-ppkdjp_32x32.jpg" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/assets-adm/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/assets-adm/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/assets-adm/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/assets-adm/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/assets-adm/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/assets-adm/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/assets-adm/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/assets-adm/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include '../inc-administrator/navbar.php' ?>

    <!-- ======= Sidebar ======= -->
    <?php include '../inc-administrator/sidebar.php' ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Role</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="roles.php">Dashboard</a></li>
                    <li class="breadcrumb-item">Roles</li>
                    <li class="breadcrumb-item active">Create Role</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Create</h5>
                            <form action="" method="post">
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="">Role Name</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select name="name" class="form-control">
                                            <option value="Administrator">Administrator</option>
                                            <option value="User">User</option>
                                            <option value="Leader">Leader</option>
                                        </select>
                                    </div>
                                </div> <!-- Roles -->

                                <div class="row mb-3">
                                    <div class="col-md-2 offset-md-2">
                                        <?php
                                        if (isset($_GET['Edit'])) {
                                        ?>
                                            <button name="edit" class="btn btn-success" type="submit">Edit</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button name="save" class="btn btn-primary" type="submit">Save</button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Developed by <a href="">Yusuf Niko Fitranto</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/assets-adm/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/assets-adm/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/assets-adm/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/assets-adm/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/assets-adm/vendor/quill/quill.js"></script>
    <script src="../assets/assets-adm/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/assets-adm/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/assets-adm/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/assets-adm/js/main.js"></script>

</body>

</html>