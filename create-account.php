<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Create Account</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
    </style>
</head>
<body>
<?php

//learn from w3schools.com
//Unset all the server side variables


session_start();
include("connection.php");

// Unset all the server-side variables
$_SESSION["user"] = "";
$_SESSION["usertype"] = "";

// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$_SESSION["date"] = $date;
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;
if ($_POST) {
    $fname = $_SESSION['personal']['fname'];
    $lname = $_SESSION['personal']['lname'];
    $name = $fname . " " . $lname;
    $address = $_SESSION['personal']['address'];
    $nic = $_SESSION['personal']['nic'];
    $dob = $_SESSION['personal']['dob'];
    $email = $_POST['newemail'];
    $tele = $_POST['tele'];
    $newpassword = $_POST['newpassword'];
    $cpassword = $_POST['cpassword'];

    if ($newpassword == $cpassword) {
        $result = $database->query("SELECT * FROM webuser WHERE email='$email';");
    
        if ($result->num_rows == 1) {
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        } else {
            $confirmationCode = mt_rand(100000, 999999);
    
            $database->query("INSERT INTO client(pemail, pname, ppassword, paddress, pnic, pdob, ptel) VALUES ('$email','$name','$newpassword','$address','$nic','$dob','$tele');");
            $database->query("INSERT INTO webuser VALUES ('$email','c','0')");
            $database->query("INSERT INTO confirmation_codes (email, code) VALUES ('$email', '$confirmationCode')");

            $to = $email;
            $subject = "Account Confirmation Code";
            $message = "Hello $name,\n\nThank you for registering with us!\n\nYour confirmation code is: $confirmationCode\n\n";
            $message .= "Please use this code to confirm your account.\n\n";
            $headers = "From: sakindeborah@gmail.com"; // Set your email here

            mail($to, $subject, $message, $headers);
            
            
            // Use Africa's Talking API to send SMS
            $username = "spaceity";
            $apiKey = "aceb788d6828c3f63825e81688a96ea02d10688548bacaf026a65910e6739296";
    
            // Initialize the Africa's Talking SDK
            $AT = new AfricasTalking($username, $apiKey);
    
            // Format the phone number
            $phoneNumber = "+254" . substr($tele, 1); // Assuming $tele is in the format 0712345678
    
            // Create a message
            $message = "Hello $name,\n\nThank you for registering with us!\n\nYour confirmation code is: $confirmationCode\n\nPlease use this code to confirm your account.";
    
            // Send the SMS
            $sms = $AT->sms();
            $result = $sms->send([
                'to' => $phoneNumber,
                'message' => $message,
            ]);
    
            if ($result['status'] === 'success') {
                $_SESSION["confirmation_phone"] = $phoneNumber;
                header('Location: confirm_registration.php');
                exit;
            } else {
                // Handle SMS sending failure
                // You can add appropriate error handling here
                echo "Failed to send confirmation code via SMS.";
            }
            $_SESSION["confirmation_email"] = $email;
            header('Location: confirm_registration.php');
            exit;
        }
    
    
    } else {
        $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Confirmation Error! Reconfirm Password</label>';
    }



    
}else{
    //header('location: signup.php');
    $error='<label for="promter" class="form-label"></label>';
}

?>


    <center>
    <div class="container">
        <table border="0" style="width: 69%;">
            <tr>
                <td colspan="2">
                    <p class="header-text">Let's Get Started</p>
                    <p class="sub-text">It's Okey, Now Create User Account.</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="newemail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="email" name="newemail" class="input-text" placeholder="Email Address" required>
                </td>
                
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="tele" class="form-label">Mobile Number: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="tel" name="tele" class="input-text"  placeholder="ex: 0712345678" pattern="[0]{1}[0-9]{9}" >
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="newpassword" class="form-label">Create New Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="newpassword" class="input-text" placeholder="New Password" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="cpassword" class="form-label">Confirm Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="cpassword" class="input-text" placeholder="Confirm Password" required>
                </td>
            </tr>
     
            <tr>
                
                <td colspan="2">
                    <?php echo $error ?>

                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >
                </td>
                <td>
                    <input type="submit" value="Sign Up" class="login-btn btn-primary btn">
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Login</a>
                    <br><br><br>
                </td>
            </tr>

                    </form>
            </tr>
        </table>

    </div>
</center>
</body>
</html>