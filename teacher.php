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
  <body>
		hii
    <h1>Add Quiz</h1>
    <form action="add_quiz_id.php" method="get">
			Quiz Info <input type="text" name="quiz_info">
    <select name="stream">
      <option value="dbms">DBMS</option>
      <option value="os">OS</option>
      <option value="daa">DAA</option>
      <option value="java">Java</option>
    </select>
    <input type="submit" value="Add">
		<input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id']; ?>">
    </form>

		<a href="logout.php">Logout</a>
  </body>
</html>
