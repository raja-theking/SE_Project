<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id']) && !$_GET['stream']) {
	header("Location: student.php");
	exit();
}

else {
	$quiz_id_sql = "SELECT quiz_id, quiz_info, teacher_id FROM quiz_info where quiz_stream = '".$_GET['stream']."'";
	$login_res = mysqli_query($con, $quiz_id_sql) or die(mysqli_error($con));


	$display_block = "
	<p align=\"center\">Showing Quiz For The Stream ".$_GET['stream']."</p>
	<table cellpadding = \"3\" cellspacing = \"1\" border = \"1\" align=\"center\" width=\"50%\">
  <tr>
	<th>Quizes</th>
	<th>No of times attempted</th>
	</tr>";

	while ($quiz = mysqli_fetch_array($login_res)) {
		$quiz_id = $quiz["quiz_id"];
		$quiz_info = nl2br(stripcslashes($quiz["quiz_info"]));
		$teacher_id = $quiz["teacher_id"];

		$attempt = "SELECT count(*) as nota from marks where quiz_id = '".$quiz_id."' and id='".$_SESSION['id']."'";
		$attempt_res = mysqli_query($con, $attempt) or die(mysqli_error($con));

    	while ($no = mysqli_fetch_array($attempt_res)) {
				$nota = $no["nota"];
			}

		$display_block .= "
		<tr>
			<td> Quiz ID : ".$quiz_id."<br>About Quiz : ".$quiz_info."<br/>
				By Teacher : ".$teacher_id."<br/>
				<a href='confirm_quiz.php?quiz_id=".$quiz_id."'>Attempt</a>
			</td>
      <td>
          ".$nota."
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
<link rel="stylesheet" href="see.css">
</head>
<body>

<h1 align="center">Attempt Any Quiz</h1>
<?php echo $display_block; ?>
</body>
</html>
