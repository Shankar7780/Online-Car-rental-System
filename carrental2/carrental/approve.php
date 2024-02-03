<?php
include_once 'dbfun.php';
$id=$_GET["id"];

$query="update leaves set status='Approved' where id='$id'";

executeDML($query);

success_msg("Leave approved successfully");
redirect('leaveapp.php');

