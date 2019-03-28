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
    <title>Online Quiz System</title>
	<link rel="stylesheet" href="stu.css">
  </head>
  <body>

      <h1>Search Quiz</h1>
			<H2> Which Quiz Do You Want To Perform: </h2>
				<h2> Please Select Here : </h2>
			  <div class="sea">
    <form action="search.php" method="get">

	<div class="box">
      <select name="stream">
        <option value="dbms">DBMS</option>
        <option value="os">OS</option>
        <option value="daa">DAA</option>
        <option value="java">Java</option>
      </select>
	  </div>
		<div class="sub">
      <input type="submit" value="Search">
	  </div>
    </form>
		<a href="logout.php">Logout</a>
	</div>
  </body>
</html>
