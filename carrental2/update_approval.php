<?php
session_start();

// Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

// Define namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted values
    $userid = $_POST["userid"];
    $approval = $_POST["approve"];

    // Perform the necessary database update here using the $userid and $approval values
    // Replace the database update code with your specific implementation
    // Update the corresponding record in the database with the new approval status

    // Assuming you are using MySQLi, you can use the following code:
    $mysqli = new mysqli("localhost", "root", "", "carrentaldb");

    // Check for database connection errors

    // Prepare the UPDATE statement
    $stmt = $mysqli->prepare("UPDATE customers SET approval = ? WHERE userid = ?");

    // Bind the parameters
    $stmt->bind_param("ss", $approval, $userid);

    // Execute the statement
    $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
    $mysqli->close();

    // Set email notification message
    $emailMessage = "";
    if ($approval == "Verified") {
        $emailMessage = "Your Aadhaar has been verified successfully";
    } elseif ($approval == "Pending") {
        $emailMessage = "Your Aadhaar verification status has been reverted to Pending";
    } else{
        $emailMessage = "Your Aadhaar has rejected";
    }

    // Send email notification to the user
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Username = "gousezahir100@gmail.com"; // Replace with your Gmail email address
    $mail->Password = "rokzrstdmhzdgzgo"; // Replace with your Gmail password
    $mail->setFrom('gousezahir100@gmail.com'); // Replace with your email address
    $mail->isHTML(true);
    $mail->Subject = "Aadhaar Verification Status Update";
    $mail->Body = "<h1>This is from Car Rental Website</h1><p>{$emailMessage}</p>";
    $mail->addAddress($userid); // Replace with the user's email address

    if ($mail->send()) {
        $_SESSION['notification'] = 'Email sent successfully.';
    } else {
        $_SESSION['notification'] = 'Failed to send email.';
    }

    // Redirect back to the page where the table is displayed
    header("Location: users.php");
    exit();
}

?>
