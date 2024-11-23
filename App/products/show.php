<?php
include_once '../../vendor/config.php';
// ============= Shared ==========
include_once '../../shared/head.php';
include_once '../../shared/navbar.php';
$count = 0;

if(isset($_GET['show'])){
    $id = $_GET['show'];
    $select = "SELECT * FROM ordersdata where orderID = $id";
    $order = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($order);
}


?>


<div class="container col-md-8 my-5">
    <div class="row my-2">
        <div class="col-md-8">
            <h6> List One Order With View</h6>
        </div>
        <div class="col-md-4">
            <div class="d-grid">
                <a href="./create.php" class="float-end btn btn-info"> Create New </a>
            </div>
        </div>
    </div>
    <div class="card">

        <div id="print_div" class="card-body">
        
            <h6> product_name : <?= $row['product_name'] ?>  </h6>
            <hr>
            <h6> price : <?= $row['price'] ?>  </h6>
            <hr>
            <h6> quantity: <?= $row['quantity'] ?> </h6>
            <hr>
            <h6> delivery: <?= $row['delivery'] ?> </h6>
            <hr>
            <h6> tax:<?= $row['tax'] ?>  </h6>
            <hr>
            <h4 class="text-success">  Order Amount : <?= $row['amount'] ?> </h4>
            <hr>
            <h6> Customers : <?= $row['first_name'] ?> </h6>
            <hr>
            <h6> Customer email: <?= $row['email'] ?> </h6>
            <hr>

        </div>
        <a class="btn btn-info" href="./edit.php?edit=<?= $row['orderID'] ?>"><i class="  fa-solid fa-pen-to-square"></i> Edit </a>

        <a class="btn btn-danger" onclick="return confirm('are you Sure')" href="./list.php?delete=<?= $item['id'] ?>"><i class="  fa-solid fa-trash-can"> Delete </i></a>

        <button id="print" class="btn btn-success">Print </button>
    </div>
</div>

<script>
    let printBtn =document.getElementById("print");
    let print_div =document.getElementById("print_div");

    printBtn.addEventListener('click', function(){
        let printContent =print_div.innerHTML;
        let orginalData = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = orginalData;
    })
    
</script>
<?php
include_once '../../shared/script.php';

?>