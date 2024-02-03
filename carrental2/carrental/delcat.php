<?php

include_once 'dbfun.php';

extract($_GET);

$query="delete from categories where id='$id'";

executeDML($query);

success_msg("Category deleted successfully");

redirect("category.php");

