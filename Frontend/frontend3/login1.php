<?php
$host="localhost";
$user="root";
$pw="";
$db="ground_water";


$username=$_POST["reg_username"];
$password=$_POST["reg_password"];


$conn=mysqli_connect($host,$user,$pw,$db);
if(!$conn){
	die("connection not established".mysqli_error($conn));

}
else
{
	$query1="INSERT INTO login (username,password) VALUES ('$username','$password')";
	if($conn->query($query)==TRUE)
	{
		header('Location:login.php');
	}
	else
	{
		echo "no success";
	}
}
?>