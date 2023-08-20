<!DOCTYPE html>

<html>

<head>
    <title>QUIZZZZ</title>
    <link rel="stylesheet" href="/QUIZ/Styles/end.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">


</head>


<body>
    <div class='lor'>
        <img id="dd" src="/QUIZ/QUIZ-frontend/CodePage/Frame 8.jpg">

    </div>

    <div class="input">
        <p id="txt">Your test is over !!!</p>
        <div class="out">
            <p>Score :</p>
            <?php
            session_start();
            $m=$_SESSION['mark'];
            echo "<p>".$m."/15<p>";
            ?>
        </div>
    </div>
    <div class="red">
        <img id="bl" src="/QUIZ/public/Ellipse 5.svg">
    </div>




</body>

</html>