<?php
include("connect.php");
doDB();
session_start();
if (!$_GET['quiz_id']) {
  header("Location: search.php");
}
else {
  $_SESSION['quiz_start'] = 'start';
  $quiz_id_sql = "INSERT into marks values (NULL, '".$_SESSION['id']."', '".$_GET['quiz_id']."', '0')";
  $login_res = mysqli_query($con, $quiz_id_sql) or die(mysqli_error($con));

 header("Location: attempt_quiz.php?quiz_id=".$_GET['quiz_id']."");
}
?>
