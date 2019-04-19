<?php
include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id'])  or $_SESSION['type'] != "student") {
	header("Location: index.html");
	exit();
}

else {
  echo "<div style=\"color:white; font-family: Tahoma, Geneva, sans-serif;\">Welcome ".$_SESSION['id']."</div>";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Online Quiz System</title>
	<link rel="stylesheet" href="stu.css">
	<link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
  </head>
  <body>
		<div class='ripple-background'>
		  <div class='circle xxlarge shade1'></div>
		  <div class='circle xlarge shade2'></div>
		  <div class='circle large shade3'></div>
		  <div class='circle mediun shade4'></div>
		  <div class='circle small shade5'></div>
		</div>

<h1>Search Quiz !</h1>
			<H2> Which Quiz Do You Want To Perform!! </h2>
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
		<!-- <a href="logout.php">Logout</a> -->
	<!-- 		<a href="logout.php">	<button class="button"><span>Logout</span></button></a> -->
	</div>
	<div class="wrapper-inner-tab">
<div class="wrapper-inner-tab-backgrounds">
<div class="wrapper-inner-tab-backgrounds-first"><a href="logout.php" style="text-decoration:none;"><div class="sim-button button1"><span>Logout</span>
</div></a></div>
</div>

</div>
  </body>
</html>
