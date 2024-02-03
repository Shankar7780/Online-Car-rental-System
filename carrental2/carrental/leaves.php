<?php 
include_once 'header.php'; 
$userid=$_SESSION["userid"];
$did=single("drivers","userid='$userid'")["id"];
?>
<div class="container-fluid">
    <div class="card shadow my-2" style="min-height: 78vh;">
        <div class="card-body">
            
            <div class="row">
                <div class="col-sm-8">
                     <h5 class="p-2 mb-2">Leaves</h5>
                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th>Apply Date</th>
                                 <th>From Date</th>
                                 <th>To Date</th>
                                 <th>Reason</th>
                                 <th>Status</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                             foreach(findall("leaves", "driver_id=$did order by id desc") as $l) {
                                 extract($l);
                             ?>
                             <tr>
                                 <td><?= $id ?></td>                                     
                                 <td><?= pretty_date($applydate) ?></td>                                     
                                 <td><?= pretty_date($fromdate) ?></td>                                     
                                 <td><?= pretty_date($todate) ?></td>                                     
                                 <td><?= $reason ?></td>                                     
                                 <td><?= $status ?></td>                                     
                             </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                </div>
                <div class="col-sm-4">
                    <h5 class="p-2">Apply for Leave</h5>
                    <form method="post" action="leaveapply.php">
                        <input type="hidden" name="driver_id" value="<?= $did ?>">
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="date" name="fromdate" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="date" name="todate" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label>Reason</label>
                            <input type="text" name="reason" class="form-control form-control-sm">
                        </div>
                        <input type="submit" value="Apply Leave" class="btn btn-primary btn-sm">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>

 