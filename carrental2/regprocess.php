

<?php
include_once 'dbfun.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_GET['phone'];
    $adhaar = $_GET['adhaar'];
    $license = $_GET['license'];
    $approval = 'pending';
    extract($_POST);

    // Check if a file was uploaded
    if (isset($_FILES["adhaar"]) && $_FILES["adhaar"]["error"] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES["adhaar"]["tmp_name"];
        $fileName = $_FILES["adhaar"]["name"];

        // Move the uploaded file to a desired directory
        $targetDirectory = "adhaar/";
        $targetFilePath = $targetDirectory . $fileName;
        move_uploaded_file($fileTmpPath, $targetFilePath);

        // Insert form data and file path into the database
        $query = "INSERT INTO customers (userid, uname, phone, gender, address, adhaar, approval,license)"
                  . "VALUES ('$userid', '$uname', '$phone', '$gender', '$address', '$targetFilePath', '$approval','$license')";
        executeDML($query);

        $query = "INSERT INTO users (userid, uname, pwd, role)
                  VALUES ('$userid', '$uname', '$pwd', 'Customer')";
        executeDML($query);

        success_msg("Registered successfully");

        redirect('otp.php?phone=' . $phone);
    } else {
        error_msg("Error: No Aadhaar image file was uploaded.");
    }
}

