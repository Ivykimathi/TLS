
<?php
    
    

    //import database
    include("../connection.php");



    if($_POST){
        //print_r($_POST);
        $result= $database->query("select * from webuser");
        $name=$_POST['name'];
        $oldemail=$_POST["oldemail"];
        $nic=$_POST['nic'];
        $spec=$_POST['spec'];
        $email=$_POST['email'];
        $tele=$_POST['Tele'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $id=$_POST['id00'];
        
        if ($password==$cpassword){
            $error='3';
            $result= $database->query("select advocate.advid from advocate inner join webuser on advocate.advemail=webuser.email where webuser.email='$email';");
            //$resultqq= $database->query("select * from advocate where advid='$id';");
            if($result->num_rows==1){
                $id2=$result->fetch_assoc()["advid"];
            }else{
                $id2=$id;
            }
            
            echo $id2."jdfjdfdh";
            if($id2!=$id){
                $error='1';
                //$resultqq1= $database->query("select * from advocate where docemail='$email';");
                //$did= $resultqq1->fetch_assoc()["advid"];
                //if($resultqq1->num_rows==1){
                    
            }else{

                //$sql1="insert into advocate(docemail,advname,docpassword,docnic,doctel,specialties) values('$email','$name','$password','$nic','$tele',$spec);";
                $sql1="update advocate set advemail='$email',advname='$name',advpassword='$password',advnic='$nic',advtel='$tele',specialties=$spec where advid=$id ;";
                $database->query($sql1);

                $sql1="update webuser set email='$email' where email='$oldemail' ;";
                $database->query($sql1);

                echo $sql1;
                //echo $sql2;
                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: settings.php?action=edit&error=".$error."&id=".$id);
    ?>
    
   

</body>
</html>