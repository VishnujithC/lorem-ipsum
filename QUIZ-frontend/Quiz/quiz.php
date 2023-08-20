<?php
include("../QUESTIOND/connection.php");

if (!isset($_GET['quizID']) || !isset($_GET['qno'])) {
    echo "Error: quizID or qno parameter not set.";
} else {
    $quizID = $_GET['quizID'];
    $qno = $_GET['qno'];

    if ($qno > 15) {
        header("location: ../quiz-over/quiz-over.php");
    } else {
        $query = "SELECT * FROM questions WHERE quizid = '$quizID' AND question_number = '$qno'";
        $result = mysqli_query($con, $query);

        if (!$result) {
            echo "Error fetching questions: " . mysqli_error($con);
        } else {
            $totalQs = mysqli_num_rows($result);

            $randomQnNum = rand(1, $totalQs);

            $questionsArray = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $questionsArray[] = $row;
            }

            if (isset($questionsArray[$randomQnNum - 1])) {
                $randomQuestion = $questionsArray[$randomQnNum - 1];

                $questionNum = $qno;
                $questionText = $randomQuestion['qdis'];
                $choice1 = $randomQuestion['choice1'];
                $choice2 = $randomQuestion['choice2'];
                $choice3 = $randomQuestion['choice3'];
                $choice4 = $randomQuestion['choice4'];
                $qsId = $randomQuestion['questionid'];
                $correctAnswer = $randomQuestion['correctans'];
            } else {
                echo "Error: Invalid random question number.";
            }

            mysqli_free_result($result);
        }
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
        <?php if (!isset($questionText)): ?>
            <p>
                <?php echo "Error: No questions available for the given quizID."; ?>
            </p>
        <?php else: ?>
            <nav>
                <img src="/QUIZ/public/logo.jpg" alt="">
            </nav>
            <div class="timer_section">
                <h3>Time left</h3>
                <div class="time">
                    <p id="minutes">15</p>
                    <p>:</p>
                    <p id="seconds">00</p>
                </div>
            </div>

            <div class="question_section">
                <p class="question_num">
                    <?php echo "Question " . $questionNum; ?>
                </p>
                <h3 class="question">
                    <?php echo $questionText; ?>
                </h3>
                <div class="options">
                    <button id="button_1" onclick="selectAns(1)" class="option_btn">
                        <?php echo $choice1; ?>
                    </button>
                    <button id="button_2" onclick="selectAns(2)" class="option_btn">
                        <?php echo $choice2; ?>
                    </button>
                    <button id="button_3" onclick="selectAns(3)" class="option_btn">
                        <?php echo $choice3; ?>
                    </button>
                    <button id="button_4" onclick="selectAns(4)" class="option_btn">
                        <?php echo $choice4; ?>
                    </button>
                </div>
            </div>
            <button class="next_question"
                onclick="addToLocalStorage(selectedOption, <?php echo $correctAnswer ?>, <?php echo $qsId ?>, <?php echo $questionNum + 1 ?>, <?php echo $quizID ?>)">
                <a href="quiz.php?quizID=<?php echo $quizID ?>&qno=<?php echo $qno + 1 ?>">
                    <img src="/QUIZ/public/arrow.svg" alt="">
                </a>
            </button>

        <?php endif; ?>
    </main>

    <script>

        let selectedOption = 0; // Initialize with a default value

        const selectAns = (option) => {
            selectedOption = option;

            const selectAllButtons = document.querySelectorAll('#button_1,#button_2,#button_3,#button_4');
            selectAllButtons.forEach(button => {
                button.style.backgroundColor = "white";
                button.style.color = "black";
            });

            const selectedButton = document.getElementById(`button_${option}`);
            if (selectedButton) {
                selectedButton.style.backgroundColor = "black"; // Change background color
                selectedButton.style.color = "white";
            }
        }

        const addToLocalStorage = (selectedOption, correctAns, qsId, qno, quizID) => {

            const questionInfo = {
                questionId: qsId,
                selectedOption: selectedOption,
                correctAnswer: correctAns,
                isCorrect: selectedOption === correctAns
            };

            const storedData = localStorage.getItem('quizResults');
            const existingData = storedData ? JSON.parse(storedData) : [];

            // check already exists
            const existingQuestionIndex = existingData.findIndex(item => item.questionId === qsId);

            if (existingQuestionIndex === -1) {
                // not found
                existingData.push(questionInfo);
            } else {
                // if found
                existingData[existingQuestionIndex] = questionInfo;
            }

            // store back
            localStorage.setItem('quizResults', JSON.stringify(existingData));
            // goToNextQuestion(qno, quizID);
        };



        const goToNextQuestion = (qno, quizID) => {
            console.log(quizID);
            if (qno <= 15) {
                window.location.href = `quiz.php?quizID=${quizID}&qno=${qno + 1}`;
            }
        }


        const updateTimer = () => {
            const minutesElement = document.getElementById("minutes");
            const secondsElement = document.getElementById("seconds");

            let minutes = parseInt(minutesElement.textContent);
            let seconds = parseInt(secondsElement.textContent);

            if (minutes === 0 && seconds === 0) {
                clearInterval(timerInterval);
                alert("Time's up!");
            } else {
                if (seconds === 0) {
                    minutes--;
                    seconds = 59;
                } else {
                    seconds--;
                }

                minutesElement.textContent = minutes < 10 ? `0${minutes}` : minutes;
                secondsElement.textContent = seconds < 10 ? `0${seconds}` : seconds;
            }
        };

        const timerInterval = setInterval(updateTimer, 1000);

    </script>

</body>

</html>