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
    // $userid= $userfetch["advid"];
    // $username=$userfetch["advname"];
    // $verified = $userfetch['verified'];

   
    // if ($verified == 0) {
    //     // Advocate is not verified, display the prompt to upload necessary documents
        
    //     echo '<script>document.body.classList.add("overlay-active");</script>';
    // }



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
                                    <!-- h hb<p class="profile-title"><?php echo substr($username,0,13)  ?>..</p> -->
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
                            
                            <td colspan="1" class="nav-bar" >
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Dashboard</p>
                          
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
                            <h3>Welcome to TLS Wakili!</h3>
                            <!-- <h1><?php echo $username  ?>.</h1> -->
                            <p>Join us in our mission to democratize the law. We are always trying to get justice to those in need.<br>
                            You can view your dailly schedule, Reach Clients from home!<br><br>
                            </p>
                            <a href="appointment.php" class="non-style-link"><button class="btn-primary btn" style="width:30%">View My Appointments</button></a>
                            <br>
                            <br>
                        </td>
                    </tr>
                    </table>
                </center>
                    
                </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table border="0" width="100%"">
                            <tr>
                                <td width="50%">

                                    




                                <center>
                                        <table class="filter-container" style="border: none;" border="0">
                                            <tr>
                                                <td colspan="4">
                                                    <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Status</p>
                                                </td>
                                            </tr>
                                            <tr>
  <td style="width: 25%;">
    <div class="dashboard-items" style="padding: 20px; margin: auto; width: 95%; display: flex; align-items: center;">
      <div>
        <div class="h1-dashboard">
          <?php echo $advocaterow->num_rows ?>
        </div><br>
        <div class="h3-dashboard">
          Advocates Online &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
      </div>
      <div class="btn-icon-back dashboard-icons" style="background-image: url('https://img.icons8.com/?size=2x&id=z2Pf0IGYx2vt&format=png'); background-position: center; background-size: cover;"></div>
    </div>
  </td>
  <td style="width: 25%;">
    <div class="dashboard-items" style="padding: 20px; margin: auto; width: 95%; display: flex; align-items: center;">
      <div>
        <div class="h1-dashboard">
          <?php echo $clientrow->num_rows ?>
        </div><br>
        <div class="h3-dashboard">
          Total Users &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
      </div>
      <div class="btn-icon-back dashboard-icons" style="background-image: url('https://img.icons8.com/?size=2x&id=2b9yzbtBZAm0&format=png'); background-position: center; background-size: cover;"></div>
    </div>
  </td>
</tr>
<tr>
  <td style="width: 25%;">
    <div class="dashboard-items" style="padding: 20px; margin: auto; width: 95%; display: flex; align-items: center;">
      <div>
        <div class="h1-dashboard">
          <?php echo $appointmentrow->num_rows ?>
        </div><br>
        <div class="h3-dashboard">
          Bookings &nbsp;&nbsp;
        </div>
      </div>
      <div class="btn-icon-back dashboard-icons" style="background-image: url('https://img.icons8.com/?size=2x&id=Jfor1YnCQh3Z&format=png'); background-position: center; background-size: cover; margin-left: 40;"></div>
    </div>
  </td>
  <td style="width: 25%;">
    <div class="dashboard-items" style="padding: 20px; margin: auto; width: 95%; display: flex; align-items: center; padding-top: 21px; padding-bottom: 21px;">
      <div>
        <div class="h1-dashboard">
          <?php echo $schedulerow->num_rows ?>
        </div><br>
        <div class="h3-dashboard" style="font-size: 15px;">
          Sessions
        </div>
      </div>
      <div class="btn-icon-back dashboard-icons" style="background-image: url('https://img.icons8.com/?size=2x&id=RcOIhFn0DUPd&format=png'); background-position: center; background-size: cover;"></div>
    </div>
  </td>
