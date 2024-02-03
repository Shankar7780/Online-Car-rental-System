<?php include_once 'aheader.php';  ?>
<div class="container-fluid" style="min-height:88vh;">
    <h4 class="p-2" style="border-bottom: 2px solid green;">Payment Reports</h4>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Payment Date</th>
                <th>Booking Id</th>
                <th>Customer Name</th>
                <th>Remarks</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(allrecords("payments order by 1 desc") as $p )
            { 
                $userid=single("bookings","bid='{$p["booking_id"]}'")["customer_id"];
                $uname=single("customers","userid='$userid'")["uname"];
                ?>
                <tr>
                    <td><?= $p["pid"]?></td>
                    <td><?= date('d-M-Y', strtotime($p["pymtdate"])) ?></td>
                    <td><?= $p["booking_id"] ?></td>
                    <td><?= $uname ?></td>
                    <td><?= $p["remarks"] ?></td>
                    <td>&#8377; <?=$p["amount"] ?></td>
                </tr>
           <?php } ?>
        </tbody>
    </table>
</div>
<?php include_once 'afooter.php';  ?>

