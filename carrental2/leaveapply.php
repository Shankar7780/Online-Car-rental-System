<?php
include_once 'dbfun.php';
extract($_POST);

$query="insert into leaves(driver_id,fromdate,todate,applydate,reason) "
        . "values('$driver_id','$fromdate','$todate',date(now()),'$reason')";

executeDML($query);

success_msg("Leave applied successfully");

redirect("leaves.php");


