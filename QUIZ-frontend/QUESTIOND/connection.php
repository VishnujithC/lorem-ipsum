<?php

    $l="localhost";
    $u="root";
    $p="password";
    $db="quiz";
    $con=mysqli_connect($l, $u, $p, $db);

    if(!$con){
        die("error".mysqli_connect_error());
    }

?>