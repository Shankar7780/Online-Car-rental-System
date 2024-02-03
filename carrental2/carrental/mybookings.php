<?php include_once 'header.php'; ?>
<div class="container-fluid" style="min-height:80vh">
    <div class="card shadow mt-2">
        <div class="card-body">
            <h5 class="p-2" style="border-bottom: 2px solid green;">My Bookings</h5>            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Booking Id</th>
                        <th>Car Name</th>
                        <th>Posted Date</th>
                        <th>Price</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Pickup Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $userid=$_SESSION["userid"];
                    foreach(findall("bookings", "customer_id='$userid'") as $b) { 
                        extract($b);
                        $title=single("variants","cid='$variant_id'")["title"];
                        $price=single("variants","cid='$variant_id'")["price"];                        
                        ?>
                        <tr>
                            <td><?= $bid ?></td>
                            <td><?= $title ?></td>
                            <td><?= date('d-M-Y', strtotime($bookingdate)) ?></td>
                            <td>&#8377; <?= $price ?>/day</td>
                            <td><?= date('d-M-Y', strtotime($fromdate)) ?></td>
                            <td><?= date('d-M-Y', strtotime($todate)) ?></td>
                            <td><?= $pickuplocation ?></td>
                            <td><?= $status ?></td>
                            <td>
                                <?php if($status == "Pending")
                                { ?>
                                <a onclick="return confirm('Are you sure to cancel this booking')" href="cancelbk.php?bid=<?= $bid ?>" class="btn btn-outline-danger btn-sm">Cancel</a>
                                <?php }
                                else
                                { ?>
                                <a href="bookingdetails.php?bid=<?= $bid ?>" class="btn btn-outline-primary btn-sm">Details</a>
                               <?php  } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>