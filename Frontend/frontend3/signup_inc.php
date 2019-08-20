<?php
$host="localhost";
$user="root";
$pw="";
$db="ground_water";

$username=$_POST["reg_username"];
$password=$_POST["reg_password"];
$confirm_password=$_POST["re-type_password"];
$email=$_POST["reg_email"];
$state=$_POST["reg_state"];
$district=$_POST["reg_district"];
$zone=$_POST["reg_zone"];


$conn=mysqli_connect($host,$user,$pw,$db);
if(!$conn){
	die("connection not established".mysqli_error($conn));

}
else
{
			
	$query="INSERT INTO registration (username,password,email_id,state,district,zone) VALUES ('$email','$password','$email','$state','$district','$zone')";
	//$query1="INSERT INTO login (username,password) VALUES ('$username','$password')";
	if($conn->query($query)==TRUE)//&&$conn->query($query1)==TRUE)

	{
		
		
		$query1="INSERT INTO login (username,password) VALUES ('$username','$password')";
	if($conn->query($query1)==TRUE)
	{
		header('Location:login.php');
	}
	else
	{
		echo "no success";
	}
	}
	else
	{
		echo "<script type='text/javascript'>alert('registration failed');</script>";
	}
	
}
?>	 