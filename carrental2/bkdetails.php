<?php
include_once 'header.php';
$bid = $_GET["bid"];
$bk = single("bookings", "bid=$bid");
extract($bk);
$uname = single("customers", "userid='$customer_id'")["uname"];
$var = single("variants", "cid='$variant_id'");
$car = single("cars", "carno='$car_id'");
$dr = single("drivers", "id='$driver_id'");
$drivername = isset($dr) ? $dr["dname"] : "NA";
?>
<div class="container-fluid" style="min-height:80vh;">
    <div class="form-row">
        <div class="col-sm-9">
            <div class="card shadow my-2">
                <div class="card-body">
                    <h5 class="p-2 mb-2" style="border-bottom:2px solid green;">Booking Details</h5>
                    <div class="row">
                        <div class="col-sm-5">
                            <img src="<?= $var["photo"] ?>" class="img-thumbnail float-left">                    
                        </div>
                        <div class="col-sm-7">
                            <table class="table table-sm">
                        <tr>
                            <th>Booking ID</th>
                            <th><?= $bid ?></th>                                
                            
                        </tr>
                        <tr>
                            <th>Car No</th>
                            <th><?= $car["carno"] ?></th>                           
                        </tr>
                        <tr>
                            <th>From Date</th>
                            <th><?= date('d-M-Y', strtotime($fromdate)) ?></th>
                            
                        </tr>
                        <tr>
                            <th>To Date</th>
                            <th><?= date('d-M-Y', strtotime($todate)) ?></th>
                           
                        </tr>
                        <tr>
                            <th>Car Variant</th>
                            <th><?= $var["title"] ?></th>
                            
                        </tr>
                        <tr>
                            <th>Price per Day</th>
                            <th>&#8377; <?= $var["price"]?> / day</th>
                            
                        </tr>
                        <tr>
                            <th>Bill Amount</th>
                            <th>&#8377; <?= $billamount ?></th>
                        </tr>
                        <tr>
                            <th>Advance Paid </th>
                            <th>&#8377; <?= $advance ?></th>
                        </tr>
                    </table>
                        </div>
                    </div>
                    
                    
                </div>
            </div>

        </div>
        
    </div>
</div>

<?php include_once 'footer.php'; ?>