<!DOCTYPE html>
<html>
<head>
    <style>
        /* Your CSS styles from container.css go here */
    </style>
</head>
<body>
    <div class="container">
        <h1>Choose your role:</h1>
        <div class="buttons">
            <button class="quiz-master" onclick="handleQuizMasterClick()">
                I'm a Quiz Master
            </button>
            <button class="quizzee" onclick="handleQuizzeeClick()">
                I'm a Quizzee
            </button>
        </div><br>
        <button onclick="goBack()">go back</button>
    </div>
    
    <script>
        function handleQuizMasterClick() {
            window.location.href = '/Home';
        }

        function handleQuizzeeClick() {
            window.location.href = '/Quiz';
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
