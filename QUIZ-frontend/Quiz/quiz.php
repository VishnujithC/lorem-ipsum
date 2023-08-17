<?php

if (!isset($_GET['qno'])) {
    # code...
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
            <p class="question_num">Question 1</p>
            <h3 class="question">What type of music do you listen to?</h3>
            <div class="options">
                <button class="option_btn">Option a</button>
                <button class="option_btn">Option a</button>
                <button class="option_btn">Option a</button>
                <button class="option_btn">Option a</button>
            </div>
        </div>
        <button class="next_question">
            <a href="quiz.php?qno=3">
                <img src="/QUIZ/public/arrow.svg" alt="">
            </a>
        </button>
    </main>



    <!-- <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Set the target time for the countdown (15 minutes)
            const targetTime = 15 * 60; // 15 minutes in seconds

            // Get references to the timer display elements
            const minutesDisplay = document.getElementById("minutes");
            const secondsDisplay = document.getElementById("seconds");

            let timerInterval;

            // Update the timer every second
            function updateTimer() {
                const currentTime = Math.max(targetTime - Math.floor(Date.now() / 1000), 0);

                console.log("Current Time:", currentTime);

                const minutes = Math.floor(currentTime / 60);
                const seconds = currentTime % 60;

                console.log("Minutes:", minutes, "Seconds:", seconds);

                // Update the timer display
                minutesDisplay.textContent = String(minutes).padStart(2, "0");
                secondsDisplay.textContent = String(seconds).padStart(2, "0");

                if (currentTime === 0) {
                    // Timer has reached 0, you can add actions here when the time is up
                    clearInterval(timerInterval);
                }
            }

            // Initial call to update timer
            // updateTimer();

            // Call updateTimer every second
            timerInterval = setInterval(updateTimer, 1000);
        });


    </script> -->

</body>

</html>