<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if user is logged in as advocate
    session_start();
    if (isset($_SESSION["user"]) && $_SESSION["usertype"] === "l") {
        $useremail = $_SESSION["user"];

        // Import database
        include("../connection.php");

        // Handle practicing certificate upload
        if ($_FILES["certificate"]["error"] === 0) {
            $certificateFile = $_FILES["certificate"]["tmp_name"];
            $certificateFileName = $_FILES["certificate"]["name"];
            $certificateFileDestination = "../certificate/" . $certificateFileName;

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($certificateFile, $certificateFileDestination)) {
                // Update practicing certificate in the database
                $updateCertificateQuery = "UPDATE advocate SET practicingcertificate = '$certificateFileName' WHERE advemail = '$useremail'";
                $database->query($updateCertificateQuery);
            }
        }

        // Update admission number in the database
        $admissionNumber = $_POST["admission"];
        $updateAdmissionQuery = "UPDATE advocate SET admissionnumber = '$admissionNumber' WHERE advemail = '$useremail'";
        $database->query($updateAdmissionQuery);

        // Redirect to the profile page or display a success message
        header("Location: settings.php");
        exit;
    }
}
?>
