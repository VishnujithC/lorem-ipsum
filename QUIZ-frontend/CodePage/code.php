<?php
    session_start();
    include "../QUESTIOND/connection.php";
    if(isset($_POST["submit"])){
        $id=$_POST["id"];
        $n=$_SESSION["studentid"];
        echo $id.$n;
        $query="insert into attempt values('$n','$id',0);";
        mysqli_query($con,$query);
    }
?>