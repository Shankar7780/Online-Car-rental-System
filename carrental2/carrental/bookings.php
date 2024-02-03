<?php include_once 'aheader.php'; ?>
<h4 class="p-2">Bookings</h4>
<div class="container-fluid">
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking Id</th>
                    <th>Car Variant</th>
                    <th>Booking Date</th>                    
                    <th>User Name</th>
                    <th>User Contact</th>
                    <th>Advance</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Driver</th>
                    <th>Driver Contact</th>
                    <th>Status</th>
                    <th>Cancel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (allrecords("bookings order by bid asc") as $b) {
                    extract($b);
                    $title = single("variants", "cid='$variant_id'")["title"];
                    $price = single("variants", "cid='$variant_id'")["price"];
                    $dr = single("drivers", "id='$driver_id'");
                    $drivername=isset($dr) ? $dr["dname"] : "NA";
                    $uname=single("customers","userid='$customer_id'")["uname"];
                    $contact=single("customers","userid='$customer_id'")["phone"];
                    $drivercontact=isset($dr) ? $dr["phone"] : "NA";
                    ?>
                    <tr>
                        <td><?= $bid ?></td>
                        <td><?= $title ?></td>
                        <td><?= date('d-M-Y', strtotime($bookingdate)) ?></td>
                        <td><?= $uname ?></td>
                        <td><?= $contact ?></td>
                        <td>&#8377; <?= $advance ?></td>
                        <td><?= date('d-M-Y', strtotime($fromdate)) ?></td>
                        <td><?= date('d-M-Y', strtotime($todate)) ?></td>
                        <td><?= $drivername ?></td>
                        <td><?= $drivercontact ?></td>
                        <td><?= $status ?></td>
                        <td><a href="bdetails.php?bid=<?= $bid ?>" class="btn btn-primary btn-sm">Details</a>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>
<?php include_once 'afooter.php'; ?>