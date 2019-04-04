<?php
if (!$_GET['quiz_id']) {
  header("Location: teacher.php");
}
$quiz_id = $_GET['quiz_id'];
?>

<html>
    <head>
        <title>Online Quiz System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="ques.css">
    </head>
    <body>
      <div class="add">
	<h1> Please Insert The Question </h1>
        <form action="add_questions.php" method="get" id="usrform">
<!--  <div class="ques"> Question : <input type="text" name="ques"> <br></div> -->
   <div class="ques"> Question : </div>
     <div class="raja">
     <textarea rows="4" cols="50" class"mm" name="ques" form="usrform">
     </textarea>
   </div>
<div class="op">  Options : <br></div>
		  <div class="opt">
            1. <input type="text" class="qq" name="opt1"> <input type="checkbox" class="kk" name="ans[]" value="1"> <br>
            2. <input type="text" class="qq" name="opt2"> <input type="checkbox" class="kk" name="ans[]" value="2"> <br>
            3. <input type="text" class="qq" name="opt3"> <input type="checkbox" class="kk" name="ans[]" value="3"> <br>
            4. <input type="text" class="qq" name="opt4"> <input type="checkbox" class="kk" name="ans[]" value="4"> <br>
            </div>
   <div class="new">
    <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">

      <input type="submit" value="Add"> <br>
      </div>
     </form><a href="teacher.php">DONE</a>
	   </div>

    </body>
</html>
