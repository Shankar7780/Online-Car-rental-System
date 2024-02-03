<?php
include_once 'dbfun.php';

extract($_POST);

$ac=isset($ac)?1:0;
$gps=isset($gps)?1:0;
$airbag=isset($airbag)?1:0;
$cdplayer=isset($cdplayer)?1:0;
$centrallock=isset($centrallock)?1:0;
$powerdoorlock=isset($powerdoorlock)?1:0;
$powersteering=isset($powersteering)?1:0;
$powerwindows=isset($powerwindows)?1:0;
$query="update variants set title='$title',price='$price',fueltype='$fueltype',ac='$ac',"
        . "powerdoorlock='$powerdoorlock',powersteering='$powersteering',"
        . "airbag='$airbag',powerwindows='$powerwindows',cdplayer='$cdplayer',centrallock='$centrallock',"
        . "gps='$gps',capacity=$capacity,category_id='$cid' where cid=$vid";

executeDML($query);

success_msg("Variant updated successfully");

redirect("variants.php");

