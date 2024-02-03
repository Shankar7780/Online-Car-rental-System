<?php 
    include_once 'header.php'; 
 include_once 'msg.php';
?>
<div class="container" style="min-height: 79vh;">
    <div class="row">
        <div class="col-sm-8 mx-auto text-center" style="box-shadow:0 0 2px 1px white;">
            <div class="card shadow" style="margin-top: 50px;">
                <div class="card-body">
                    <img src="images/logo.png" style="width:150px;" class="my-2 rounded-circle" />
                    <form method="post" autocomplete="off" action="regprocess.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                                <i class="fas fa-user-tie"></i>
                                            </span>
                                        </div>
                                        <input type="text" pattern="[a-zA-Z ]+" required placeholder="User Name" name="uname" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                                <i class="fas fa-user-tie"></i>
                                            </span>
                                        </div>
                                        <input type="email" required placeholder="Email Id or User ID" name="userid" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                                <i class="fas fa-key"></i>
                                            </span>
                                        </div>
                                        <input type="password" required name="pwd" placeholder="Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                                <i class="fas fa-key"></i>
                                            </span>
                                        </div>
                                        <input type="password" required name="cpwd" placeholder="Repeat Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                            <i class="fas fa-file"></i>
                                            </span>
                                        </div>
                                        
                                        <input type="file" required name="adhaar" id="adhaar" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                                <i class="fas fa-user-tie"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="phone" pattern="[0-9]{10,10}" required placeholder="Phone Number" name="phone" class="form-control" maxlength="10">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                                <i class="fas fa-key"></i>
                                            </span>
                                        </div>
                                        <select required name="gender" class="form-control">
                                            <option value="">-- Select Gender --</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                                <i class="fas fa-home"></i>
                                            </span>
                                        </div>
                                        <textarea required rows="3" placeholder="Address" name="address" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="license" required placeholder="Driving License Number" name="license" class="form-control" maxlength="15">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Register" class="btn btn-success btn-block" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>