<?php
include_once 'dbfun.php';

extract($_POST);
if(isset($update)){
    $query="update cars set modelyear='$modelyear',carv_id='$carv_id' where carno='$carno'";
}else{
    $query="insert into cars(carno,modelyear,carv_id) "
        . "values('$carno','$modelyear','$carv_id')";
}
executeDML($query);

success_msg("Car added successfully");

redirect("cars.php");

