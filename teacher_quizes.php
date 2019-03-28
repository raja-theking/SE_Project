<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id'])) {
	header("Location: student.php");
	exit();
}

$teacher_quizes_sql = "SELECT * FROM quiz_info where teacher_id = '".$_SESSION['id']."'";
$teacher_quiz = mysqli_query($con, $teacher_quizes_sql) or die(mysqli_error($con));

$display_block = "
<table cellpadding = \"3\" cellspacing = \"1\" border = \"1\" align=\"center\" width=\"50%\">
<tr>
<th>Quiz ID</th>
<th>Quiz Stream</th>
<th>Quiz Info</th>
<th>Results</th>
</tr>";

while ($quizes = mysqli_fetch_array($teacher_quiz)) {
    $quiz_id = $quizes["quiz_id"];
    $quiz_stream = $quizes["quiz_stream"];
    $quiz_info = $quizes["quiz_info"];

    $display_block .="
    <tr>
			<td align=\"center\">
			".$quiz_id."
			</td>
      <td align=\"center\">
      ".$quiz_stream."
      </td>
      <td align=\"center\">
      ".$quiz_info."
      </td>
      <td>
      <a href=\"view_result.php?quiz_id=$quiz_id\">View Results</a>
      </td>
		</tr>
    ";
}
$display_block .= "
	</table>
	";


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Quiz Results</title>
		<link rel="stylesheet" href="Res.css">
		  </head>
<body>
	<div class="kunal">
		<h1 align="center">Your Quizes</h1>
			<?php echo $display_block; ?>
	</div>

  </body>
</html>
