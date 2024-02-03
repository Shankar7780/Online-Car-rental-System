<?php
include_once 'dbfun.php';

extract($_POST);

$photofile=$_FILES["pic"]["tmp_name"];
$filename = uniqid('Driver', true) . '.jpg';
$userid='driver'.(countrecords("drivers")+1);
move_uploaded_file($photofile, "drivers/$filename");

$query="insert into drivers(dname,address,gender,licno,phone,adhar,dob,photo,exp,mstatus,userid) "
        . "values('$dname','$address','$gender','$licno','$phone','$adhar','$dob','drivers/$filename','$exp','$mstatus','$userid')";

executeDML($query);


$query="insert into users(userid,uname,pwd,role) values('$userid','$dname','$pwd','Driver')";

executeDML($query);

success_msg("Driver added successfully");

redirect("drivers.php");