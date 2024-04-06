<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Documents</title>
    <style>
        .dashbord-tables,.advocate-heade{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table,#anim{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .advocate-heade{
            animation: transitionIn-Y-over 0.5s;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay-content {
            background-color: #fff;
            padding: 20px;
            max-width: 400px;
            text-align: center;
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
                    <td>
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
                
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
        <tr >
                    <td width="13%">

                    <a href="index.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                        
                    </td>
                    <td>
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="1" class="nav-bar" >
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Documents</p>
                          
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
                        
                    <center>
    <table class="filter-container advocate-header" style="border: none;width:95%" border="0" >
    <tr>
        <td >
            <h3>Welcome to the Document generator!</h3>
            <h1>Your Research Assistant</h1>
            
                <form id="documentForm">
                    <label for="userPrompt">Enter your question or prompt:</label><br>
                    <textarea id="userPrompt" rows="5" cols="50" required></textarea><br>
                    <input type="button" value="Generate Document" onclick="generateDocument()">
                </form>

                <!-- The following will display the generated content and editable Word document side by side -->
                <div>
                    <div id="generatedText">
                        <h2>Generated Text:</h2>
                        <div id="generatedText">
                            <!-- The generated text will be displayed here -->
                        </div>
                    </div>
                    <div id="editableDocument">
                        <h2>Editable Document:</h2>
                        <div id="editableDocument">
                            <!-- The editable Word document will be displayed here -->
                        </div>
                    </div>
                </div>

                <script>
                    // Function to call the OpenAI API and generate the document based on user input
                    function generateDocument() {
                        const userPrompt = document.getElementById("userPrompt").value;
                
                        // Add your code here to call the OpenAI API and retrieve the generated text
                
                        // For demonstration purposes, let's assume the generated text is stored in a variable called 'generatedText'
                        const generatedText = "This is a sample generated text.";
                
                        // Display the generated text in the 'generatedText' div
                        const generatedTextDiv = document.getElementById("generatedText");
                        generatedTextDiv.innerHTML = generatedText;
                
                        // Check if the prompt should be added to the editable document
                        const shouldAddToEditableDocument = userPrompt.startsWith("editable:");
                
                        // Transfer the generated text to the appropriate div
                        if (shouldAddToEditableDocument) {
                            // Add to editable document div
                            const editableDocumentDiv = document.getElementById("editableDocument");
                            const editableText = userPrompt.substring("editable:".length);
                            editableDocumentDiv.innerHTML = "<textarea rows='20' cols='80'>" + editableText + "</textarea>";
                        } else {
                            // Add to generated text div
                            const generatedTextDiv = document.getElementById("generatedText");
                            generatedTextDiv.innerHTML = generatedText;
                        }
                    }
                </script>