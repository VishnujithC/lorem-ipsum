<?php
    session_start();
    include "../QUESTIOND/connection.php";
    if(isset($_POST["submit"])){
        $id=$_POST["id"];
        $n=$_SESSION["studentid"];
        $query="insert into attempt values('$n','$id',0);";
        $res=mysqli_query($con,$query);
        if($res){
            $_SESSION["quizid"]=$id;
        }
        header("location:../Quiz/quiz.php");
    }
?>