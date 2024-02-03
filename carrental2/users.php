<?php include_once 'aheader.php'; ?>
<h4 class="p-2" style="border-bottom: 2px solid green;">Customers</h4>
<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Driving License No</th>
            <th>Adhaar</th>
            <th>Verification</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $counter=0;
        foreach(allrecords("customers") as $c) { ?>       
         <tr>
        <td><?= $c["userid"] ?></td>
        <td><?= $c["uname"] ?></td>
        <td><?= $c["gender"] ?></td>
        <td><?= $c["phone"] ?></td>
        <td><?= $c["address"] ?></td>
        <td><?= $c["license"] ?></td>
        <td>
            <?php
            // Check if Aadhaar image exists
            if (!empty($c["adhaar"])) {
                echo '<a href="' . $c["adhaar"] . '" data-lightbox="aadhaar-image">';
                echo '<img src="' . $c["adhaar"] . '" width="100" height="100" alt="Aadhaar Image">';
                echo '</a>';
            } else {
                echo 'No Aadhaar image available';
            }
            ?>
        </td>
        
        <td>
            <?php
            // Check admin approval status
            if ($c["approval"] == "Pending") {
                echo '<form method="post" action="update_approval.php">';
                echo '<input type="hidden" name="userid" value="' . $c["userid"] . '">';
                echo '<input type="hidden" name="current_approval" value="Pending">';
                echo '<button type="submit" name="approve" value="Verified" class="btn btn-success btn-sm">Approve</button>';
                echo '</form>';
            } elseif ($c["approval"] == "Verified") {
                echo '<form method="post" action="update_approval.php">';
                echo '<input type="hidden" name="userid" value="' . $c["userid"] . '">';
                echo '<input type="hidden" name="current_approval" value="Verified">';
                echo '<button type="submit" name="approve" value="Pending" class="btn btn-warning btn-sm">Revert to Pending</button>';
                echo '</form>';
            } else {
                echo '<form method="post" action="update_approval.php">';
                echo '<input type="hidden" name="userid" value="' . $c["userid"] . '">';
                echo '<input type="hidden" name="current_approval" value="Verified">';
                echo '<button type="submit" name="approve" value="Verified" class="btn btn-primary btn-sm">Pending</button>';
                echo '</form>';
            }
            ?>
        </td>





           
        
    </tr>        
        <?php 
        $counter++;
        }?>
    </tbody>
</table>
<script>
    function showme(ctl) {
        var ttype = document.getElementById(ctl).type;
        document.getElementById(ctl).type = ttype == "text" ? "password" : "text";
    }
</script>
<?php include_once 'afooter.php'; ?>