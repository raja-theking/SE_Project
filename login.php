<?php

	include("connect.php");
	session_start();

	if (!$_POST) {
		header("Location: index.html");
	}

	else {
		doDB();
		$login_sql = "SELECT password from login where id = '".$_POST['user']."' and type = '".$_POST['type']."'";
		$login_res = mysqli_query($con, $login_sql) or die(mysqli_error($con));


		while($info = mysqli_fetch_array($login_res)) {
			$pass = $info['password'];
		}



		if ($_POST['pass']==$pass) {
			$_SESSION['id'] = $_POST['user'];
    if($_POST['type']=='teacher'){
      	header("Location: Teacher.php");
			}
	 elseif ($_POST['type']=='student'){
	      	header("Location: Student.php");
			}
		}

		else {
			echo "Sorry Wrong Password";
		}


	}
?>
