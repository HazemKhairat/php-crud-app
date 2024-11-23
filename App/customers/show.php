<?php
include_once '../../vendor/config.php';
// ============= Shared ==========
include_once '../../shared/head.php';
include_once '../../shared/navbar.php';
$count = 0;

if(isset($_GET['show'])){
    $id = $_GET['show'];
    $select = "SELECT * from  customers where id = $id";
    $customer_data = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($customer_data);
}


?>


<div class="container col-md-4 my-5">
    <div class="row my-2">
        <div class="col-md-8 mb-2">
            <h6> Customer Name : <?= $row['first_name'] . $row['last_name'] ?></h6>
        </div>
        <img src="./upload/<?=$row['Image'] ?>" alt="" class="img-top">
        <div class="col-md-12 mt-3">
            <div class="d-grid">
                <a href="./create.php" class="float-end btn btn-info"> Create New </a>
            </div>
        </div>
    </div>
    <div class="card">

        <div id="print_div" class="card-body">
            <h6> Email : <?= $row['email'] ?>  </h6>
            <hr>
            <h6> Gender: <?= $row['gender'] ?> </h6>
            <hr>
            <h6> Salary: <?= $row['salary'] ?> </h6>
        </div>
        <!-- <a class="btn btn-info" href="./edit.php?edit=<?= $row['orderID'] ?>"><i class="  fa-solid fa-pen-to-square"></i> Edit </a> -->

        <a class="btn btn-danger" onclick="return confirm('are you Sure')" href="./list.php?delete=<?= $item['id'] ?>"><i class="  fa-solid fa-trash-can"> Delete </i></a>

        <button id="print" class="btn btn-success"> Print </button>
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