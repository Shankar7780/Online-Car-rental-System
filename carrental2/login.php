<?php include_once 'header.php'; ?>
<?php include_once 'msg.php'; ?>

<div class="clearfix"></div>
<div class="container" style="min-height: 79vh;">
    <div class="row">
        <div class="col-sm-4 mx-auto text-center" style="box-shadow:0 0 2px 1px white;">
            <div class="card shadow" style="margin-top: 50px;">
                <div class="card-body">
                    <img src="images/logo.png" style="width:200px;" class="my-2 rounded-circle" />
                    <form method="post" action="validate.php" autocomplete="off" class="mt-2">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger border-0 text-white">
                                        <i class="fas fa-user-tie"></i>
                                    </span>
                                </div>
                                <input type="text" required placeholder="User ID here" name="userid" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger border-0 text-white">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input required type="password" name="pwd" placeholder="Password here" class="form-control">
                            </div>
                        </div>
                        <input type="submit" value="Login" class="btn btn-danger btn-block" />
                    </form>
                    
                </div>
            </div>

        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>