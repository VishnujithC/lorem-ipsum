<?php
    include("../QUESTIOND/connection.php");

    if (!isset($_GET['quizID']) && !isset($_GET['qno'])) {
        echo "Error: quizID parameter not set.";
    } else {
        $quizID = $_GET['quizID'];
        $qno = $_GET['qno'];

        $query = "SELECT * FROM questions WHERE quizid = '$quizID'";
        $result = mysqli_query($con, $query);

        if (!$result) {
            echo "Error fetching questions: " . mysqli_error($con);
        } else {
            $row = mysqli_fetch_assoc($result);

            if (!$row) {
                echo "No questions available for the given quizID.";
            } else {
                $questionNum = $qno;
                $questionText = $row['qdis'];
                $choice1 = $row['choice1'];
                $choice2 = $row['choice2'];
                $choice3 = $row['choice3'];
                $choice4 = $row['choice4'];
                $correctAnswer = $row['correctans'];
            }

            mysqli_free_result($result);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/QUIZ/Styles/quiz.css">
    <title>Quiz</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <main class="quiz_wrapper">
        <?php if (!isset($questionText)) : ?>
            <p><?php echo "Error: No questions available for the given quizID."; ?></p>
        <?php else : ?>
            <nav>
                <img src="/QUIZ/public/logo.jpg" alt="">
            </nav>
            <div class="timer_section">
                <h3>Time left</h3>
                <div class="time">
                    <p>15</p>
                    <p>:</p>
                    <p>00</p>
                </div>
            </div>
            <div class="question_section">
                <p class="question_num"><?php echo "Question " . $questionNum; ?></p>
                <h3 class="question"><?php echo $questionText; ?></h3>
                <div class="options">
                    <button class="option_btn"><?php echo $choice1; ?></button>
                    <button class="option_btn"><?php echo $choice2; ?></button>
                    <button class="option_btn"><?php echo $choice3; ?></button>
                    <button class="option_btn"><?php echo $choice4; ?></button>
                </div>
            </div>
            <button class="next_question">
                <img src="/QUIZ/public/arrow.svg" alt="">
            </button>
        <?php endif; ?>
    </main>
</body>

</html>
