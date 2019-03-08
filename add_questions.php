<?php
include("connect.php");
if (!$_GET['quiz_id']) {
  header("Location: teacher.php");
}

else {
  $question = $_GET['ques'];
  $opt1 = $_GET['opt1'];
  $opt2 = $_GET['opt2'];
  $opt3 = $_GET['opt3'];
  $opt4 = $_GET['opt4'];
  $answer = $_GET['ans'];
  $quiz_id = $_GET['quiz_id'];
  $ans1 = 0;
  $ans2 = 0;
  $ans3 = 0;
  $ans4 = 0;
  $ansd = array("0","0","0","0");
  doDB();

    $N = count($answer);
    $multi = 'yes';

    for($i=0; $i < $N; $i++)
    {
      $ansd[$answer[$i]-1] = $answer[$i];
    }

    if($ansd[0]==0 and $ansd[1]==0 and $ansd[2]==0){
      $multi = 'no';
    }
    if($ansd[0]==0 and $ansd[1]==0 and $ansd[3]==0){
      $multi = 'no';
    }
    if($ansd[0]==0 and $ansd[2]==0 and $ansd[3]==0){
      $multi = 'no';
    }
    if($ansd[1]==0 and $ansd[2]==0 and $ansd[3]==0){
      $multi = 'no';
    }




  $sql = "INSERT INTO quiz_questions values (NULL, '".$quiz_id."','".$question."','".$opt1."','".$opt2."','".$opt3."','".$opt4."',
    '".$ansd[0]."','".$ansd[1]."','".$ansd[2]."','".$ansd[3]."','".$multi."')";
  mysqli_query($con, $sql) or die(mysqli_error($con));
  header("Location: add_quiz.php?quiz_id=".$quiz_id."");
}

 ?>
