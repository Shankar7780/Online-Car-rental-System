<?php
include_once 'dbfun.php';

extract($_POST);

$photofile=$_FILES["pic"]["tmp_name"];
$filename = uniqid('Cat', true) . '.jpg';

move_uploaded_file($photofile, "cats/$filename");

$query="insert into categories(catname,description,photo) "
        . "values('$catname','$description','cats/$filename')";

executeDML($query);

success_msg("Category added successfully");

redirect("category.php");
