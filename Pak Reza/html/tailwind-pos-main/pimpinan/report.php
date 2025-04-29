<?php
session_start();
require '../koneksi.php';

$where = "";
$datefrom = date('Y-m-d');
$dateto = date('Y-m-d');

if (isset($_POST['submitreport'])) {
    $datefrom = $_POST['datefrom'];
    $dateto = $_POST['dateto'];

    if (!empty($datefrom) && !empty($dateto)) {
        $where = "WHERE DATE(created_at) >= '$datefrom' AND DATE(created_at) <= '$dateto'";
    }
}

$orders = mysqli_query($con, "SELECT * FROM orders $where ORDER BY created_at DESC");
$rows = mysqli_fetch_all($orders, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Report</title>

    <!-- Favicons -->
    <link href="../assets/assets-adm/img/logo-ppkdjp.jpg" rel="icon">
    <link href="../assets/assets-adm/img/logo-ppkdjp.jpg" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="../assets/assets-adm/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/assets-adm/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/assets-adm/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/assets-adm/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="../assets/assets-adm/css/style.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

</head>

<body>

    <!-- ======= Header & Sidebar ======= -->
    <?php include '../inc-pimpinan/navbar.php'; ?>
    <?php include '../inc-pimpinan/sidebar.php'; ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Report</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="leader-dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Report</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">

                <!-- Filter Form -->
                <div class="col-lg-12">
                    <div class="card top-selling overflow-auto effectup">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Filters</h5>
                            <form action="" method="post">
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <label for="datefrom">Date From</label>
                                        <input type="date" class="form-control" name="datefrom" id="datefrom" value="<?= $datefrom ?>">
                                    </div>
                                    <div class="col-3">
                                        <label for="dateto">Date To</label>
                                        <input type="date" class="form-control" name="dateto" id="dateto" value="<?= $dateto ?>">
                                    </div>
                                    <div class="col-2 align-self-end">
                                        <button type="submit" class="btn btn-primary" name="submitreport">
                                            <i class="bi bi-search"></i> Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Data Table -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Orders</h5>
                            <div class="table table-responsive">
                                <table class="table table-bordered datatablebutton">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Order Code</th>
                                            <th>Order Date</th>
                                            <th>Amount</th>
                                            <th>Change</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($rows as $row):
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= htmlspecialchars($row['order_code']); ?></td>
                                                <td><?= htmlspecialchars($row['order_date']); ?></td>
                                                <td><?= htmlspecialchars($row['order_amount']); ?></td>
                                                <td><?= htmlspecialchars($row['order_change']); ?></td>
                                                <td>
                                                    <?php
                                                    if ($row['order_status'] == '1') {
                                                        echo "<span class='badge bg-success'>Paid</span>";
                                                    } else {
                                                        echo "<span class='badge bg-warning'>Unpaid</span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= date('d-m-Y H:i', strtotime($row['created_at'])); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
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
            Developed by <a href="#">Yusuf Niko Fitranto</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../assets/assets-adm/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function() {
            $('.datatablebutton').DataTable({
                dom: 'Bfrtip',
                "bPaginate": false,
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>

</body>

</html>