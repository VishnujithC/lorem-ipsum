<?php
    session_start();
    include "../QUESTIOND/connection.php";

    if(isset($_POST['score'])){
        $m=$_POST['score'];
        $sid=$_SESSION["studentid"];
        $query="update attempt set mark=mark+'$m' where studentid='$sid';";
        $res=mysqli_query($con,$query);
        $_SESSION['mark']=$m;
        header("location:../End/end.php");
    }    
?>