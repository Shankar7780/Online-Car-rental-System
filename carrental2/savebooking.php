<?php
include_once 'dbfun.php';

extract($_POST);
if($withdriver==""){
    $query="insert into bookings(advance,fromdate,todate,message,pickuplocation,billamount,driver_id,customer_id,variant_id) "
        . "values('$advance','$fromdate','$todate','$message','$pickuplocation','$billamount',null,'{$_SESSION["userid"]}','$cid')";
}else{
$query="insert into bookings(advance,fromdate,todate,message,pickuplocation,billamount,driver_id,customer_id,variant_id) "
        . "values('$advance','$fromdate','$todate','$message','$pickuplocation','$billamount','$driver_id','{$_SESSION["userid"]}','$cid')";
}
executeDML($query);
$complete=$billamount==$advance ? 1 : 0;
$bid= singledata("SELECT max(bid) as id from bookings")["id"];
$query="insert into payments(cardno,remarks,amount,booking_id,nameoncard,complete) "
        . "values('$cardno','New Booking money','$advance','$bid','$nameoncard',$complete)";

executeDML($query);

success_msg("Booking successfully");

redirect("mybookings.php");

