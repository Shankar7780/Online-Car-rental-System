<?php include_once 'aheader.php'; ?>
<h4 class="p-2">Add New Driver</h4>

<form enctype="multipart/form-data" method="POST" action="savedriver.php">
    <div class="card p-2 m-2 shadow">
        <h5 class="p-2" style="border-bottom: 2px solid green;">Driver Details</h5>
        <div class="form-row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Driver Name *</label>
                    <input type="text" name="dname" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Gender *</label>
                    <select name="gender" required class="form-control">
                        <option value="">Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Marital Status *</label>
                    <select name="mstatus" required class="form-control">
                        <option value="">Select Marital Status</option>
                        <option>Married</option>
                        <option>Single</option>
                        <option>Divorced</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Address *</label>
                    <input type="text" name="address" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Phone no *</label>
                    <input type="text" name="phone" placeholder="Mobile no" maxlength="10" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Adhar No *</label>
                    <input type="text" name="adhar" maxlength="12" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Date of Birth *</label>
                    <input type="date" name="dob" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Driving License No *</label>
                    <input type="text" name="licno" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Experience (in years)*</label>
                    <input type="text" name="exp" placeholder="0 for fresher" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="pwd" placeholder="Password for login" required class="form-control">
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