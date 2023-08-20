<?php
    session_start();
    include "../QUESTIOND/connection.php";

    if(isset($_POST['submit'])){
        $e=$_POST['nick'];
        $query="insert into student values(0,'$e');";
        $res=mysqli_query($con,$query);
        if($res){
            $_SESSION["username"]=$e;
            $query="select studentid from student where username='$e';";
            $res=mysqli_query($con,$query);
            if($res){
                $id=mysqli_fetch_assoc($res);
                $_SESSION["studentid"]=$id["studentid"];
            }
        }

        //header("location:../CodePage/CodePage.html");
    }
?>