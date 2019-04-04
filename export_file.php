<?php

include("connect.php");
doDB();

$nota =0;

$delimiter = ",";
$filename = $_GET['quiz_id'] ."_". date('Y-m-d') . ".csv";

$f = fopen('php://memory', 'w');


$fields = array('Students_ID', 'No of times attempted', 'Marks');
fputcsv($f, $fields, $delimiter);

$students_sql = "SELECT distinct id FROM marks where quiz_id = '".$_GET['quiz_id']."'";
$students = mysqli_query($con, $students_sql) or die(mysqli_error($con));

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

     $lineData = array($stud_id, $nota, $marks);
     fputcsv($f, $lineData, $delimiter);

}

fseek($f, 0);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');


fpassthru($f);
?>
