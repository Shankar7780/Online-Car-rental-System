<?php include_once 'aheader.php'; ?>
<h4 class="p-2">Add New Car Variant</h4>

<form enctype="multipart/form-data" method="POST" action="savevariant.php">
    <div class="card p-2 m-2 shadow">
        <h5 class="p-2" style="border-bottom: 2px solid green;">Car Details</h5>
        <div class="form-row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Car Name *</label>
                    <input type="text" name="title" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Category *</label>
                    <select name="cid" required class="form-control">
                        <option value="">Select Category</option>
                        <?php foreach(allrecords("categories") as $c)
                        { ?>
                        <option value="<?= $c["id"] ?>"><?= $c["catname"] ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Fuel Type</label>
                    <select name="fueltype" required class="form-control">
                        <option value="">Select Fuel Type</option>                        
                        <option>Petrol</option>
                        <option>Diesel</option>
                        <option>CNG</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Price per day</label>
                    <input type="text" name="price" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Seat Capacity</label>
                    <input type="text" name="capacity" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="card p-2 m-2 shadow">
        <h5 class="p-2" style="border-bottom: 2px solid green;">Upload Photo</h5>
        <div class="form-row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" id="photo" name="pic" accept=".jpg,.png" class="form-control form-contorl-file">
                </div>
            </div>
            <div class="col-sm-4">
                <img src="images/noimage.png" id="pic" class="img-thumbnail float-right" style="height:100px;width:100px;">
            </div>
        </div>
    </div>
    <div class="card p-2 m-2 shadow">
        <h5 class="p-2" style="border-bottom: 2px solid green;">Car Features</h5>
        <div class="row">
            <div class="col-sm-3">
                <input type="checkbox" name="ac" id="ac" value="1" class="form-control-check">
                <label for="ac">Air Condition</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="powerdoorlock" value="1" id="powerdoorlock" class="form-control-check">
                <label for="powerdoorlock">Power Door Lock</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="powersteering" value="1" id="powersteering" class="form-control-check">
                <label for="powersteering">Power Steering</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="airbag" id="airbag" value="1" class="form-control-check">
                <label for="airbag">Air Bags</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="powerwindows" value="1" id="powerwindows" class="form-control-check">
                <label for="powerwindows">Power Windows</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="cdplayer" id="cdplayer" value="1" class="form-control-check">
                <label for="cdplayer">CD Player</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="centrallock" value="1" id="centrallock" class="form-control-check">
                <label for="centrallock">Central Lock</label>
            </div>
            <div class="col-sm-3">
                <input type="checkbox" name="gps" id="gps" value="1" class="form-control-check">
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