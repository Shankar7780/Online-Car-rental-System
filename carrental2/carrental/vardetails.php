<?php include_once 'header.php'; 
$vid=$_GET["vid"];
$car= single("variants", "cid=$vid");
extract($car);
$catname=single("categories","id='$category_id'")["catname"];
$discount="no";
$dprice=$price;
if(is_logged_in()){
    $userid=$_SESSION["userid"];
    $discount= countifrecords("bookings", "customer_id='$userid'")>0 ? "yes":"no";
    if($discount==="yes"){
        $dprice=$price-($price*10)/100;
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card m-2">
                <div class="card-header text-center">
                    <?= $title ?> (<?= $catname ?>)
                </div>
                <img style="height:380px;" src="<?= $photo ?>" class="card-top-img">
                <div class="card-footer">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Car Title</th>
                                <th><?= $title ?></th>
                                <th>Fuel Type</th>
                                <th><?= $fueltype ?></th>
                            </tr>
                            <tr>
                                <th>Price per day</th>
                                <th>&#8377; <?= $price ?>/day</th>
                                <th>Seats/Capacity</th>
                                <th><?= $capacity ?> seats</th>
                            </tr>
                            <tr>
                                
                            </tr>
                            <tr>
                                <th colspan="4">Features</th>
                            </tr>
                            <tr>
                                <th>Air Condition</th>
                                <th><?= $ac==1 ? "Yes":"No" ?></th>
                                <th>Air Bags</th>
                                <th><?= $airbag==1 ? "Yes":"No" ?></th>
                            </tr>
                            <tr>
                                <th>Power Door Lock</th>
                                <th><?= $powerdoorlock ? "Yes":"No" ?></th>
                                <th>Power Steering</th>
                                <th><?= $powersteering ? "Yes":"No" ?></th>
                            </tr>
                            <tr>
                                <th>Power Windows</th>
                                <th><?= $powerwindows ? "Yes":"No" ?></th>
                                <th>Central Lock</th>
                                <th><?= $centrallock ? "Yes":"No" ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <?php if(is_logged_in())
            { ?>
                <h4 class="p-2" style="border-bottom: 2px solid green;">Book Now 
                <?= $discount=="yes" ? " ( Discount Applied 10% )" : ""?>
                </h4>
                <form method="POST" action="savebooking.php">
                    <input type="hidden" name="cid" value="<?= $vid ?>">
                    <input type="hidden" id="discount" value="<?= $discount ?>">
                    <div class="card shadow mb-2">
                        <div class="card-body">
                            <h5 style="border-bottom: 2px solid green;">Booking Details</h5>
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" id="fromdate" name="fromdate" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" id="todate" name="todate" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="hidden" id="price" value="<?= $dprice ?>">
                                        <input type="text" required id="totalprice" readonly name="billamount" value="<?= $dprice ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pickup Location</label>
                                        <input type="text" required name="pickuplocation" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Message (Optional)</label>
                                        <input type="text" required name="message" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Booking Money</label>
                                        <input type="number" id="advance" min="1" required name="advance" max="<?= $dprice ?>" placeholder="Advance Amount" value="" class="form-control">
                                    </div>
                                </div>                                
                                <div class="col-sm-6" id="bdriver">
                                    <label>Select Driver</label>
                                    <select class="form-control" id="drivers" name="driver_id">
                                        <option value="">Any Driver</option>                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-2">
                        <div class="card-body">
                            <h5 style="border-bottom: 2px solid green;">Payment Details</h5>
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Card Number</label>
                                        <input type="text" required name="cardno" pattern="[0-9]{16,16}" maxlength="16" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name on Card</label>
                                        <input type="text" required name="nameoncard" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>CVV</label>
                                        <input type="text" required maxlength="3" pattern="[0-9]{3,3}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Expiry Date</label>
                                        <input type="month" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Book Now" class="btn btn-primary">                                        
                </form>               
            <?php }
            else
            { ?>
                <h5 class="p-2 mt-4">Please <a href="login.php">login</a> or <a href="register.php">register</a> to book car</h5>
           <?php  } ?>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
    <script>
        document.querySelector("#todate").valueAsDate = new Date();
        document.querySelector("#fromdate").valueAsDate = new Date();
        function finddrivers(){
            let from=$("#fromdate").val(); 
            let to=$("#todate").val(); 
             $.ajax({
                url:'availdrivers.php',
                data:{'from':from,'to':to},
                success:function(resp){
                     console.log(resp);
                     $("#drivers").empty();
                     $("#drivers").append("<option value=''>Any Driver</option>");
                     for(let dd of resp){
                         let rat=dd.ratings==null ? "NA" : dd.ratings+" stars";
                         $("#drivers").append("<option value='"+dd.id+"'>"+dd.dname+" | Ratings : "+rat+"</option>");
                     }
                }               
             });
        }
        $(function () {
            finddrivers();
            $("#todate").change(function () {
                let to = new Date($(this).val());
                let from = new Date($("#fromdate").val());
                let days = to.getDate() - from.getDate() + 1;
                let discount=$("#discount").val();

                let withdriver = $("#withdriver").is(":checked");
                if (days > 0) {
                    let price = $("#price").val();
                    let amount = 0;
                    console.log(withdriver);
                    if (withdriver) {
                        amount = (price * days) + (1000 * days); 
                        if(discount==="yes"){
                            amount=amount-(amount*10)/100;
                        }
                    } else {
                        amount = price * days;
                    }
                    $("#totalprice").val(amount);
                    $("#advance").attr({ "max": amount });
                } else {
                    $("#totalprice").val("Invalid date");
                }
                finddrivers();
            });

            $("#withdriver").change(function () {
                if (this.checked) {
                    $("#bdriver").css({"display":"block"});
                    let to = new Date($("#todate").val());
                    let from = new Date($("#fromdate").val());
                    let days = to.getDate() - from.getDate() + 1;
                    let discount=$("#discount").val();
                    console.log();
                    if (days > 0) {
                        let price = $("#price").val();
                        let amount = (price * days) + (1000 * days);
                        if(discount=="yes"){
                            amount=amount-(amount*10)/100;
                        }
                        $("#totalprice").val(amount);
                        $("#advance").attr({ "max": amount });
                    } else {
                        $("#totalprice").val("Invalid date");
                    }
                }
                else {
                    $("#bdriver").css({"display":"none"});
                    let to = new Date($("#todate").val());
                    let from = new Date($("#fromdate").val());
                    let days = to.getDate() - from.getDate() + 1;
                    let discount=$("#discount").val();
                    console.log(days);
                    if (days > 0) {
                        let price = $("#price").val();
                        let amount = price * days;
                        if(discount=="yes"){
                            amount=amount-(amount*10)/100;
                        }
                        $("#totalprice").val(amount);
                        $("#advance").attr({ "max": amount });
                    } else {
                        $("#totalprice").val("Invalid date");
                    }
                }
            });
        });
    </script>
<?php include_once 'footer.php'; ?>