  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/QUIZ/Styles/questions.css">
    <title>Questions</title>
  </head>
  <body>
    <div>
      <h1>
        <p>Questions,</p>
      </h1>
      <?php
        session_start();
        include "connection.php";
    
        //echo "jn";
        $questions = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $newQuestion = [
            "question" => $_POST["question-input"],
            "difficulty" => $_POST["difficult-input"],
            "options" => [
                $_POST["option1-input"],
                $_POST["option2-input"],
                $_POST["option3-input"],
                $_POST["option4-input"]
            ],
            "answer" => (int)$_POST["answer-input"]
            ];
            $questions[] = $newQuestion;
        }
        foreach ($questions as $index => $q) {
            echo "<div>";
            echo "<h2>Question " . ($index + 1) . ": " . $q["question"] . "</h2>";
            echo "<ul>";
            echo "</ul>";
            echo "<p>Difficulty level: " . $q["difficulty"] . "</p>";
            echo "</div>";
            foreach ($q["options"] as $optionIndex => $option) {
                echo "<li>" . $option . "</li>";
            }
            echo "</ul>";
            echo "<p>Correct answer: " . $q["options"][$q["answer"]] . "</p>";
            echo "</div>";
        }
        if(isset($_POST['submit'])){
            //questionid quizid qdis choice1 choice2 choice3 choice4 correctans
            $quizid=$_SESSION["quizid"];
            $qno=$_POST['difficult-input'];
            $qdesc=$_POST['question-input'];
            $ch1=$_POST['option1-input'];
            $ch2=$_POST['option2-input'];
            $ch3=$_POST['option3-input'];
            $ch4=$_POST['option4-input'];
            $cortans=$_POST['answer-input'];
            $query="INSERT INTO questions VALUES(0,'$quizid','$qno', '$qdesc', '$ch1', '$ch2', '$ch3', '$ch4', '$cortans');";
            mysqli_query($con,$query);
        }
      ?>
      <h2>Add Question</h2>
      <form method="post">
        <label for="question-input">Question:</label>
        <input type="text" id="question-input" name="question-input">
        <br><br>
        <label for="answer-input">Enter difficulty level :</label>
        <input type="number" id="difficult-input" name="difficult-input">
        <label for="option1-input">Option 1:</label>
        <input type="text" id="option1-input" name="option1-input">
        <label for="option2-input">Option 2:</label>
        <input type="text" id="option2-input" name="option2-input">
        <label for="option3-input">Option 3:</label>
        <input type="text" id="option3-input" name="option3-input">
        <label for="option4-input">Option 4:</label>
        <input type="text" id="option4-input" name="option4-input">
        <br><br>
        <label for="answer-input">Correct answer (enter option number):</label>
        <input type="number" id="answer-input" name="answer-input">
        <input type="submit" value="submit" id="submit" name="submit">
      </form>
    </div>
  </body>
  </html>
