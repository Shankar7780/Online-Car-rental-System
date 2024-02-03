<?php

include_once 'dbfun.php';

extract($_POST);

if(isset($driver_id)){
    $query="update bookings set car_id='$carid',status='Confirmed',driver_id='$driver_id' where bid='$bid'";
}
else{
    $query="update bookings set car_id='$carid',status='Confirmed' where bid='$bid'";
}
executeDML($query);
$bk=single("bookings","bid=$bid");

$query="update drivers set status='Not Available' where id='{$bk["driver_id"]}'";
executeDML($query);

$query="update cars set status='Not Available' where carno='{$bk["car_id"]}'";
executeDML($query);

success_msg("Booking confirm successfully");

redirect("bookings.php");