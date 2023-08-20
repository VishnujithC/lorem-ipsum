<?php
    include "../QUESTIOND/connection.php";
    $data=json_decode(file_get_contents("php://input"));
    if($data){
        echo $data;
    }    
?>