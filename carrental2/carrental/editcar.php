<?php include_once 'aheader.php';
$vid=$_GET["vid"];
$v=single("variants","cid='$vid'");
extract($v);
?>
<h4 class="p-2">Edit Car Variant</h4>

<form method="POST" action="updatevariant.php">
    <input type="hidden" name="vid" value="<?= $vid ?>">
    <div class="card p-2 m-2 shadow">
        <h5 class="p-2" style="border-bottom: 2px solid green;">Car Details</h5>
        <div class="form-row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Car Name *</label>
                    <input type="text" name="title" value="<?= $title ?>" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Category *</label>
                    <select name="cid" required class="form-control">
                        <option value="">Select Category</option>
                        <?php foreach(allrecords("categories") as $c)
                        { ?>
                        <option <?= $c["id"]==$category_id ?"selected":""?> value="<?= $c["id"] ?>"><?= $c["catname"] ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Fuel Type</label>
                    <select name="fueltype" required class="form-control">
                        <option value="">Select Fuel Type</option>                        
                        <option <?= $fueltype=="Petrol" ?"selected":""?>>Petrol</option>
                        <option <?= $fueltype=="Diesel" ?"selected":""?>>Diesel</option>
                        <option <?= $fueltype=="CNG" ?"selected":""?>>CNG</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Price per day</label>
                    <input type="text" name="price" value="<?= $price ?>" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Seat Capacity</label>
                    <input type="text" name="capacity" value="<?= $capacity ?>" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Photo</label>
                    <img src="<?= $photo ?>" id="pic" class="img-thumbnail float-right" style="height:100px;width:100px;">
                </div>
            </div>
        </div>
    </div>
    
    <div class="card p-2 m-2 shadow">
        <h5 class="p-2" style="border-bottom: 2px solid green;">Car Features</h5>
        <div class="row">
            <div class="col-sm-3">
                <input type="checkbox" name="ac" id="ac" value="1" <?= $ac==1 ? "checked":"" ?> class="form-control-check">
                <label for="ac">Air Condition</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="powerdoorlock" value="1" <?= $powerdoorlock==1 ? "checked":"" ?> id="powerdoorlock" class="form-control-check">
                <label for="powerdoorlock">Power Door Lock</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="powersteering" value="1" <?= $powersteering==1 ? "checked":"" ?> id="powersteering" class="form-control-check">
                <label for="powersteering">Power Steering</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="airbag" id="airbag" <?= $airbag==1 ? "checked":"" ?> value="1" class="form-control-check">
                <label for="airbag">Air Bags</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="powerwindows" value="1" <?= $powerwindows==1 ? "checked":"" ?> id="powerwindows" class="form-control-check">
                <label for="powerwindows">Power Windows</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="cdplayer" id="cdplayer" <?= $cdplayer==1 ? "checked":"" ?> value="1" class="form-control-check">
                <label for="cdplayer">CD Player</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="centrallock" value="1" <?= $centrallock==1 ? "checked":"" ?> id="centrallock" class="form-control-check">
                <label for="centrallock">Central Lock</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="gps" id="gps" <?= $gps==1 ? "checked":"" ?> value="1" class="form-control-check">
                <label for="gps">GPS Location</label>
            </div>
        </div>
    </div>
    <input type="submit" value="Save Car" class="m-2 px-3 btn btn-primary">
</form>
<script>
photo.onchange = evt => {
  const [file] = photo.files
  if (file) {
    pic.src = URL.createObjectURL(file)
  }
}
</script>
<?php include_once 'afooter.php'; ?>