<?php
include_once 'aheader.php';
$bid = $_GET["bid"];
$bk = single("bookings", "bid=$bid");
extract($bk);
$uname = single("customers", "userid='$customer_id'")["uname"];
$var = single("variants", "cid='$variant_id'");
$from=date('Y-m-d',strtotime($fromdate));
$to=date('Y-m-d',strtotime($todate));

$dr = single("drivers", "id='$driver_id'");
$drivername = isset($dr) ? $dr["dname"] : "NA";
echo $from;
?>
<h4 class="p-2" style="border-bottom: 2px solid green;">Bookings</h4>
<div class="container-fluid">
    <div class="form-row">
        <div class="col-sm-6">
            <div class="card shadow">
                <img src="<?= $var["photo"] ?>" class="card-top-img">
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <th>Booking ID</th>
                            <th><?= $bid ?></th>
                            <th>Customer Name</th>
                            <th><?= $uname ?></th>
                        </tr>
                        <tr>
                            <th>From Date</th>
                            <th><?= date('d-M-Y', strtotime($fromdate)) ?></th>
                            <th>To Date</th>
                            <th><?= date('d-M-Y', strtotime($todate)) ?></th>
                        </tr>
                        <tr>
                            <th>Car Variant</th>
                            <th><?= $var["title"] ?></th>
                            <th>Price per Day</th>
                            <th><?= $var["price"] ?></th>
                        </tr>
                        <tr>
                            <th>Driver</th>
                            <th><?= $drivername ?></th>
                            <th>Booking Date</th>
                            <th><?= date('d-M-Y', strtotime($bookingdate)) ?></th>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-center">Booking Confirmation</h5>
                    <?php if($status=='Pending')
                    { ?>
                    <form method="POST" action="confirmbk.php">
                        <input type="hidden" name="bid" value="<?= $bid ?>">
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Select Car *</label>
                                    <select required class="form-control form-control-sm" name="carid">
                                        <option value="">-- Select Car --</option>
                                        <?php foreach(findall("cars", "status='Available' and carv_id='$variant_id'") as $c) 
                                            { ?>
                                            <option value="<?= $c["carno"] ?>"><?= $c["carno"] ?></option>
                                            <?php }?>
                                    </select>
                                    <?php if(!isset($da)) { ?>
                                    <label>Select Driver *</label>
                                    <select required class="form-control form-control-sm" name="driver_id">
                                        <option value="">-- Select Driver --</option>
                                        <?php 
                                        foreach(alldatasql("select * from drivers where id not in(SELECT driver_id FROM `leaves` where fromdate between '$from' and '$to') and status='Available'") as $d) { ?>
                                        <option value="<?= $d["id"] ?>">
                                            <?= $d["dname"] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <?php }?>
                                </div>
                            </div>                            
                        </div>
                        <input type="submit" value="Confirm Booking" class="btn btn-outline-success btn-sm float-right">                        
                    </form>
                    <?php } 
                    else
                    { 
                        $car=single("cars","carno='$car_id'");
                        ?>
                    <h4 class="text-success text-center p-2">Booking confirmed</h4>
                    <div class="form-row">                        
                        <div class="col-sm-8 p-3">
                            <h5>Car No : <?= $car["carno"] ?></h5>                            
                            <?php if ($drivername != "NA")
                            { ?>
                            <h5>Driver Name: <?= $drivername ?></h5>
                            <h5>Driver Experience : <?= $dr["exp"]?> years</h5>
                            <h5>Driver License : <?= $dr["licno"] ?></h5>
                            <?php }?>
                        </div>
                    </div>
                    <div class="card shadow" style="min-height: 100%;">
                        <div class="card-body p-2">
                            <h5 class="text-center p-2" style="border-bottom: 2px solid green;">Payment History</h5>
                            <?php foreach(findall("payments", "booking_id='$bid'") as $b) { ?>                            
                            <div class="card shadow p-2 mb-2">
                                <p class="p-1 m-0">Date : <?= date('d-M-Y', strtotime($b["pymtdate"])) ?></p>
                                <p class="m-0">Amount : &#8377; <?= $b["amount"]?></p>
                                <p class="m-0 font-weight-bold"><?=$b["remarks"]?></p>
                            </div>
                           <?php }?>
                        </div>
                    </div>
                   <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'afooter.php'; ?>