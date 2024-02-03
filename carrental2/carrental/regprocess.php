<?php
include_once 'dbfun.php';
$phone = $_GET['phone'];
extract($_POST);
$query="insert into customers(userid,uname,phone,gender,address) "
        . "values('$userid','$uname','$phone','$gender','$address')";
executeDML($query);

$query="insert into users(userid,uname,pwd,role) values('$userid','$uname','$pwd','Customer')";

executeDML($query);

success_msg("Registered successfully");

redirect('otp.php?phone=' . $phone);
