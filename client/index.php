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

use GuzzleHttp\Psr7\Request;

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
    $userrow = $database->query("SELECT * from client where pemail='$useremail'");
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


                                $clientrow = $database->query("SELECT  * from  client;");
                                $advocaterow = $database->query("SELECT  * from  advocate;");
                                $appointmentrow = $database->query("SELECT  * from  appointment where appodate>='$today';");
                                $schedulerow = $database->query("SELECT  * from  schedule where scheduledate='$today';");


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
                    <div id="blur-background"></div>
                    <table class="filter-container advocate-header" style="border: none;width:95%" border="0" >
                    <tr>
                        <td >
                            <h3>Welcome to TLS, Sheria Mkononi!</h3>
                            <h1><?php echo $username  ?>.</h1>
                            <p>Do you need legal help, get to talk to our pool of  
                                <a href="advocates.php" class="non-style-link"><b>"Advocates"</b></a> or get your
                                <a href="schedule.php" class="non-style-link"><b>"DIY Documents"</b> </a><br>
                                Track your past sessions and transactions.<br>Also get access to your legal advuments without a hustle.<br><br>
                            </p>
                            
                            <h3>Find an Advocate from here</h3>
                            <!-- <form action="schedule.php" method="post" style="display: flex">

                                <input type="search" name="search" class="input-text " placeholder="Search for Advocates close to you and schedule a meeting" list="advocates" style="width:45%;">&nbsp;&nbsp;
                                
                                <?php
                                //     echo '<datalist id="advocate">';
                                //     $list11 = $database->query("SELECT  advname,advemail, advaddress FROM  advocate;");
    
                                //     for ($y=0;$y<$list11->num_rows;$y++){
                                //         $row00=$list11->fetch_assoc();
                                //         $d=$row00["advname"];
                                        
                                //         echo "<option value='$d'><br/>";
                                        
                                //     };
    
                                // echo ' </datalist>';
    ?>
                                
                           
                                <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                             -->
                                
                                <!-- Search function -->
    <form action="" method="GET">
  <label for="location">Enter Location:</label>
  <input type="text" id="location" name="location">
  <button type="submit" class="btn btn-primary">Search</button>
</form>

<?php
if(isset($_GET['location'])){
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "legal_savannah";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve location entered by the user
$location = $_GET['location'];

// Query database for lawyers in the specified location
$sql = "SELECT * FROM advocate WHERE advaddress LIKE '%$location%'";
$result = $conn->query($sql);

// Check if any lawyers are found
if ($result->num_rows > 0) {
  // Display the list of lawyers
  echo "<h2>Advocate in $location:</h2>";
  echo "<table style='margin-left: 40px;width: 70%;  border-collapse: collapse;'>";
  echo "<tr><th style='border: 1px solid black; padding: 8px; text-align: left;'>Name</th><th style='border: 1px solid black; padding: 8px; text-align: left;'>Email</th><th style='border: 1px solid black; padding: 8px; text-align: left;'>Phone</th><th style='border: 1px solid black; padding: 8px; text-align: left;'>Action</th></tr>";

  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td style='border: 1px solid black; padding: 8px; text-align: left;'>" . $row["advname"] . "</td>";
    echo "<td style='border: 1px solid black; padding: 8px; text-align: left;'>" . $row["advemail"] . "</td>";
    echo "<td style='border: 1px solid black; padding: 8px; text-align: left;'>" . $row["advtel"] . "</td>";
    echo "<td><a href='advocates.php' value='Book Session' class='btn btn-primary'>Book Session</a></td>";
            
   echo  "</tr>";
  }
  echo "</table>";
} else {
  // Notify the user if no lawyers are found
  echo "<p>No lawyers found in $location.</p>";
}


$conn->close();
}
?>


<!-- <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;"> -->

</form>

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
          Advocates &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
      </div>
      <div class="btn-icon-back dashboard-icons" style="background-image: url('https://img.icons8.com/?size=512&id=fnEVNYOK0uhR&format=png'); background-position: center; background-size: cover;"></div>
    </div>
  </td>
  <td style="width: 25%;">
    <div class="dashboard-items" style="padding: 20px; margin: auto; width: 95%; display: flex; align-items: center;">
      <div>
        <div class="h1-dashboard">
          <?php echo $clientrow->num_rows ?>
        </div><br>
        <div class="h3-dashboard">
          Clients &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
      </div>
      <div class="btn-icon-back dashboard-icons" style="background-image: url('https://img.icons8.com/?size=2x&id=PqDbOXnH4Mpu&format=png'); background-position: center; background-size: cover;"></div>
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
          Appointments &nbsp;&nbsp;
        </div>
      </div>
      <div class="btn-icon-back dashboard-icons" style="background-image: url('https://img.icons8.com/?size=2x&id=123456&format=png'); background-position: center; background-size: cover; margin-left: 0;"></div>
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


                            
                                    <p style="font-size: 20px;font-weight:600;padding-left: 40px;" class="anime">Your Upcoming Session</p>
                                    <center>
                                        <div class="abc scroll" style="height: 250px;padding: 0;margin: 0;">
                                        <table width="85%" class="sub-table scrolldown" border="0" >
                                        <thead>
                                            
                                        <tr>
                                        <th class="table-headin">
                                                    
                                                
                                                    Appoint. Number
                                                    
                                                    </th>
                                                <th class="table-headin">
                                                    
                                                
                                                Session Title
                                                
                                                </th>
                                                
                                                <th class="table-headin">
                                                    Advocate
                                                </th>
                                                <th class="table-headin">
                                                    
                                                    Sheduled Date & Time
                                                    
                                                </th>
                                                    
                                                </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            $nextweek=date("Y-m-d",strtotime("+1 week"));
                                                $sqlmain= "SELECT * from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join client on client.pid=appointment.pid inner join advocate on schedule.advname=advocate.advname  where  client.pid=$userid  and schedule.scheduledate>='$today' order by schedule.scheduledate asc";
                                                //echo $sqlmain;
                                                $result= $database->query($sqlmain);
                
                                                if($result->num_rows==0){
                                                    echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Nothing to show here!</p>
                                                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Channel an Advocate &nbsp;</font></button>
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
                                                    $apponum=$row["apponum"];
                                                    $advname=$row["advname"];
                                                    $scheduledate=$row["scheduledate"];
                                                    $scheduletime=$row["scheduletime"];
                                                   
                                                    echo '<tr>
                                                        <td style="padding:30px;font-size:25px;font-weight:700;"> &nbsp;'.
                                                        $apponum
                                                        .'</td>
                                                        <td style="padding:20px;"> &nbsp;'.
                                                        substr($title,0,30)
                                                        .'</td>
                                                        <td>
                                                        '.substr($advname,0,20).'
                                                        </td>
                                                        <td style="text-align:center;">
                                                            '.substr($scheduledate,0,10).' '.substr($scheduletime,0,5).'
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

    <a href="blog.php" class="floating-button">Blog</a>

</body>
</html>