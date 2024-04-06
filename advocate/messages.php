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
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td>
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Appointments</p></a></div>
                    </td>
                </tr>
                
                <!-- <tr class="menu-row" >
                    <td>
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">My Sessions</p></div></a>
                    </td>
                </tr> -->
                
                <tr class="menu-row" >
                    <td>
                        <a href="clients.php" class="non-style-link-menu"><div><p class="menu-text">My Clients</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="messages.php" class="non-style-link-menu"><div><p class="menu-text">Messages</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="documents.php" class="non-style-link-menu"><div><p class="menu-text">My Documents</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
                
            </table>
</div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
            <tr >
                    <td width="13%">

                    <a href="index.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                        
                    </td>
                    <td>
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
        
            .bubbleWrapper {
                padding: 10px 10px;
                display: flex;
                justify-content: flex-end;
                flex-direction: column;
                align-self: flex-end;
            color: #fff;
            }
            .inlineContainer {
            display: inline-flex;
            }
            .inlineContainer.own {
            flex-direction: row-reverse;
            }
            .inlineIcon {
            width:20px;
            object-fit: contain;
            }
            .ownBubble {
                min-width: 60px;
                max-width: 700px;
                padding: 14px 18px;
            margin: 6px 8px;
                background-color: #5b5377;
                border-radius: 16px 16px 0 16px;
                border: 1px solid #443f56;
            
            }
            .otherBubble {
                min-width: 60px;
                max-width: 700px;
                padding: 14px 18px;
            margin: 6px 8px;
                background-color: #6C8EA4;
                border-radius: 16px 16px 16px 0;
                border: 1px solid #54788e;
            
            }
            .own {
                align-self: flex-end;
            }
            .other {
                align-self: flex-start;
            }
            span.own,
            span.other{
            font-size: 14px;
            color: grey;
            }


    </style>

<div class="bubbleWrapper">
    <div class="inlineContainer">
        <img class="inlineIcon" src="https://cdn3.iconfinder.com/data/icons/leto-user-group/64/__woman_profile_user-128.png">
        <div class="otherBubble other">
            Hello Wakili, wanted to ask how my case looks
        </div>
    </div><span class="other">08:41</span>
</div>
<div class="bubbleWrapper">
    <div class="inlineContainer own">
        <img class="inlineIcon" src="https://cdn3.iconfinder.com/data/icons/leto-user-group/64/__user_person_profile-128.png">
        <div class="ownBubble own">
         Hey Jane, the court dates have not been released yet.
        </div>
    </div><span class="own">08:55</span>
</div>
<div class="bubbleWrapper">
    <div class="inlineContainer">
        <img class="inlineIcon" src="https://cdn3.iconfinder.com/data/icons/leto-user-group/64/__woman_profile_user-128.png">
        <div class="otherBubble other">
           I'm getting anxious, is there something I should do before
        </div>
    </div>
</div><span class="other">10:13</span>
<div class="bubbleWrapper">
    <div class="inlineContainer own">
        <img class="inlineIcon" src="https://cdn3.iconfinder.com/data/icons/leto-user-group/64/__user_person_profile-128.png">
        <div class="ownBubble own">
        Calm down. Everything will be alright. Just ensure to not get into contact with your ex-husband
        </div>
    </div><span class="own">11:07</span>
</div>
<div class="bubbleWrapper">
    <div class="inlineContainer">
        <img class="inlineIcon" src="https://cdn3.iconfinder.com/data/icons/leto-user-group/64/__woman_profile_user-128.png">
        <div class="otherBubble other">
            Alright thanks Wakili, I will keep in touch
        </div>
    </div><span class="other">11:11</span>
</div>