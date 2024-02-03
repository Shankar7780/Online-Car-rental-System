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

<style>
    ul.timeline {
        list-style-type: none;
        position: relative;
        padding-left: 1.5rem;
    }

    /* Timeline vertical line */
    ul.timeline:before {
        content: ' ';
        background: #fff;
        display: inline-block;
        position: absolute;
        left: 16px;
        width: 4px;
        height: 100%;
        z-index: 400;
        border-radius: 1rem;
    }

    li.timeline-item {
        margin: 20px 0;
    }

    /* Timeline item arrow */
    .timeline-arrow {
        border-top: 0.5rem solid transparent;
        border-right: 0.5rem solid rgb(250, 220, 49);
        border-bottom: 0.5rem solid transparent;
        display: block;
        position: absolute;
        left: 2rem;
    }

    /* Timeline item circle marker */
    li.timeline-item::before {
        content: ' ';
        background: rgb(250, 220, 49);
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid rgb(56, 182, 17);
        left: 11px;
        width: 14px;
        height: 14px;
        z-index: 400;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    
</style>
<div class="container-fluid" style="min-height:80vh;">
    <div class="form-row">
        <div class="col-sm-6">
            <div class="card shadow">

                <div class="card-body">
                    <img src="<?= $var["photo"] ?>" style="width:calc(100% - 300px)" class="img-thumbnail float-left">
                    <?php
                    if ($drivername != "NA") {
                        ?>
                        <img src="<?= $dr["photo"] ?>" style="width:200px;height:200px;" class="img-thumbnail float-right">
                    <?php } ?>
                    <table class="table table-sm">
                        <tr>
                            <th>Booking ID</th>
                            <th><?= $bid ?></th>                                
                            <th>Driver Name</th>
                            <th><?= $drivername ?></th>
                        </tr>
                        <tr>
                            <th>Car No</th>
                            <th><?= $car["carno"] ?></th>                           
                        </tr>
                        <tr>
                            <th>From Date</th>
                            <th><?= date('d-M-Y', strtotime($fromdate)) ?></th>
                            <?php
                            if ($drivername != "NA") {
                                ?>
                                <th>Driver Experience</th>
                                <th><?= $dr["exp"] ?> years</th>
                            <?php } ?>
                        </tr>
                        <tr>
                            <th>To Date</th>
                            <th><?= date('d-M-Y', strtotime($todate)) ?></th>
                            <?php
                            if ($drivername != "NA") {
                                ?>
                                <th>Driving License No</th>
                                <th><?= $dr["licno"] ?></th>
                            <?php } ?>
                        </tr>
                        <tr>
                            <th>Car Variant</th>
                            <th><?= $var["title"] ?></th>
                            <?php
                            if ($drivername != "NA") {
                                ?>
                                <th>Driver Gender</th>
                                <th><?= $dr["gender"]?></th>
                            <?php } ?>
                        </tr>
                        <tr>
                            <th>Price per Day</th>
                            <th>&#8377; <?= $var["price"]?> / day</th>
                            <?php
                            if ($drivername != "NA") {
                                ?>
                                <th>Driver Contact No</th>
                                <th><?= $dr["phone"] ?></th>
                            <?php } ?>
                        </tr>
                        <tr>
                            <th>Bill Amount</th>
                            <th>&#8377; <?= $billamount ?></th>
                            <th>Advance Paid </th>
                            <th>&#8377; <?= $advance ?></th>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="card shadow">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-6 p-2">
                            <h5 class="card-title">Journey Timeline</h5>
                            <!-- Timeline -->
                            <ul class="timeline">
                                    <?php foreach(findall("journeystages","bid='$bid' order by id desc") as $j)
                                    { ?>
                                    <li class="timeline-item bg-white rounded ml-3 px-3 py-2 shadow border border-warning">
                                        <div class="timeline-arrow"></div>
                                        <h2 class="h5 mb-0"><?= $j["stage"]?></h2><span class="small text-gray">
                                            <i class="fa fa-clock-o mr-1"></i><?=date('d-M-y h:i:s A', strtotime($j["stagetime"])) ?></span>
                                        <p class="text-small mt-2 mb-0 font-weight-light"><?= $j["remarks"]?></p>
                                    </li>
                                    <?php }?>
                            </ul>
                            <!-- End -->
                        </div>
                        <div class="col-sm-6">                            
                            <?php if ($status == "Completed")
                            { ?>
                            <div class="card shadow" style="min-height: 100%;">
                                <div class="card-body p-2">
                                    <h5 class="text-center p-2" style="border-bottom: 2px solid green;">Payment History</h5>                                    
                                        <?php foreach(findall("payments", "booking_id='$bid'") as $p)
                                        { ?>
                                        <div class="card shadow p-2 mb-2">
                                            <p class="p-1 m-0">Date : <?=$p["pymtdate"]?></p>
                                            <p class="m-0">Amount : &#8377; <?=$p["amount"]?></p>
                                            <p class="m-0 font-weight-bold"><?=$p["remarks"]?></p>
                                        </div>
                                        <?php } ?>
                                </div>
                            </div>
                            <?php }
                            else
                            { ?>
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="text-center">Journey Status</h5>
                                    <form method="POST" action="savestage.php">
                                        <input type="hidden" name="bid" value="<?= $bid ?>">
                                        <div class="form-group">
                                            <input list="stages" type="text" required name="stage" placeholder="Journey Stage" class="form-control form-control-sm">
                                            <datalist id="stages">
                                                <option>Car Arrive</option>
                                                <option>Journey Started</option>
                                                <option>Destination Reached</option>
                                                <option>Journey Complete</option>
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="4" placeholder="Remarks" name="remarks" class="form-control form-control-sm"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="status" name="status" value="complete" class="form-check-inline">
                                            <label for="status">Journey Complete</label>
                                        </div>
                                        <input type="submit" value="Save Stage" class="btn btn-primary btn-sm float-right">
                                    </form>
                                </div>
                            </div>
                            <?php } ?>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>