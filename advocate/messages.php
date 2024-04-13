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
        #input{
            height: 7%;
            min-height: 42px;
            display: grid;
            grid-template-columns: 70% 30%;
            margin: 8px 16px;
            border-radius: 32px;
            background: linear-gradient(#ececee 50%, #1c1c46 50%);
            box-shadow: inset 0 1px 0 #777;
        }
        #text{
            outline: none;
            font-size: 20px;
            background: #ececee;
            color: #333;
            border-radius: 32px 0 32px 32px;
            padding: 0 16px;
            border: solid 1px #777;
            border-right: none;
        }
        #send{
            outline: none;
            font-size: 20px;
            color: #eee;
            background: #1c1c46;
            border: none;
            border-radius: 32px;
            transition-duration: 0.2s;
        }
        #send:active{
            font-size: 16px;
        }
        .left, .right{
            font-size: 18px;
            font-family: monospace;
            display: inline-block;
            width: auto;
            max-width: 60%;
            padding: 14px;
            word-wrap: break-word;
            margin: 8px 14px;
        }
        .left{
            color: #000;
            background: #b3bfca;
            border-radius: 0 16px 16px 16px;
        }
        .right{
            color: #fff;
            background: #1c1f46;
            border-radius: 16px 16px 0 16px;
            float: right;
            
        }
        .msgcon1, .msgcon2{
            width: 100%;
            display: inline-block;
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
            .left{
            color: #000;
            background: #b3bfca;
            border-radius:  16px  16px  16px 0;
        }

    </style>

<!-- <div class="bubbleWrapper">
    <div class="inlineContainer">
        <div class="otherBubble other">
            Hello Wakili, wanted to ask how my case looks
        </div>
    </div><span class="other">08:41</span>
</div>
<div class="bubbleWrapper">
    <div class="inlineContainer own">
        <div class="ownBubble own">
         Hey Jane, the court dates have not been released yet.
        </div>
    </div><span class="own">08:55</span>
</div>
<div class="bubbleWrapper">
    <div class="inlineContainer">
        <div class="otherBubble other">
           I'm getting anxious, is there something I should do before
        </div>
    </div>
</div><span class="other">10:13</span>
<div class="bubbleWrapper">
    <div class="inlineContainer own">
        <div class="ownBubble own">
        Calm down. Everything will be alright. Just ensure to not get into contact with your ex-husband
        </div>
    </div><span class="own">11:07</span>
</div>
<div class="bubbleWrapper">
    <div class="inlineContainer">
        <div class="otherBubble other">
            Alright thanks Wakili, I will keep in touch
        </div>
    </div><span class="other">11:11</span>
</div> -->
<!--  text sending -->
<!-- chatting with clients -->
<div id="main">
<form action="" method="post">
        <div id="msgarea">
            <div id="robot">
                <div id="bot"></div>
            </div>
        </div>
        <div id="input">
        <!-- Input field for the client's message -->
        <!-- <input type="text" name="client_message" placeholder="Your message"> -->
        <!-- Input field for the advocate's response -->
        <input type="text" name="advocate_message" placeholder="Advocate's response">
        <button id="send">Send &nbsp;<i class="fa fa-paper-plane"></i></button>
    </div>
        
    </form>
    </div>
    <?php
// your_php_script.php

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Establish database connection
    $conn = new mysqli("localhost", "root", "", "legal_savannah");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get messages from the form
    // $client_message = $_POST['client_message'];
    $advocate_message = $_POST['advocate_message'];

    // Prepare SQL statements for client's message
    // $stmt_client = $conn->prepare("INSERT INTO messaging (client, client_message) VALUES (?, ?)");
    // $stmt_client->bind_param("ss", $client, $client_message);
    // $stmt_client->execute();
    // $stmt_client->close();

    // Prepare SQL statements for advocate's message
    // $stmt_advocate = $conn->prepare("INSERT INTO messaging (advocate, advocate_message) VALUES (?, ?)");
    // $stmt_advocate = $conn->prepare("UPDATE advocate_message = '$advocate_message' WHERE advocate = '$username'");
    // $stmt_advocate->bind_param("ss", $username, $advocate_message);
    // $stmt_advocate->execute();
    // $stmt_advocate->close();

    $sql="UPDATE messaging SET advocate_message = '$advocate_message' WHERE advocate = '$username'";
   
    

    // Echo a response (optional)
    // echo json_encode(['status' => 'success']);
    echo"Message sent successfully!";
    if ($conn->query($sql) === TRUE) {
        // echo "Assessment saved successfully.";
        $formMessage = "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Close database connection
    $conn->close();
} 

else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Connect to your database (replace with your database credentials)
    $conn = new mysqli("localhost", "root", "", "legal_savannah");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and execute SQL statement to fetch messages for the advocate
    $stmt = $conn->prepare("SELECT client, client_message FROM messaging WHERE advocate = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Display messages
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>{$row['client']}: {$row['client_message']}</p>";
        }

    } else {
        echo "<p class='left'>No messages available</p>";
    }
    
    // Close statement and database connection
    $stmt->close();
    $conn->close();
} 
else {
    // Return an error response if the request method is neither POST nor GET
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method Not Allowed']);
}
?>

