<?php 
include_once 'aheader.php'; 
?>
<div class="row">
    <div class="col-sm-8">
        <h4 class="p-2 float-left">Categories</h4>
        
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            foreach(allrecords("categories") as $r)
            {
                extract($r);
            ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $catname ?></td>
                    <td><?= $description ?></td>
                    <td><img src='<?= $photo ?>' style='width:80px'></td>
                    <td>
                        <a onclick="return confirm('Are you sure to delete this brand ?')" 
                           href="delcat.php?id=<?=$id?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>Delete</a>                        
                    </td>
                </tr>
             <?php   } ?>
             </tbody>
        </table>

    </div>
    <div class="col-sm-4">
        <form method="post" enctype="multipart/form-data" action="savecat.php">
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" value="" name="catname">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea rows="6" class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input type="file" accept=".jpg,.png" class="form-control-file" name="pic">
            </div>

            <input type="submit" class="btn btn-primary btn-sm" value="Save Category">
        </form>        
        </div>
    </div>
<?php include_once 'afooter.php'; ?>

