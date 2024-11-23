<?php
// ============= Vendor ==========
include_once '../../vendor/config.php';
// ============= Shared ==========
include_once '../../shared/head.php';
include_once '../../shared/navbar.php';
// Select All Customers
$selectCustomers = "SELECT * from customers";
$customers = mysqli_query($conn, $selectCustomers);
// Select All Product
$selectProducts = "SELECT * from products";
$products = mysqli_query($conn, $selectProducts);

$message = null;
if(isset($_POST['send'])){
    $customer_id = $_POST['customer_id'];
    // $product_id = $_POST['product_id'];
    $product_data = $_POST['product_data'];
    $values = explode('|', $product_data);
    $product_id = $values[0];
    $product_price = $values[1];
    $delviry = $_POST['dev'];
    $tax = $_POST['tax'];
    $quantity = $_POST['quantity'];
    $totalAmount = $product_price * $quantity;
    $totalAmountAfterAll = ($totalAmount + $delviry) + $tax;

    $amount = $totalAmountAfterAll ;
    
    $insert = "INSERT into orders values(null, $product_id, $customer_id, $quantity, $delviry, $tax,$totalAmount,$totalAmountAfterAll,$amount)";
    mysqli_query($conn, $insert);
    $message = "Create Order Successfully";
}
?>


<div class="container col-md-8 my-5">
    <div class="row my-2">
        <div class="col-md-8">
            <h6> Create Order </h6>
        </div>
        <div class="col-md-4">
            <div class="d-grid">
                <a href="./list.php" class="float-end btn btn-info"><i class="fa-solid fa-circle-left"></i> Back </a>
            </div>
        </div>
    </div>

    <div class="card">
        <?php if($message != null): ?>
            <div class="alert alert-success">
                <?= $message ?>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <form method="post">
                <div class="row  ">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="customer_id" class="form-control">
                                <option selected disabled hidden> Select Customer </option>
                                <?php foreach($customers as $items) :?>
                                    <option value="<?= $items['id'] ?>"> <?= $items['first_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="product_data" class="form-control">
                                <option selected disabled hidden> Select Product </option>
                                <?php foreach($products as $items) :?>
                                    <option value="<?= $items['id'] ?> | <?= $items['price']?>"> <?= $items['product_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="dev" placeholder="Delivry Cost" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="tax" placeholder="Tax Cost" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="quantity" placeholder="Quantity" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <input type="number" readonly placeholder="Amount" name="amount" class="form-control">
                </div> -->
                <div class="d-grid">
                    <button class="btn btn-info" name="send"> Create Now </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once '../../shared/script.php';

?>