<?php
// Assuming you have already established the database connection
//learn from w3schools.com

session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='l'){
        header("location: ../login.php");
    }else{
        $useremail=$_SESSION["user"];
    }

}else{
    header("location: ../login.php");
}

//import database
include("../connection.php");
$userrow = $database->query("select * from advocate where advemail='$useremail'");
$userfetch=$userrow->fetch_assoc();
$userid= $userfetch["advid"];
$username=$userfetch["advname"];
$verified = $userfetch['verified'];


if ($verified == 1) {
    // If the 'verified' status is changed to 1, redirect to index.html
    header("Location: index.html");
    exit();
} else {
    // If the 'verified' status is still 0 or not changed, display the status message
    $status = "Queue";
    echo "Please wait as we review your documents: " . $status;
}






if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form was submitted
    if (isset($_POST["admission_number"]) && isset($_FILES["practicing_certificate"])) {
        // Handle the form submission

        // Retrieve the form data
        $admissionNumber = $_POST["admission_number"];
        $practicingCertificate = $_FILES["practicing_certificate"];

        // Here, you can perform any validation or checks you need before proceeding.
        // For example, checking if the admission number and certificate are valid and allowed.

        // You can store the certificate file in a specific directory on the server
        $certificateFileName = "certificate_" . time() . ".pdf";
        $certificateFilePath = "C:\\Users\\sakin\\OneDrive\\Documents\\advocate" . $certificateFileName;

        // Move the uploaded certificate file to the desired directory
        move_uploaded_file($practicingCertificate["tmp_name"], $certificateFilePath);

        // Perform database update operations to store the admission number and certificate file path
        // Update the 'verified' field for the advocate in the database to indicate they are in the queue for verification.
        // You can use UPDATE SQL query here.

        // For demonstration purposes, let's assume the advocate is now in the queue for verification
        $status = "Queue";

        // Display the status message
        echo "Your document verification status: " . $status;
    } else {
        // Handle form submission errors here
        echo "Error: Missing form data";
    }
} else {
    // If the form was not submitted using POST method, redirect to the settings page
    header("Location: settings.php");
    exit();
}
?>
