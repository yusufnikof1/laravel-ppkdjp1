<?php
session_start();
require '../koneksi.php';

//middleware
if (empty($_SESSION['EMAIL'])) {
    header("location:../login.php");
}

$categoriesQuery = mysqli_query($con, "SELECT * FROM categories");

if (isset($_POST['save'])) {
    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $product_photo = $_FILES['product_photo'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $product_description = $_POST['product_description'];
    $is_active = $_POST['is_active'];

    if ($product_photo['error'] == 0) {
        $fileName = uniqid() . "_" . basename($product_photo['name']);
        $filePath = "../assets/assets-adm/uploads/products/" . $fileName;
        move_uploaded_file($product_photo['tmp_name'], $filePath);

        $insert = mysqli_query($con, "INSERT INTO products (category_id, product_name, product_photo, product_price, quantity, product_description, is_active) VALUES ('$category_id','$product_name', '$fileName', '$product_price', '$quantity', '$product_description', '$is_active')");
        if ($insert) {
            header("Location: products.php");
        } else {
            header("location: add_edit_products.php");
        }
    }
}

if (isset($_GET['idEdit'])) {
    $id = $_GET['idEdit'];
    $selectProducts = mysqli_query($con, "SELECT * FROM products WHERE id = $id");
    $row = mysqli_fetch_assoc($selectProducts);
    // var_dump($row); 
}

if (isset($_POST['edit'])) {
    $id = $_GET['idEdit'];
    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $product_photo = $_FILES['product_photo'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $product_description = $_POST['product_description'];
    $is_active = $_POST['is_active'];

    $fillQupdate = '';
    $fileName = '';
    if (isset($product_photo) && $product_photo['error'] == 0) {
        $fileName = uniqid() . "_" . basename($product_photo['name']);
        $filePath = "../assets/assets-adm/uploads/products/" . $fileName;
        if (move_uploaded_file($product_photo['tmp_name'], $filePath)) {
            $checkPhoto = mysqli_query($con, "SELECT product_photo FROM products WHERE id = $id");
            $oldPhoto = mysqli_fetch_assoc($checkPhoto);
            if ($oldPhoto && !empty($oldPhoto['product_photo']) && file_exists("../assets/assets-adm/uploads/products/" . $oldPhoto['product_photo'])) {
                unlink("../assets/assets-adm/uploads/products/" . $oldPhoto['product_photo']);
            }
            $fillQupdate = "product_photo='$fileName',";
        } else {
            echo "EDIT FAILED (Upload Error)";
            exit;
        }
    }

    // Query UPDATE
    $qUpdate = mysqli_query($con, "UPDATE products SET 
    $fillQupdate
    category_id='$category_id', 
    product_name='$product_name', 
    product_price='$product_price',
    quantity='$quantity',
    product_description='$product_description', 
    is_active='$is_active' 
    WHERE id = $id
");

    if ($qUpdate) {
        header("location: products.php");
    } else {
        echo "EDIT FAILED (Query Error)";
    }


    // $fillQupdate = '';
    // if ($product_photo['error'] == 0) {
    //     $fileName = uniqid() . "_" . basename($product_photo['name']);
    //     $filePath = "../assets/assets-adm/uploads/products/" . $fileName;
    //     if (move_uploaded_file($product_photo['tmp_name'], $filePath)) {
    //         $checkPhoto = mysqli_query($con, "SELECT product_photo FROM products WHERE id = $id");
    //         $oldPhoto = mysqli_fetch_assoc($checkPhoto);
    //         if ($oldPhoto && file_exists("../assets/assets-adm/uploads/products/" . $oldPhoto['product_photo'])) {
    //             unlink("../assets/assets-adm/uploads/products/" . $oldPhoto['product_photo']);
    //         }
    //         $fillQupdate = "product_photo='$fileName',";
    //     } else {
    //         echo "EDIT FAILED";
    //     }
    // }

    // $qUpdate = mysqli_query($con, "UPDATE products SET $fillQupdate category_id='$category_id', product_name='$product_name', product_photo='$fileName', product_price='$product_price', product_description='$product_description', is_active = '$is_active' WHERE id = $id");
    // if ($qUpdate) {
    //     header("location: products.php");
    // } else {
    //     echo "EDIT FAILED";
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Create Products</title>
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
            <h1>Create Products</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Products</li>
                    <li class="breadcrumb-item active">Create Products</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo isset($_GET['idEdit']) ? 'EDIT' : 'ADD PRODUCTS'; ?></h5>
                            <form action="" method="post" enctype="multipart/form-data">
                                <!-- Category Select Option -->
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="category_id">Category</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            <option value="" disabled>Select Category</option>
                                            <?php while ($category = mysqli_fetch_assoc($categoriesQuery)) { ?>
                                                <option value="<?php echo $category['id']; ?>"
                                                    <?php echo (isset($row['category_id']) && $row['category_id'] == $category['id']) ? 'selected' : ''; ?>>
                                                    <?php echo $category['category_name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div> <!-- Category-->

                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="">Product Name</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="product_name" placeholder="Enter product name" value="<?php echo isset($_GET['idEdit']) ? $row['product_name'] : ''; ?>" required>
                                    </div>
                                </div> <!-- Product Name -->

                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="product_photo">Product Photo</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <?php if (isset($_GET['idEdit']) && !empty($row['product_photo'])) { ?>
                                            <img src="../assets/assets-adm/uploads/products/<?php echo $row['product_photo']; ?>" alt="Product Photo" style="max-width: 150px; margin-bottom: 10px;">
                                        <?php } ?>
                                        <input type="file" class="form-control" name="product_photo" id="product_photo" <?php echo isset($_GET['idEdit']) ? '' : 'required'; ?>>
                                    </div>
                                </div> <!-- Photo Product -->


                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="">Product Price</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="product_price" placeholder="Enter product price" value="<?php echo isset($_GET['idEdit']) ? $row['product_price'] : ''; ?>" required>
                                    </div>
                                </div> <!-- Product Price -->

                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="">Quantity</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="quantity" placeholder="Enter quantity of product" value="<?php echo isset($_GET['idEdit']) ? $row['quantity'] : ''; ?>" required>
                                    </div>
                                </div> <!-- Quantity -->

                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="">Product Description</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="product_description" placeholder="Enter product description" value="<?php echo isset($_GET['idEdit']) ? $row['product_description'] : ''; ?>" required>
                                    </div>
                                </div> <!-- Product Description -->

                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="">Status</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="is_active" id="" class="form-control">
                                            <option value="1" selected>Available</option>
                                            <option value="0">Not Available</option>
                                        </select>
                                    </div>
                                </div> <!-- Status -->
                                <div class="row mb-3">
                                    <div class="col-md-2 offset-md-2">
                                        <?php if (isset($_GET['idEdit'])) {
                                        ?>
                                            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
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