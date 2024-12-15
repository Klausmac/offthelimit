<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "nadanparindey";

    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if($conn){
        echo "Boycott Bangladesh!!!<br>";
    }
    else{
        die("Connection Failed");
    }
?>