<?php
if (!$_GET['quiz_id']) {
  header("Location: teacher.php");
}
$quiz_id = $_GET['quiz_id'];
?>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="add_questions.php" method="get">
            Question : <input type="text" name="ques"> <br>
            Options: <br>
            1> <input type="text" name="opt1">  <input type="checkbox" name="ans[]" value="1"> <br>
            2> <input type="text" name="opt2">  <input type="checkbox" name="ans[]" value="2"> <br>
            3> <input type="text" name="opt3">  <input type="checkbox" name="ans[]" value="3"> <br>
            4> <input type="text" name="opt4">  <input type="checkbox" name="ans[]" value="4"> <br>


    <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
            <input type="submit" value="Add"> <br>
        </form>
        <a href="teacher.php">DONE</a>
    </body>
</html>
