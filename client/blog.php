<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    
    <title>Dashboard</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table,.anime{
            animation: transitionIn-Y-bottom 0.5s;
        }
        
    </style>
    
    
</head>
<body>
    <?php

    //learn from w3schools.com

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


    //echo $userid;
    //echo $username;
    
    ?>
    <div class="container">
        
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td >
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td >
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                <td>
                   <a href="advocates.php" class="non-style-link-menu">
                    <div>
                         <p class="menu-text">Advocates for You</p>
                            
                    </div>
                </a>
            </td>
        </tr>

                
                <tr class="menu-row" >
                    <td>
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Schedule Sessions</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td >
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">Appointments</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="messages.php" class="non-style-link-menu"><div><p class="menu-text">My Messages</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="documents.php" class="non-style-link-menu"><div><p class="menu-text">My Documents</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td >
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
                
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="1" class="nav-bar" >
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Home</p>
                          
                            </td>
                            <td width="25%">

                            </td>
                            <td width="15%">
                                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Today's Date
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                                date_default_timezone_set('Asia/Kolkata');
        
                                $today = date('Y-m-d');
                                echo $today;


                                $clientrow = $database->query("select  * from  client;");
                                $advocaterow = $database->query("select  * from  advocate;");
                                $appointmentrow = $database->query("select  * from  appointment where appodate>='$today';");
                                $schedulerow = $database->query("select  * from  schedule where scheduledate='$today';");


                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                            </td>
        
        
                        </tr>
                <tr>
                    <td colspan="4" >
                        <style>
                            /* Add your CSS styles here */
                    .article {
                        margin: 20px;
                        padding: 20px;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                    }

                    .video-container {
                        position: relative;
                        width: 100%;
                        padding-bottom: 56.25%; /* 16:9 aspect ratio (for 560x315 videos) */
                    }

                    .video-embed {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                    }
                            </style>

                    <h1>Welcome to Our Blog</h1>

                <div class="article">
                    <h2>AI Legal Framework and Implications</h2>
                    <p>The law governing robotics and artificial intelligence in kenya...</p>
                    <div class="video-container">
                        <iframe class="video-embed" src="https://www.youtube.com/embed/VIDEO_ID_1" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="article">
                    <h2>Wills and Trusts</h2>
                    <p>What to do in the event a father dies without a will and you learn of a second family...</p>
                    <div class="video-container">
                        <iframe class="video-embed" src="https://www.youtube.com/embed/VIDEO_ID_2" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <style>
        .floating-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #89CFF0;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        
        }

        .floating-button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        </style>

    <a href="blog.php" class="floating-button">Ask a Question Anonymously</a>

