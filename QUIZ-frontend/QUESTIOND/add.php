<?php
    session_start();
    include "connection.php";

    //echo "jn";
    if(isset($_POST['submit'])){
        echo "hi";
        //questionid quizid qdis choice1 choice2 choice3 choice4 correctans
        $questionid=$_POST['questionid'];
        // $quizid=$_POST['quizid'];
        $qdesc=$_POST['question-input'];
        $ch1=$_POST['option1-input'];
        $ch2=$_POST['option2-input'];
        $ch3=$_POST['option3-input'];
        $ch4=$_POST['option4-input'];
        $cortans=$_POST['answer-input'];
        echo $qdesc.$ch1.$ch2.$ch3.$ch4.$cortans;
        $query="INSERT INTO questions VALUES(1, 1, '$qdesc', '$ch1', '$ch2', '$ch3', '$ch4', '$cortans');";
        $res=mysqli_query($con, $query);
        var_dump($res);

        // header("location:samepage.php");
    }
?>