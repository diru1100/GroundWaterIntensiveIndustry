<?php

if(isset($_POST['signupbtn'])){

	include_once 'db.php';

	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);

	//error handlers
	//check for empty fields
	if(empty($username)||empty($password)||empty($email)){
		header("Location: ../signup.php?signup=empty");
		exit();
	}
	else{
		//check if input characters are valid
		if(!preg_match("/^[a-zA-Z]*$/",$username)){
			header("Location: ../signup.php?signup=invalid");
			exit();
		}
		else{
			//check if email is valid
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				header("Location: ../signup.php?signup=invalidemail");
				exit();
			}
			else{
				$sql="SELECT * FROM users WHERE username='$username'";
				$result=mysqli_query($conn, $sql);
				$resultcheck=mysqli_num_rows($result);
				if($resultcheck>0){
					header("Location: ../signup.php?signup=usertaken");
					exit();
				}
				else{
					//hashing password
					$hashedpassword=password_hash($password,PASSWORD_DEFAULT);
					//inserting in to database
					$sql="INSERT INTO users(username,password,email) VALUES('$username','$hashedpassword','$email');";
					$result=mysqli_query($conn,$sql);
					header("Location:../signupsuccess.php");
				}
			}
		}
	}
}
else{
	header("Location: ../signup.php");
	exit();
}