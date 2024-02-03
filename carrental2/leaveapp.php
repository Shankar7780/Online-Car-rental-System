<?php
include_once 'aheader.php';
?>

<div class="row">
    <div class="col-sm-12">
        <h5 class="p-2 mb-2">Leaves</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Driver Name</th>
                    <th>Apply Date</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (allrecords("leaves order by id desc") as $l) {
                    extract($l);
                    $drivername=single("drivers","id=$driver_id")["dname"];
                    ?>
                    <tr>                        
                        <td><?= $id ?></td>                                     
                        <td><?= $drivername ?></td>                                     
                        <td><?= pretty_date($applydate) ?></td>                                     
                        <td><?= pretty_date($fromdate) ?></td>                                     
                        <td><?= pretty_date($todate) ?></td>                                     
                        <td><?= $reason ?></td>                                     
                        <td><?= $status ?></td>  
                        <td>
                            <?php if($status=="Pending") { ?>
                            <a href="approve.php?id=<?= $id ?>" class="btn btn-success btn-sm">Approve Leave</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>                
</div>
<?php include_once 'afooter.php'; ?>

