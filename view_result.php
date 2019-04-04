<?php

include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id']) and !$_GET['quiz_id']) {
	header("Location: student.php");
	exit();
}


$students_sql = "SELECT distinct id FROM marks where quiz_id = '".$_GET['quiz_id']."'";
$students = mysqli_query($con, $students_sql) or die(mysqli_error($con));

$display_block = "
<table cellpadding = \"3\" cellspacing = \"1\" border = \"1\" align=\"center\" width=\"50%\">
<tr>
<th>Student</th>
<th>No of times attempted</th>
<th>Marks</th>
</tr>";

$nota =0;

while ($marks = mysqli_fetch_array($students)) {
    $stud_id = $marks["id"];

    $attempt = "SELECT count(*) as nota from marks where quiz_id = '".$_GET['quiz_id']."' and id='".$stud_id."'";
		$attempt_res = mysqli_query($con, $attempt) or die(mysqli_error($con));


    	while ($no = mysqli_fetch_array($attempt_res)) {
				$nota = $no["nota"];
			}
          $marks_sql = "SELECT MAX(marks) as hmarks FROM marks WHERE id = '".$stud_id."' and quiz_id='".$_GET['quiz_id']."'";
  		    $attempt_res = mysqli_query($con, $marks_sql) or die(mysqli_error($con));

          while ($hm = mysqli_fetch_array($attempt_res)) {
            $marks = $hm["hmarks"];
          }

    $display_block .="
    <tr>
			<td align=\"center\">
			".$stud_id."
			</td>
      <td align=\"center\">
      ".$nota."
      </td>
      <td align=\"center\">
      ".$marks."
      </td>
		</tr>
    ";
}

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Results</title>
	<link rel="stylesheet" href="last.css">
   </head>
   <body>
		 <div class="ll">
		 <a href="export_file.php?quiz_id=<?php echo $_GET['quiz_id']?>">Export Result</a> </div>
		 <h1> Marks </h1>
     <?php
     if ($nota>0) {
       echo $display_block;
     }
     else {
       echo "No attempts yet..";
     }
     ?>
   </body>
 </html>
