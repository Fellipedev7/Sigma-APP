<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registrar";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn){
        //echo "Connection succesfully established...";
    }else{
        //echo "An error ocurred with the query...".mysqli_connect_error;
    }
?>