<?php

include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id'])) {
	header("Location: index.html");
	exit();
}

else {
  echo "Welcome ".$_SESSION['id'];
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
<meta charset="utf-8">
<link rel="stylesheet" href="teach.css">
<link rel="icon" type="image/png" href="favicon.ico"/>
</head>
<body>

  <div class="kunal">
    <h1>Add Quiz Here</h1>
    <form action="add_quiz_id.php" method="get">
<div class="textbox">Quiz Info: <input type="text" name="quiz_info"></div>
 <div class="box">
 <select name="stream">
      <option value="dbms">DBMS</option>
      <option value="os">OS</option>
      <option value="daa">DAA</option>
      <option value="java">Java</option>
    </select></div>
	<div class="new">
    <input type="submit" value="Add">
		<input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id']; ?>"></div>
    </form>

<div class="qw">
		<p>OR</p>
      <h2>Select a file<h2>
      </div>
		<form action="add_quiz_id.php" method="get">
		<div class="hola">	Quiz Info: <input type="text" name="quiz_info">
			<select name="stream">
		       <option value="dbms">DBMS</option>
		       <option value="os">OS</option>
		       <option value="daa">DAA</option>
		       <option value="java">Java</option>
		  </select>
    </div>
    <div class="git">
		<div class="opop"> <input type="file"name="file" class="ram">
</div>
    <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id']; ?>">
		<input type="hidden" name="upload" value="yes">
<div class="cool">	<input type="submit" value="Submit">
</div>
		</form>
    </div>
<a href="logout.php">Logout</a>
<div class="aa">
<a href="teacher_quizes.php">View Your Quizes</a>
</div>
</div>
</body>
</html>
