<?php

include_once 'dbfun.php';

extract($_POST);

$query="insert into payments(cardno,remarks,amount,booking_id,nameoncard,complete) "
        . "values('$cardno','Payment Completed','$amount','$bid','$nameoncard','1')";

executeDML($query);
executeDML($query);
$bk=single("bookings","bid=$bid");

$userid=$_SESSION["userid"];
$query="insert into feedbacks(ratings,feedback,customer_id) "
        . "values('$rating','$feedback','$userid')";

executeDML($query);

$query="update drivers set ratings='$drating' where id='{$bk["driver_id"]}'";

executeDML($query);

success_msg("Payment made successfully");

redirect("mybookings.php");

