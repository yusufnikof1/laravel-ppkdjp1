<?php
session_start();
require '../koneksi.php';

$products = mysqli_query($con, "SELECT products.*, categories.category_name as category_name FROM products INNER JOIN categories ON products.category_id = categories.id");
$rows = mysqli_fetch_all($products, MYSQLI_ASSOC);
// var_dump($rows);

if (isset($_GET['idDel'])) {
    $id = $_GET['idDel'];

    $delete = mysqli_query($con, "DELETE FROM products WHERE id = $id");
    if ($delete) {
        header("location: products.php");
    } else {
        echo "GAGAL DELETE";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Products</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/assets-adm/img/logo-ppkdjp.jpg" rel="icon">
    <link href="../assets/assets-adm/img/logo-ppkdjp.jpg" rel=" apple-touch-icon">

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
            <h1>Products</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="administrator-dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Products</h5>
                            <div class="table table-responsive">
                                <div style="text-align: right">
                                    <a class="btn btn-primary mb-2" href="add_edit_products.php">CREATE</a>
                                </div>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Product Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    $no = 1;
                                    foreach ($rows as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><img src="../assets/assets-adm/uploads/products/<?php echo $row['product_photo']; ?>" alt="Products Photo" width="100"></td>
                                            <td><?php echo $row['category_name']; ?></td>
                                            <td><?php echo $row['product_name']; ?></td>
                                            <td><?php echo $row['product_price']; ?></td>
                                            <td><?= $row['quantity'] ?></td>
                                            <td><?php echo $row['product_description']; ?></td>
                                            <td><?php
                                                switch ($row['is_active']) {
                                                    case '1':
                                                        $label = "<span class='badge bg-success'>Available</span>";
                                                        break;

                                                    default:
                                                        $label = "<span class='badge bg-warning'>Not Available</span>";
                                                        break;
                                                }
                                                echo $label
                                                ?></td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="add_edit_products.php?idEdit=<?php echo $row['id']; ?>">Edit</a>
                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin delete?')" href="products.php?idDel=<?php echo $row['id'] ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
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