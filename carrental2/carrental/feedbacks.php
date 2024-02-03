<?php include_once 'aheader.php';  ?>
<style>
    .checked {
        color: orange;
    }
</style>
<div class="container-fluid" style="min-height:88vh">
    <h4 class="p-2" style="border-bottom: 2px solid green;">Feedbacks</h4>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Feedback</th>
                <th>Ratings</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach (allrecords("feedbacks order by id desc") as $f)
            { 
                $uname=single("customers","userid='{$f["customer_id"]}'")["uname"];
                ?>
                <tr>
                    <td><?= $f["id"]?></td>
                    <td><?= $uname ?></td>
                    <td><?= $f["feedback"] ?></td>
                    <td>
                        <?php for($i = 1; $i <= 5; $i++) { 
                            if ($i <= $f["ratings"])
                            { ?>
                                <span class="fa fa-star checked"></span>
                           <?php  }
                            else
                            { ?>
                                <span class="fa fa-star"></span>
                            <?php }
                        } ?>
                    </td>
                    <td><?=date('d-M-Y', strtotime($f["createdon"])) ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php include_once 'afooter.php';  ?>