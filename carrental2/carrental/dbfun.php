<?php
include_once 'dbcon.php';
ob_start();
if (!isset($_SESSION)) {
    session_start();
}

function connect() {
    $link = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die("Error " . mysqli_connect_error());
    return $link;
}

function singledata($query) {
    $link = connect();
    $result = mysqli_query($link, $query) or die("Error " . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    mysqli_close($link);
    return $row;
}

function alldatasql($query) {
    $link = connect();
    $result = mysqli_query($link, $query) or die("Error " . mysqli_error($link));
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_close($link);
    return $rows;
}

function allrecords($table) {
    $link = connect();
    $result = mysqli_query($link, "SELECT * FROM $table") or die("Error " . mysqli_error($link));
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_close($link);
    return $rows;
}

function allpagedrecords($table, $pagesize, $pageno) {
    $link = connect();
    $from = ($pageno - 1) * $pagesize;
    $result = mysqli_query($link, "SELECT * FROM $table limit $from, $pagesize") or die("Error " . mysqli_error($link));
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_close($link);
    return $rows;
}

function getsession() {
    $month = date('M');
    $year = date('Y');
    if ($month > 3) {
        return sprintf("%d-%d", $year, substr($year + 1, -2));
    } else {
        return sprintf("%d-%d", $year - 1, substr($year, -2));
    }
}


function single($table, $condition) {
    $link = connect();
    $result = mysqli_query($link, "SELECT * FROM $table WHERE $condition limit 1")
            or die("Error " . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    mysqli_close($link);
    return $row;
}

function findall($table, $condition) {
    $link = connect();
    $result = mysqli_query($link, "SELECT * FROM $table WHERE $condition")
            or die("Error " . mysqli_error($link));
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_close($link);
    return $rows;
}

function countrecords($table) {
    $link = connect();
    $result = mysqli_query($link, "SELECT count(*) as total FROM $table") or die("Error " . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    mysqli_close($link);
    return $row["total"];
}

function countifrecords($table, $condition) {
    $link = connect();
    $result = mysqli_query($link, "SELECT count(*) as total FROM $table WHERE $condition") or die("Error " . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    mysqli_close($link);
    return $row["total"];
}

function executeDML($query) {
    $link = connect();
    mysqli_query($link, $query) or die("Error" . mysqli_error($link));
    mysqli_close($link);
}

function executeProc($procname, $hasoutput = true, ...$params) {
    $link = connect();
    $count = count($params);
    $types = str_repeat("s", $count);
    $args = join(",", array_fill(0, $count, "?"));
    if ($hasoutput) {
        echo "call $procname($args,@output)";
        $stmt = mysqli_prepare($link, "call $procname($args,@output)");
        mysqli_stmt_bind_param($stmt, $types, ...$params);
        mysqli_stmt_execute($stmt) or die("Error " . mysqli_error($link));
        $result = mysqli_query($link, "select @output as output");
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        return $row["output"];
    } else {
        $stmt = mysqli_prepare($link, "call $procname($args)");
        echo "call $procname($args,@output)";        
        mysqli_stmt_bind_param($stmt, $types, ...$params);        
        mysqli_stmt_execute($stmt) or die("Error ".mysqli_error($link));
        mysqli_close($link);
    }
}

function numberToRoman($number) {
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if ($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}

function redirect($url) {
    header("location: $url");
}

function is_logged_in() {
    if (isset($_SESSION['userid'])) {
        return true;
    }
    return false;
}

function login_error_redirect($url = 'login.php') {
    $_SESSION['error'] = 'You must be logged in to access that page';
    header('LOCATION: ' . $url);
}

function permission_error_redirect($url = 'login.php') {
    $_SESSION['error'] = 'You do not have permission to access that page';
    header('LOCATION: ' . $url);
}

function pretty_date($date) {
    return date("d-M-Y", strtotime($date));
}

function money($number) {
    return '&#8377; ' . number_format($number, 2);
}

function err_msg($msg) {
    $_SESSION["error"] = $msg;
}

function success_msg($msg) {
    $_SESSION["msg"] = $msg;
}
