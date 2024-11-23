<?php
// ============= Vendor ==========
include_once '../../vendor/config.php';
// ============= Shared ==========
include_once '../../shared/head.php';
include_once '../../shared/navbar.php';

// ============= Query ===========

// Select All Customers
$selectCustomers = "SELECT * from customers";
$customers = mysqli_query($conn, $selectCustomers);
// Select All Product
$selectProducts = "SELECT * from products";
$products = mysqli_query($conn, $selectProducts);

// Editing
$message = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `orders` WHERE id =  $id ";
    $order = mysqli_query($conn, $select); // Run Query

    $row = mysqli_fetch_assoc($order);



    if (isset($_POST['update'])) {
        $customer_id = $_POST['customer_id'];
        $product_id = $_POST['product_id'];
        $amount = $_POST['amount'];

        $insert = "UPDATE `orders` SET  `product_id`=$product_id,`customer_id`=$customer_id,`amount`= $amount WHERE id = $id";
        mysqli_query($conn, $insert);
        $message = "Update Order Successfully";
    }
}
?>


<div class="container col-md-8 my-5">
    <div class="row my-2">
        <div class="col-md-8">
            <h6 class="text-danger"> Edit Order </h6>
        </div>
        <div class="col-md-4">
            <div class="d-grid">
                <a href="./list.php" class="float-end btn btn-info"><i class="fa-solid fa-circle-left"></i> Back </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post">

                <div class="row  ">
                    <?php if ($message != null): ?>
                        <div class="alert alert-success">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="customer_id" class="form-control">
                                <option selected disabled hidden> Select Customer </option>
                                <?php foreach ($customers as $item): ?>
                                    <?php if ($row['customer_id'] == $item['id']): ?>
                                        <option selected value="<?= $item['id'] ?>">
                                            <?= $item['first_name'] . $item['last_name'] ?>
                                        </option>
                                    <?php else: ?>
                                        <option value="<?= $item['id'] ?>"> <?= $item['first_name'] . $item['last_name'] ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="product_id" class="form-control">
                                <option selected disabled hidden> Select Product </option>
                                <?php foreach ($products as $item): ?>
                                    <?php if ($row['product_id'] == $item['id']): ?>
                                        <option selected value="<?= $item['id'] ?>"> <?= $item['product_name'] ?>
                                        </option>
                                    <?php else: ?>
                                        <option value="<?= $item['id'] ?>"> <?= $item['product_name'] ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <input type="number" value="<?= $row['amount'] ?>" placeholder="Amount" name="amount"
                        class="form-control">
                </div>
                <div class="d-grid">
                    <button class="btn btn-warning" name="update"> Update Now </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once '../../shared/script.php';
?>