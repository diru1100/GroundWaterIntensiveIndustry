<?php

session_start();

if (isset($_POST['login'])) {
	
	include 'db.php';

	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);

	//error handlers

	if(empty($username) || empty($password)){
		header("Location:../login.php?login=empty");
		exit();
	}
	else{
		$sql="SELECT * FROM users WHERE username='$username'";
		$result=mysqli_query($conn,$sql);
		$resultcheck=mysqli_num_rows($result);
		if($resultcheck < 1){
			header("Location:../login.php?login=error");
			exit();
		} else {
			if($row=mysqli_fetch_assoc($result)){
				//dehashing the password
				$pas = "SELECT * FROM users WHERE password = '$password' and username = '$username'";
				if(mysqli_num_rows(mysqli_query($conn, $pas)) > 1) {
					header("Location:../login.php?login=error");
					exit();
				} else {
					//log in the user here
					$_SESSION['username']=$row['username'];
					$_SESSION['password']=$row['password'];
					$_SESSION['email']=$row['email'];
					header("Location: ../main.php");
					exit();
				}
			} else {
				echo "no";
			}
		}
	}
}
else{
	header("Location:../login.php?login=error");
	exit();
}