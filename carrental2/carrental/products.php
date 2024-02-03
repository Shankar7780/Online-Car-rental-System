<?php include_once 'header.php'; ?>
<style>
.list-group-item{
    padding:5px;
}
</style>
<?php
if(!isset($_SESSION["filter"])){
    $_SESSION["filter"]=["size"=>"all","fuel"=>"all","catid"=>"all"];
}
$condition="1=1";                            
if(isset($_GET["catid"])){
    $_SESSION["filter"]["catid"]=$_GET["catid"];                                
}
if(isset($_GET["size"])){
    $_SESSION["filter"]["size"]=$_GET["size"];
    
}
if(isset($_GET["fuel"])){
    $_SESSION["filter"]["fuel"]=$_GET["fuel"];                                
}
?>
<div class="container-fluid products" style="margin-top:0;min-height:80vh;">
    <div class="row">
        <div class="col-sm-2 p-0">
            <h5 class="p-2 text-center">Seat Capacity</h5>
            <div class="list-group">
                <a href="products.php?size=all" class="list-group-item list-group-item-action <?= $_SESSION["filter"]["size"]=="all" ? "active":"" ?>">Any Size</a>
                <a href="products.php?size=mid" class="list-group-item list-group-item-action <?= $_SESSION["filter"]["size"]=="mid" ? "active":"" ?>">Mid Size (4-5 seats)</a>
                <a href="products.php?size=full" class="list-group-item list-group-item-action <?= $_SESSION["filter"]["size"]=="full" ? "active":"" ?>">Full Size (6-7 seats)</a>
            </div>
            <h5 class="p-2 text-center">Fuel Types</h5>
            <div class="list-group">
                <a href="products.php?fuel=all" class="list-group-item list-group-item-action <?= $_SESSION["filter"]["fuel"]=="all" ? "active":"" ?>">Any Type</a>
                <a href="products.php?fuel=Petrol" class="list-group-item list-group-item-action <?= $_SESSION["filter"]["fuel"]=="Petrol" ? "active":"" ?>">Petrol</a>
                <a href="products.php?fuel=Diesel" class="list-group-item list-group-item-action <?= $_SESSION["filter"]["fuel"]=="Diesel" ? "active":"" ?>">Diesel</a>
                <a href="products.php?fuel=CNG" class="list-group-item list-group-item-action <?= $_SESSION["filter"]["fuel"]=="CNG" ? "active":"" ?>">CNG</a>
            </div>
            <h5 class="p-2 text-center">Categories</h5>
            <div class="list-group">
                <a href="products.php?catid=all" class="list-group-item list-group-item-action <?= $_SESSION["filter"]["catid"]=="all" ? "active":"" ?>">All Categories</a>
                <?php foreach(allrecords("categories") as $c)
                { ?>
                <a href="products.php?catid=<?= $c["id"] ?>" class="list-group-item list-group-item-action <?= $_SESSION["filter"]["catid"]==$c["id"] ? "active":"" ?>"><?= $c["catname"] ?></a>
                <?php } ?>
            </div>
            
        </div>
        <div class="col-sm-10 p-0">
            <div class="card shadow">
                <div class="card-body p-1">
                    <div class="container-fluid py-2">
                        <div class="row">
                            <?php 
                            
                            if($_SESSION["filter"]["catid"]!="all"){
                                $cid=$_SESSION["filter"]["catid"];
                                $condition.= " and category_id=$cid";
                            }
                            if($_SESSION["filter"]["size"]!="all"){
                                $size=$_SESSION["filter"]["size"];
                                $condition.= $size==="mid" ? " and capacity<=5" : " and capacity>5";
                            }
                            if($_SESSION["filter"]["fuel"]!="all"){
                                $fuel=$_SESSION["filter"]["fuel"];
                                $condition.=" and fueltype='$fuel'";
                            }
                            $data= findall("variants",$condition);
                            foreach($data as $v) 
                            { 
                                $cat=single("categories","id='{$v["category_id"]}'");
                                ?>
                            <div class="col-md-4">
                                <div class="card shadow mt-2">
                                    <div class="card-header bg-success text-white font-weight-bold p-2">
                                        <div class="form-row">
                                            <div class="col-sm-3"><?= $v["fueltype"] ?></div>
                                            <div class="col-sm-4 text-center"><?= $v["capacity"]?> seats</div>
                                            <div class="col-sm-5 text-right">2020 Model</div>
                                        </div>
                                    </div>
                                    <a href="vardetails.php?vid=<?= $v["cid"] ?>"><img style="height:200px;" src="<?= $v["photo"] ?>" class="card-top-img img-thumbnail mx-auto d-block p-2"></a>
                                    <div class="card-footer bg-dark text-white font-weight-bold p-2">
                                        <div class="form-row">
                                            <div class="col-sm-7"><?= $cat["catname"] ?><br> <?= $v["title"] ?></div>
                                            <div class="col-sm-5 text-right">&#8377; <?= $v["price"] ?>/day</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>