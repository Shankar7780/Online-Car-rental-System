<?php
header("Content-type:application/json");
include_once 'dbfun.php';
$from=$_GET["from"];
$to=$_GET["to"];
$data=alldatasql("select id,dname,exp,ratings from drivers where id not in(SELECT driver_id FROM leaves "
        . "where fromdate between '$from' and '$to') and status='Available'");

echo json_encode($data);



