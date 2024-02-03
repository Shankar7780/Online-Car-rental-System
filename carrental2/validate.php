<?php

include_once 'dbfun.php';
extract($_POST);

$row = single("users","userid='$userid' and pwd='$pwd'");

if (isset($row)) {
    $_SESSION["userid"] = $row["userid"];
    $_SESSION["uname"] = $row["uname"];
    $_SESSION["role"]=$row["role"];
    
    if($row["role"]=="Admin"){
        redirect("adminhome.php");
    }
    else{
        redirect("index.php");
    }
} else {
    $_SESSION["error"] = "Invalid username or password";
    redirect("login.php");
}
