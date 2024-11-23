<?php
// ============= Vendor ==========
include_once '../../vendor/config.php';
include_once '../../vendor/functions.php';
// ============= Shared ==========
include_once '../../shared/head.php';
include_once '../../shared/navbar.php';

$count = 0;

// ============== query ==========

$select = "SELECT * from  customers";
$customer_data = mysqli_query($conn, $select);

?>


<div class="container col-md-8 my-5">
    <div class="row my-2">
        <div class="col-md-8">
            <h6> List Customers </h6>
        </div>
        <div class="col-md-4">
            <div class="d-grid">
                <a href="./create.php" class="float-end btn btn-info"> <i class="float-start fa-solid fa-folder-plus"></i>Create New </a>
            </div>
        </div>
    </div>
    <div class="card">

        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>#NO</th>
                    <th>First Name</th>
                    <th> Email</th>
                    <th colspan="2"> Action </th>
                </tr>
                
                <?php foreach($customer_data as $item) : ?>
                    <tr>
                        <th><?= ++$count?></th>
                        <th><?= $item['first_name'] ?></th>
                        <th><?= $item['email'] ?></th>
                        <th> <a href="./show.php?show=<?= $item['id']?>"><i class ="fa-solid fa-eye"></i></a></th>
                        <th> <a onclick="return confirm('Are you sure')" href="./list.php?delete=<?= $item['id']?>"><i class ="text-danger fa-solid fa-trash"></i></a></th>

                    </tr>
                <?php endforeach; ?>
                
            </table> 
        </div>
    </div>
</div>


<?php
include_once '../../shared/script.php';

?>