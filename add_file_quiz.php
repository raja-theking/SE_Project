<?php

$con = mysqli_connect("localhost", "root", "", "se_project") or die("Connection Failed");

$string = $_GET['file'];
$quiz_id = $_GET['quiz_id'];

$file = str_replace("\\","/",$string);

$fileo = fopen("$file","r");


while (!feof($fileo)) {
  $multi = 'yes';
  $contents = fgets($fileo);
  $carray = explode("|", $contents);
  list($question, $opt1, $opt2, $opt3, $opt4, $a1, $a2, $a3, $a4) = $carray;

  if($a1==0 and $a2[1]==0 and $a3[2]==0){
    $multi = 'no';
  }
  if($a1==0 and $a2==0 and $a4==0){
    $multi = 'no';
  }
  if($a1==0 and $a3==0 and $a4==0){
    $multi = 'no';
  }
  if($a2==0 and $a3==0 and $a4==0){
    $multi = 'no';
  }


  $sql = "INSERT INTO quiz_questions values (NULL, '".$quiz_id."','".$question."','".$opt1."','".$opt2."','".$opt3."','".$opt4."',
    '".$a1."','".$a2."','".$a3."','".$a4."','".$multi."')";
  mysqli_query($con, $sql) or die(mysqli_error($con));
}
header("Location: teacher.php");




?>
