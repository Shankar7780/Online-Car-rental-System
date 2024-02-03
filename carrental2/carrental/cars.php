<?php include_once 'aheader.php';  
$filter="All";
$carv_id="";
$carno="";
$modelyear="";
if(isset($_GET["q"])){
    $filter=$_GET["q"];
}
if(isset($_GET["carno"])){
    $carno=$_GET["carno"];
    $car=single("cars","carno='$carno'");
    $modelyear=$car["modelyear"];
    $carv_id=$car["carv_id"];
}
?>
<div class="row">
    <div class="col-sm-8">
        <div class="form-inline float-right mt-1 mr-2">
            <label class="mr-2">Filter</label>
            <select id="filter" class="form-control form-control-sm" style="width:200px;">
                <option <?= $filter == "All" ? "selected" : "" ?> value="All">All Cars</option>
                <option <?= $filter == "Avail" ? "selected" : "" ?> value="Avail">Available</option>
                <option <?= $filter == "NA" ? "selected" : "" ?> value="NA">Not Available</option>
            </select>
        </div>

        <h4 class="p-2 float-left">Cars</h4>

        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Car No</th>
                    <th>Model Year</th>
                    <th>Variant</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data= findall("cars","deleted=0 order by createdon desc");
                if(isset($_GET["q"]) && $_GET["q"]!="All"){
                    $status=$_GET["q"]=="NA" ? "Not Available" : "Available";
                    $data= findall("cars", "deleted=0 and status='$status' order by createdon desc");
                }
                foreach($data as $c)
                { 
                    ?>
                <tr>
                    <td><?= $c["carno"] ?></td>
                    <td><?= $c["modelyear"] ?></td>
                    <td><?= single("variants","cid='{$c["carv_id"]}'")["title"] ?></td>
                    <td><?= $c["status"] ?></td>
                    <td>
                        <a onclick="return confirm('Are you sure to delete this brand ?')" 
                           href="delcar.php?carno=<?= $c["carno"] ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>Delete</a>
                        <a href="cars.php?carno=<?= $c["carno"] ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5>Car Details</h5>
                <form method="post" action="savecar.php">
                    <?php if(isset($_GET["carno"])) 
                    { ?>
                        <input type="hidden" name="update" value="1" />
                    <?php }?>
                    <div class="form-group">
                        <label>Select Variant</label>
                        <select required class="form-control" name="carv_id">
                            <option value="">-- Select Variant --</option>
                            <?php 
                            foreach(allrecords("variants") as $v) { 
                                extract($v); ?>                            
                                <option <?= $cid == $carv_id ? "selected" : "" ?> value="<?= $cid ?>"><?= $title ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Car No</label>
                        <input type="text" required <?= isset($_GET["carno"]) ? "readonly" :"" ?> class="form-control" value="<?= $carno ?>" name="carno">
                    </div>
                    <div class="form-group">
                        <label>Model Year</label>
                        <input type="text" required class="form-control" value="<?= $modelyear ?>" name="modelyear">
                    </div>

                    <input type="submit" class="btn btn-primary btn-sm" value="Save Car">
                    <a href="cars.php" class="btn btn-danger btn-sm">Cancel</a>
                </form>                
            </div>
        </div>
        
    </div>
</div>
<script>
    $("#filter").change(function () {
        let value = $(this).val();
        if (value != "All")
            location.href = "cars.php?q=" + value;
        else
            location.href = "cars.php";
    });
</script>
<?php include_once 'afooter.php';  ?>