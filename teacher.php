<?php

include("connect.php");
doDB();
session_start();

if (!isset($_SESSION['id'])) {
	header("Location: index.html");
	exit();
}

else {
  echo "<div style=\"color:white;\">Welcome ".$_SESSION['id']."</div>";
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
	<!DOCTYPE html>
	<html lang="en" dir="ltr">
	 <head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="teach.css">
	<link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
	<link rel="icon" type="image/png" href="favicon.ico"/>

			<link rel="stylesheet" type="text/css" href="demo.css" />
			<link rel="stylesheet" type="text/css" href="set1.css" />
	</head>
	<body>

	    <div class="split left">
	      <div class="centered">
	          <h1>Add Quiz Here</h1>
	    <form action="add_quiz_id.php" method="get">
	<!--<div class="textbox">Quiz Info: <input type="text" name="quiz_info"></div> -->
	<section class="content bgcolor-4">
	      <span class="input input--kuro">
	        <input class="input__field input__field--kuro" type="text" id="input-7" name="quiz_info"/>
	        <label class="input__label input__label--kuro" for="input-7">
	          <span class="input__label-content input__label-content--kuro">Quiz Info: </span>
	        </label>
	      </span>
	</section>
	 <div class="box">
	 <select name="stream">
	      <option value="dbms">DBMS</option>
	      <option value="os">OS</option>
	      <option value="daa">DAA</option>
	      <option value="java">Java</option>
	    </select></div>
	  <!--<a href="logout.php">Logout</a> -->
	</div>
	<div class="wrapper-inner-tab">
	<div class="wrapper-inner-tab-backgrounds">
	<div class="wrapper-inner-tab-backgrounds-first"><a href="logout.php" style="text-decoration:none;"><div class="sim-button button1"><span>Logout</span>
	</div></a></div>
	</div>
	</div>
	  <div class="new">
	    <input type="submit" value="Add">
	    <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id']; ?>">
	    </div>
	</div>
	</form>


	      <div class="split right">
	        <div class="centered">
	          <div class="qw">
	                <h2>Select a file<h2>
	                </div>
			<form action="add_quiz_id.php" method="get">
	      <section class="content bgcolor-4">
	            <span class="input input--kuro">
	              <input class="input__field input__field--kuro" type="text" id="input-7" name="quiz_info"/>
	              <label class="input__label input__label--kuro" for="input-7">
	                <span class="input__label-content input__label-content--kuro">Quiz Info: </span>
	              </label>
	            </span>
	      </section>
			<div class="hola">

	    <!--	Quiz Info: <input type="text" name="quiz_info"> -->
	    <select name="stream">
			       <option value="dbms">DBMS</option>
			       <option value="os">OS</option>
			       <option value="daa">DAA</option>
			       <option value="java">Java</option>
			  </select>
	</div>
	       <input type="file"name="file" class="ram">
	         <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id']; ?>">
	        <input type="hidden" name="upload" value="yes">
	<!--<a href="teacher_quizes.php">View Your Quizes</a>-->

	  </div>
	<input type="submit" value="Submit" class="yoyo">
	<div class="kk">
	<div class="pk">
	<div class="rk"><a href="teacher_quizes.php" style="text-decoration:none;"><div class="sim-button button13"><span>Result</span>
	</div></a></div>
	</div>
	</div>
	    </div>
	</form>


	<div class="bg"></div>
	<div class="bg bg2"></div>
	<div class="bg bg3"></div>

	</body>
	</html>
