<?php
include_once 'dbfun.php';
$bid=$_GET["bid"];

$query="delete from payments where booking_id='$bid'";

executeDML($query);

$query="delete from bookings where bid='$bid'";

executeDML($query);

success_msg("Booking cancelled successfully");

redirect("mybookings.php");

