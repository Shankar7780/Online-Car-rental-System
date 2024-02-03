<?php 
include_once 'aheader.php'; 
?>
<style>
    a.btn-primary {
        color: white !important;
    }
</style>
<a href="addcar.php" class="btn btn-primary btn-sm float-right">Add Car Variant</a>
<h5 class="p-2" style="border-bottom: 2px solid green;">Available Car Variants</h5>
<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th>Car ID</th>
            <th>Car Name</th>
            <th>Rental</th>
            <th>Capacity</th>
            <th>Fuel Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach(allrecords("variants") as $v) { 
            extract($v);       
?>        
        <tr>
            <td><?= $cid ?></td>
            <td>
                <img src="<?= $photo ?>" style='width:80px;float:left;margin-right: 10px;'>
                <div class="px-2">
                    <div class="font-weight-bold"><?= $title ?></div>
                Category: <?= single("categories","id=$category_id")["catname"] ?>
                </div>
            </td>
            <td><?= money($price) ?></td>
            <td><?= $capacity ?> seats</td>
            <td><?= $fueltype ?></td>
            <td><a href="editcar.php?vid=<?= $cid ?>" class="btn btn-success btn-sm">Edit Details</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php include_once 'afooter.php'; ?>
