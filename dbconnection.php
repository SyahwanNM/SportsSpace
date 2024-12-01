<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sports_space";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if(!$conn){
        die("conneciton faild" .mysqli_connect_error());
    }
?>