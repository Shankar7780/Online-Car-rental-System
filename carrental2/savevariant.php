<?php
include_once 'dbfun.php';

extract($_POST);

$photofile=$_FILES["pic"]["tmp_name"];
$filename = uniqid('Var', true) . '.jpg';

move_uploaded_file($photofile, "pics/$filename");
$ac=isset($ac)?1:0;
$gps=isset($gps)?1:0;
$airbag=isset($airbag)?1:0;
$cdplayer=isset($cdplayer)?1:0;
$centrallock=isset($centrallock)?1:0;
$powerdoorlock=isset($powerdoorlock)?1:0;
$powersteering=isset($powersteering)?1:0;
$powerwindows=isset($powerwindows)?1:0;
$query="insert into variants(title,price,fueltype,ac,powerdoorlock,powersteering,airbag,powerwindows,cdplayer,centrallock,gps,capacity,photo,category_id) "
        . "values('$title','$price','$fueltype','$ac','$powerdoorlock','$powersteering','$airbag','$powerwindows','$cdplayer','$centrallock','$gps',$capacity,'pics/$filename','$cid')";

executeDML($query);

success_msg("Variant added successfully");

redirect("variants.php");
