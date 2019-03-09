<?php
include("connect.php");

if (!$_GET) {
  header("Location: teacher.php");
}

else {
  doDB();
  $sql = "INSERT INTO quiz_info values (NULL, '".$_GET['stream']."','".$_GET['quiz_info']."','".$_GET['teacher_id']."')";
  mysqli_query($con, $sql) or die(mysqli_error($con));

  $quiz_id_sql = "SELECT * FROM quiz_info ORDER BY quiz_id DESC LIMIT 1";
  $login_res = mysqli_query($con, $quiz_id_sql) or die(mysqli_error($con));

  while($info = mysqli_fetch_array($login_res)) {
  $quiz_id = $info['quiz_id'];
  if (!$_GET['upload']) {
  header("Location: add_quiz.php?quiz_id=".$quiz_id."");
  }
  else {
    header("Location: add_file_quiz.php?quiz_id=".$quiz_id."&file=".$_GET['file']);
  }
  }

}



?>
