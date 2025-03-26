<?php
if (isset($_POST['save'])) {
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_adress = $_POST['customer_adress'];

    $insert = mysqli_query($koneksi, "INSERT INTO customers (customer_name, customer_phone, customer_adress) VALUES('$customer_name','$customer_phone','$customer_adress')");
    if ($insert) {
        header("location:?page=customer&add=succes");
    }
}

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_adress = $_POST['customer_adress'];

    $update = mysqli_query($koneksi, "UPDATE customers SET customer_name='$customer_name', customer_phone='$customer_phone', customer_adress='$customer_adress' WHERE id = '$id'");
    if ($update) {
        header("location: ?page=customer&update=succes");
    }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM customers WHERE id='$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Customer</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="">Customer Name</label>
                        <input type="text" class="form-control" name="customer_name" required placeholder="Enter Customer Name" value="<?= isset($_GET['edit']) ? $rowEdit['customer_name'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="">Customer Phone</label>
                        <input type="number" class="form-control" name="customer_phone" required placeholder="Enter Customer Phone" value="<?= isset($_GET['edit']) ? $rowEdit['customer_phone'] : '' ?>">
                    </div>
                    <div class=" mb-3">
                        <label for="">Customer Adress</label>
                        <input type="text" class="form-control" name="customer_adress" required placeholder="Enter Customer Adress" value="<?= isset($_GET['edit']) ? $rowEdit['customer_adress'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'save' ?>">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>