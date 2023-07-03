<?php

    $database= new mysqli("localhost","root","","legal_savannah");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>