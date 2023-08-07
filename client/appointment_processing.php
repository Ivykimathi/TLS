<?php
// appointment_processing.php

// Assuming you have a database connection
session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='c'){
        header("location: ../login.php");
    }else{
        $useremail=$_SESSION["user"];
    }

}else{
    header("location: ../login.php");
}


//import database
include("../connection.php");
    $userrow = $database->query("select * from client where pemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["advocate"]) && isset($_POST["date"]) && isset($_POST["time"]) && isset($_POST["title"])) {
        $advocateId = $_POST["advocate"];
        $appointmentDate = $_POST["date"];
        $appointmentTime = $_POST["time"];
        $appointmentTitle = $_POST["title"];

        // You should perform validation and sanitization of user inputs here

        // Insert the appointment details into the schedule table
        $insertQuery = "INSERT INTO schedule (advid, title, scheduledate, scheduletime) VALUES ('$advocateId', '$appointmentTitle', '$appointmentDate', '$appointmentTime')";
        // Insert the appointment details into the appointment table
        $insertQuery = "INSERT INTO appointment (pid, apponum, scheduleid, appodate) VALUES ('$userid', 1, NULL, '$appointmentDate')";


        if ($database->query($insertQuery)) {
            echo "Appointment scheduled successfully!";
            header('Location: appointment.php');
        } else {
            echo "Error scheduling appointment: " . $database->error;
        }
    } else {
        echo "Invalid input data.";
    }
} else {
    echo "Invalid request method.";
}
?>