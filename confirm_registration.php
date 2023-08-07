<?php
session_start();

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_SESSION["confirmation_email"]) && isset($_POST['confirmation_code'])) {
        $email = $_SESSION["confirmation_email"];
        $enteredCode = $_POST['confirmation_code'];

        $result = $database->query("SELECT code FROM confirmation_codes WHERE email='$email'");

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $storedCode = $row['code'];
        
            if ($enteredCode == $storedCode) {
                // Update 'confirmed' status in the webuser table
                $database->query("UPDATE webuser SET confirmed=1 WHERE email='$email'");
        
                // Remove the code from the confirmation table
                $database->query("DELETE FROM confirmation_codes WHERE email='$email'");
        
                echo "Your account has been confirmed successfully!";
        
                $_SESSION["confirmation_email"] = $email;
                header('Location: client/index.php');
                exit;
            } else {
                echo "Invalid confirmation code.";
            }
        } else {
            echo "Invalid email or confirmation code.";
        }
    } else {
        echo "Session or form data missing.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- ... (head content) ... -->
</head>
<body>
    <center>
    <div class="container">
        <form action="" method="POST">
            <label for="confirmation_code" class="form-label">Enter Confirmation Code:</label>
            <input type="text" name="confirmation_code" class="input-text" required>
            <input type="submit" value="Confirm" class="login-btn btn-primary btn" name="submit">
        </form>
    </div>
    </center>
</body>
</html>
