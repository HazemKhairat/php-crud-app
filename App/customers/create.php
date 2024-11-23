<?php
// ============= Vendor ==========
include_once '../../vendor/config.php';
// ============= Shared ==========
include_once '../../shared/head.php';
include_once '../../shared/navbar.php';

$message = null;
if (isset($_POST['send'])) {
    $f_name = $_POST['f_name'];
    $s_name = $_POST['s_name'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $gender = $_POST['gender'];
// =========== Image Code ========
    $imageName = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$imageName";
    move_uploaded_file($tmp_name, $location);
// =========== Query =============
$insert = "INSERT into customers values('null', '$f_name', '$s_name', '$email', '$gender', '$salary', '$imageName')";
$run = mysqli_query($conn, $insert);
$message = "Insertion Done Successfuly";
}
?>


<div class="container col-md-8 my-5">
    <div class="row my-2">
        <div class="col-md-8">
            <h6> Create Customer </h6>
        </div>
        <div class="col-md-4">
            <div class="d-grid">
                <a href="./list.php" class="float-end btn btn-info"><i class="fa-solid fa-circle-left"></i> Back </a>
            </div>
        </div>
    </div>

    <div class="card">
        <?php if ($message != null): ?>
            <div class="alert alert-success">
                <?= $message ?>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row  ">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" placeholder="First Name" class="form-control" name="f_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" placeholder="Last Name" class="form-control" name="s_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" placeholder="Email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="file" accept="image/*" placeholder="Image" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" placeholder="Salary" class="form-control" name="salary">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Male
                            <input type="radio" value="male" name="gender">
                            Femal
                            <input type="radio" value="femal" name="gender"> 
                        </div>
                    </div>
                </div>

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