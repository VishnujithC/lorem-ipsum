<?php
    session_start();
    include "../QUESTIOND/connection.php";

    if(isset($_POST['submit'])){
        $e=$_POST['email'];
        $p=$_POST['pass'];
        $query="insert into teacher values(0,'$e','$p');";
        mysqli_query($con,$query);

        header("location:Master.html");
    }
?>