</tr>
</table>
                                    </center>

                                    







                                </td>
                                <td>


                            
                                    <p id="anim" style="font-size: 20px;font-weight:600;padding-left: 40px;">Your Up Coming Sessions until Next week</p>
                                    <center>
                                        <div class="abc" style="height: 250px;padding: 0;margin: 0;">
                                        <table width="85%" class="sub-table scrolldown" border="0" >
                                        <thead>
                                            
                                        <tr>
                                                <th class="table-headin">
                                                    
                                                
                                                Session Title
                                                
                                                </th>
                                                
                                                <th class="table-headin">
                                                Sheduled Date
                                                </th>
                                                <th class="table-headin">
                                                    
                                                     Time
                                                    
                                                </th>
                                                    
                                                </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            $nextweek=date("Y-m-d",strtotime("+1 week"));
                                            $sqlmain= "select schedule.scheduleid,schedule.title,advocate.advname,schedule.scheduledate,schedule.scheduletime,schedule.nop from schedule inner join advocate on schedule.advname=advocate.advname  where schedule.scheduledate>='$today' and schedule.scheduledate<='$nextweek' order by schedule.scheduledate desc"; 
                                                $result= $database->query($sqlmain);
                
                                                if($result->num_rows==0){
                                                    echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Sessions &nbsp;</font></button>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                                    
                                                }
                                                else{
                                                for ( $x=0; $x<$result->num_rows;$x++){
                                                    $row=$result->fetch_assoc();
                                                    $scheduleid=$row["scheduleid"];
                                                    $title=$row["title"];
                                                    $advname=$row["advname"];
                                                    $scheduledate=$row["scheduledate"];
                                                    $scheduletime=$row["scheduletime"];
                                                    $nop=$row["nop"];
                                                    echo '<tr>
                                                        <td style="padding:20px;"> &nbsp;'.
                                                        substr($title,0,30)
                                                        .'</td>
                                                        <td style="padding:20px;font-size:13px;">
                                                        '.substr($scheduledate,0,10).'
                                                        </td>
                                                        <td style="text-align:center;">
                                                            '.substr($scheduletime,0,5).'
                                                        </td>

                
                                                       
                                                    </tr>';
                                                    
                                                }
                                            }
                                                 
                                            ?>
                 
                                            </tbody>
                
                                        </table>
                                        </div>
                                        </center>







                                </td>
                            </tr>
                        </table>
                    </td>
                <tr>
            </table>
        </div>
    </div>
<script>
   // Wait for the page to load
document.addEventListener("DOMContentLoaded", function() {
    // Check if the overlay class is present in the body tag
    if (document.body.classList.contains("overlay-active")) {
        // Create the overlay element
        var overlay = document.createElement("div");
        overlay.classList.add("overlay");

        // Create the overlay content element
        var overlayContent = document.createElement("div");
        overlayContent.classList.add("overlay-content");

        // Add a sad emoji
        overlayContent.innerHTML = '<p>Please upload your practicing certificate and admission number from your account settings. \uD83D\uDE22 But don\'t worry, we promise this process is less dramatic than a courtroom scene from a legal TV show!!</p>';

        // Create a link to the settings page
        var settingsLink = document.createElement("a");
        settingsLink.href = "settings.php";
        settingsLink.textContent = "Go to Account Settings";

        // Add the link to the overlay content
        overlayContent.appendChild(settingsLink);

        // Add the overlay content to the overlay
        overlay.appendChild(overlayContent);

        // Append the overlay to the body
        document.body.appendChild(overlay);

        // Add event listener to the overlay content
        overlayContent.addEventListener("click", function(e) {
            e.stopPropagation(); // Prevent click event from bubbling up to the overlay

            // Set the session variable to indicate prompt cancellation
            fetch("cancel_prompt.php").then(function(response) {
                if (response.ok) {
                    // Remove the overlay from the DOM
                    overlay.remove();
                }
            });
        });
    }
});


    </script>

</body>
</html>