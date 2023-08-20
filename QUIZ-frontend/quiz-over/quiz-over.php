<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz over</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <h1 style="font-family:poppins" id="score_text"></h1>

    <form id="quizForm" action="updatemark.php" method="post">
        <input type="hidden" name="score" value="">
    </form>


    <script>
        let count = 0;
        const getResults = JSON.parse(localStorage.getItem('quizResults')) || [];
        getResults.forEach(item => {
            if (item.isCorrect) {
                count++;
            }
        })
        document.getElementById("score_text").innerHTML += `Score ${count}/15`;
        document.querySelector('input[name="score"]').value = count;
        document.getElementById('quizForm').submit();

    </script>


</body>

</html>