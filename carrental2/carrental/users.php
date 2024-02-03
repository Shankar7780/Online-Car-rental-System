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
        </tr>
    </thead>
    <tbody>
        <?php 
        $counter=0;
        foreach(allrecords("customers") as $c) { ?>       
        <tr>
            <td><?= $c["userid"] ?></td>
            <td><?= $c["uname"]?></td>
            <td><?= $c["gender"]?></td>
            <td><?= $c["phone"]?></td>
            <td><?= $c["address"]?></td>           
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