<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id']) or !$_GET['quiz_id'] or $_SESSION['quiz_start']=='stop') {
	header("Location: student.php");
	exit();
}


else {

	$ques_no = 1;
	$nof = 0;
	if(isset($_GET['ques_no'])){
  $ques_no = $_GET['ques_no'];}


	$quiz_id_sql = "SELECT * FROM quiz_questions where quiz_id = '".$_GET['quiz_id']."'";
	$login_res = mysqli_query($con, $quiz_id_sql) or die(mysqli_error($con));

  $no_of_ques = "SELECT count(*) as nof FROM quiz_questions where quiz_id = '".$_GET['quiz_id']."'";
  $ques_res = mysqli_query($con, $no_of_ques) or die(mysqli_error($con));

	while ($no = mysqli_fetch_array($ques_res)) {
		$nof = $no["nof"];
	}

	$display_block = "
	<table cellpadding = \"3\" cellspacing = \"1\" border = \"1\" align=\"center\" width=\"50%\">
	<tr>
	<th>Question ".$ques_no."</th>
	</tr>";

	for ($i=0; $i<$ques_no; $i++){
	  $quiz = mysqli_fetch_array($login_res);
		$que = nl2br(stripcslashes($quiz["question"]));
		$opt1 = nl2br(stripcslashes($quiz["opt1"]));
		$opt2 = nl2br(stripcslashes($quiz["opt2"]));
		$opt3 = nl2br(stripcslashes($quiz["opt3"]));
		$opt4 = nl2br(stripcslashes($quiz["opt4"]));
		$ans = nl2br(stripcslashes($quiz["ans"]));
		$ans2 = nl2br(stripcslashes($quiz["ans2"]));
		$ans3 = nl2br(stripcslashes($quiz["ans3"]));
		$ans4 = nl2br(stripcslashes($quiz["ans4"]));
    $multi = $quiz["multi"];
}
   if ($multi=="no" or $multi=="no ") {
		$display_block .= "
		<tr>
			<td>
			".$que." <br/>
			<form action='add_marks.php' method='post'>
			<input type='radio' name='opt' value='1'> ".$opt1." <br>
      <input type='radio' name='opt' value='2'> ".$opt2." <br>
			<input type='radio' name='opt' value='3'> ".$opt3." <br>
			<input type='radio' name='opt' value='4'> ".$opt4." <br>
			<input type='hidden' name='ans' value='".$ans."'>
			<input type='hidden' name='ans2' value='".$ans2."'>
			<input type='hidden' name='ans3' value='".$ans3."'>
			<input type='hidden' name='ans4' value='".$ans4."'>
			<input type='hidden' name='ques_no' value='".$ques_no."'>
			<input type='hidden' name='quiz_id' value='".$_GET['quiz_id']."'>
			<input type='submit'value='Submit'>
			</form>
			</td>
		</tr>
		";
   }
	 else {

	 	$display_block .= "
		<tr>
			<td>
			".$que." <br/>
		<form action='add_marks.php' method='post'>
		<input type='checkbox' name='opt1' value='1'> ".$opt1." <br>
		<input type='checkbox' name='opt2' value='2'> ".$opt2." <br>
		<input type='checkbox' name='opt3' value='3'> ".$opt3." <br>
		<input type='checkbox' name='opt4' value='4'> ".$opt4." <br>
    <input type='hidden' name='ans1' value='".$ans."'>
		<input type='hidden' name='ans2' value='".$ans2."'>
		<input type='hidden' name='ans3' value='".$ans3."'>
		<input type='hidden' name='ans4' value='".$ans4."'>
		<input type='hidden' name='ques_no' value='".$ques_no."'>
		<input type='hidden' name='quiz_id' value='".$_GET['quiz_id']."'>
		<input type='submit' value='Submit'>
		</form>
		</td>
		</tr>
		";
	 }


$display_block .= "
	</table>
	";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Quizes</title>

<link rel="stylesheet" href="attempted.css">
</head>
<body>

<div class="grid">
<h1 align="center">Quiz</h1>
<?php
if($ques_no<=$nof){
echo $display_block;
}
else { echo "No More Questions";}
?>
<br>
<hr style="margin-bottom: 5px; ">

<div style="font-size:30px;color:#795548;">Question No:<br> </div>
<?php
for ($i=0; $i<$nof; $i++) {
	$n = $i+1;
echo "<a href=\"attempt_quiz.php?ques_no=".$n."&quiz_id=".$_GET['quiz_id']."\">".$n."</a>";
}
?>

<div class="an">
<a href="add_marks.php?show=true&quiz_id=<?php echo $_GET['quiz_id'] ?>">Show marks</a>
</div>
</body>
</html>
