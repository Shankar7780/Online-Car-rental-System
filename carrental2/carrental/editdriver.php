<?php
include_once 'aheader.php';
$id = $_GET["id"];
$d = single("drivers", "id=$id");
extract($d);
?>
<h4 class="p-2">Add New Driver</h4>

<form method="POST" action="updatedriver.php">
    <input type="hidden" name="id" value="<?= $id ?>">
    <div class="card p-2 m-2 shadow">
        <h5 class="p-2" style="border-bottom: 2px solid green;">Driver Details</h5>
        <div class="form-row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Driver Name *</label>
                    <input type="text" name="dname" value="<?= $dname ?>" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Gender *</label>
                    <select name="gender" required class="form-control">
                        <option value="">Select Gender</option>
                        <option <?= $gender=="Male" ?"selected":"" ?>>Male</option>
                        <option <?= $gender=="Female" ?"selected":"" ?>>Female</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Marital Status *</label>
                    <select name="mstatus" required class="form-control">
                        <option value="">Select Marital Status</option>
                        <option <?= $mstatus=="Married" ?"selected":"" ?>>Married</option>
                        <option <?= $mstatus=="Single" ?"selected":"" ?>>Single</option>
                        <option <?= $mstatus=="Divorced" ?"selected":"" ?>>Divorced</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Address *</label>
                    <input type="text" value="<?= $address ?>" name="address" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Phone no *</label>
                    <input type="text" name="phone" value="<?= $phone ?>" placeholder="Mobile no" maxlength="10" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Adhar No *</label>
                    <input type="text" name="adhar" value="<?= $adhar ?>" maxlength="12" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Date of Birth *</label>
                    <input type="date" name="dob" value="<?= date('Y-m-d',strtotime($dob)) ?>" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Driving License No *</label>
                    <input type="text" name="licno" value="<?= $licno ?>" required class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Experience (in years)*</label>
                    <input type="text" name="exp" value="<?= $exp ?>" placeholder="0 for fresher" required class="form-control">
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
    <input type="submit" value="Save Car" class="m-2 px-3 btn btn-primary">
</form>
<?php include_once 'afooter.php'; ?>