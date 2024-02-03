<?php


include_once 'dbfun.php';

extract($_GET);

$query="update cars set deleted=1 where carno='$carno'";

executeDML($query);

success_msg("car deleted successfully");

redirect("cars.php");

