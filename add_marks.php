<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id'])) {
	header("Location: student.php");
	exit();
}

else {
    if($_GET){
		$quiz_id_sql = "SELECT marks from marks where quiz_id = '".$_GET['quiz_id']."' and id = '".$_SESSION['id']."'";
		$login_res = mysqli_query($con, $quiz_id_sql) or die(mysqli_error($con));
		while ($quiz = mysqli_fetch_array($login_res)) {
			$total_marks = $quiz["marks"];
		}
		$_SESSION['quiz_start'] = 'stop';
    echo "Total marks are ".$total_marks;
  }

  else {
if (isset($_POST['opt'])) {

if ($_POST['ans']!=0) {
	$chkans = $_POST['ans'];
}
if ($_POST['ans2']!=0) {
	$chkans = $_POST['ans2'];
}
if ($_POST['ans3']!=0) {
	$chkans = $_POST['ans3'];
}
if ($_POST['ans4']!=0) {
	$chkans = $_POST['ans4'];
}

  if($_POST['opt'] == $chkans){
		$quiz_id_sql = "SELECT marks, index_a from marks where quiz_id = '".$_POST['quiz_id']."' and id =
		 '".$_SESSION['id']."' ORDER BY index_a DESC LIMIT 1;";
		$login_res = mysqli_query($con, $quiz_id_sql) or die(mysqli_error($con));
		while ($quiz = mysqli_fetch_array($login_res)) {
			$total_marks = $quiz["marks"];
			$index_a = $quiz["index_a"];
		}
	$total_marks++;
  $quiz_id_sql = "UPDATE marks SET marks='".$total_marks."' where quiz_id='".$_POST['quiz_id']."' and id = '".$_SESSION['id']."' and index_a='".$index_a."';";
  $login_res = mysqli_query($con, $quiz_id_sql) or die(mysqli_error($con));
}
}
else {

$opt1 = (isset($_POST['opt1'])) ? $_POST['opt1'] : 0;
$opt2 = (isset($_POST['opt2'])) ? $_POST['opt2'] : 0;
$opt3 = (isset($_POST['opt3'])) ? $_POST['opt3'] : 0;
$opt4 = (isset($_POST['opt4'])) ? $_POST['opt4'] : 0;

if ($opt1 == $_POST['ans1'] and $opt2 == $_POST['ans2'] and $opt3 == $_POST['ans3'] and $opt4 == $_POST['ans4'] ) {
	$quiz_id_sql = "SELECT marks, index_a from marks where quiz_id = '".$_POST['quiz_id']."' and id =
	 '".$_SESSION['id']."' ORDER BY index_a DESC LIMIT 1;";
	$login_res = mysqli_query($con, $quiz_id_sql) or die(mysqli_error($con));
	while ($quiz = mysqli_fetch_array($login_res)) {
		$total_marks = $quiz["marks"];
		$index_a = $quiz["index_a"];
	}
$total_marks++;
$quiz_id_sql = "UPDATE marks SET marks='".$total_marks."' where quiz_id='".$_POST['quiz_id']."' and id = '".$_SESSION['id']."' and index_a='".$index_a."';";
$login_res = mysqli_query($con, $quiz_id_sql) or die(mysqli_error($con));
}

}

  $quiz_id = $_POST['quiz_id'];
  $ques_no = $_POST['ques_no'];
  $ques_no++;



  header("Location: attempt_quiz.php?ques_no=$ques_no&quiz_id=$quiz_id");

}
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
	</br>
		<a href="student.php">Go Back</a>
	</body>
</html>
