<?php include_once 'aheader.php';  ?>

<style>
    a.btn-primary {
        color: white !important;
    }
    .checked {
        color: orange;
    }
</style>
<a href="adddriver.php" class="btn btn-primary btn-sm float-right">Add New Driver</a>
<h5 class="p-2" style="border-bottom: 2px solid green;">Available Drivers</h5>
<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th style="width:100px;">Driver ID</th>
            <th>Personal Details</th>            
            <th>Driving Details</th>
            <th>Login Details</th>            
            <th>Status</th>  
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach(allrecords("drivers") as $d)  { 
            $pwd=single("users","userid='{$d["userid"]}'")["pwd"];
            ?>        
        <tr>
            <td><?= $d["id"] ?></td>
            <td>
                <img src="<?= $d["photo"] ?>" style='width:90px;height:100px;float:left;margin-right: 10px;'> 
                <div>
                    Name: <span class="font-weight-bold"><?= $d["dname"] ?></span><br>
                City: <?= $d["address"] ?><br>
                Phone: <?= $d["phone"] ?><br>
                Gender: <?= $d["gender"] ?>
                </div>
            </td>            
            <td>
                License: <?= $d["licno"]?><br>
                Experience: <?= $d["exp"]?> years<br>
                Ratings: <?php 
            if(isset($d["ratings"])){
            for($i = 1; $i <= 5; $i++) { 
                if ($i <= $d["ratings"])
                { ?>
                    <span class="fa fa-star checked"></span>
               <?php  }
                else
                { ?>
                    <span class="fa fa-star"></span>
                <?php }
            } }
            else{
                echo "NA";
            }
?>
            </td>
            <td>
                User ID: <?= $d["userid"] ?><br>
                Password: <?= $pwd ?>
            </td>
            <td><?= $d["status"]?></td>
            <td><a href="editdriver.php?id=<?= $d["id"] ?>" class="btn btn-success btn-sm">Edit Details</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include_once 'aheader.php';  ?>