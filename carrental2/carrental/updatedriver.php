<?php

include_once 'dbfun.php';

extract($_POST);

$query="update drivers set dname='$dname',address='$address',gender='$gender',licno='$licno',"
        . "phone='$phone',adhar='$adhar',dob='$dob',exp='$exp',mstatus='$mstatus' where id='$id'";        

executeDML($query);

success_msg("Driver updated successfully");

redirect("drivers.php");

