<?php
include_once 'dbfun.php';

extract($_POST);

$query="insert into journeystages(stage,bid,remarks,status) values('$stage','$bid','$remarks','$status')";

executeDML($query);

if($status=="complete"){
    $query="update bookings set status='Completed' where bid='$bid'";

    executeDML($query);
    $bk=single("bookings","bid=$bid");

    $query="update drivers set status='Available' where id='{$bk["driver_id"]}'";
    executeDML($query);

    $query="update cars set status='Available' where carno='{$bk["car_id"]}'";
    executeDML($query);

    redirect("makepayment.php?bid=$bid");
}
else{
    success_msg("Stage saved successfully");

    redirect("bookingdetails.php?bid=$bid");
}
