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
    <title></title>
  </head>
  <body>
    <h1>Search Quiz</h1>
    <form action="search.php" method="get">
      <select name="stream">
        <option value="dbms">DBMS</option>
        <option value="os">OS</option>
        <option value="daa">DAA</option>
        <option value="java">Java</option>
      </select>
      <input type="submit" value="Search">
    </form>
		<a href="logout.php">Logout</a>
  </body>
</html>
