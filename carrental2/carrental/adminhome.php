<?php 
include_once 'aheader.php'; 
include_once 'dbfun.php'; 
?>
<style>
    .card-body{
        background:linear-gradient(45deg,skyblue,lightgreen,green);
    }
    .card-footer{
        background-color: mediumpurple !important;
    }
    .card-footer a{
        color:white;
    }
</style>
<div class="container-fluid" style="min-height:88vh;">
    <h4 class="p-2" style="border-bottom: 2px solid green;">Admin Dashboard</h4>
    <div class="row">
        <div class="col-sm-3">
            <div class="card shadow m-2">
                <div class="card-body p-3">
                    <h5>Registered Users</h5>
                    <h5><?= countrecords("customers") ?></h5>
                </div>
                <div class="card-footer">
                    <a href="users.php">View Details >></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card shadow m-2">
                <div class="card-body p-3">
                    <h5>Categories</h5>
                    <h5><?= countrecords("categories") ?></h5>
                </div>
                <div class="card-footer">
                    <a href="category.php">View Details >></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card shadow m-2">
                <div class="card-body p-3">
                    <h5>Car Variants</h5>
                    <h5><?= countrecords("variants") ?></h5>
                </div>
                <div class="card-footer">
                    <a href="variants.php">View Details >></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card shadow m-2">
                <div class="card-body p-3">
                    <h5>Cars</h5>
                    <h5><?= countrecords("cars") ?></h5>
                </div>
                <div class="card-footer">
                    <a href="cars.php">View Details >></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card shadow m-2">
                <div class="card-body p-3">
                    <h5>Drivers</h5>
                    <h5><?= countrecords("drivers") ?></h5>
                </div>
                <div class="card-footer">
                    <a href="drivers.php">View Details >></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card shadow m-2">
                <div class="card-body p-3">
                    <h5>New Bookings</h5>
                    <h5><?= countifrecords("bookings","status='Pending'") ?></h5>
                </div>
                <div class="card-footer">
                    <a href="bookings.php">View Details >></a>
                </div>
            </div>
        </div>

    </div>


</div>
<?php include_once 'afooter.php'; ?>