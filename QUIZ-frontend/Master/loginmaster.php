<?php
    session_start();
    include "../QUESTIOND/connection.php";

    if(isset($_POST['submit'])){
        $e=$_POST['email'];
        $p=$_POST['pass'];
        $query="select username,password from teacher where username='$e' and password='$p';";
        $res=mysqli_query($con,$query);
        $cnt=mysqli_num_rows($res);
        if($cnt==1){
                // header("location:#");
                echo "Login successful";
        }
    }
?>