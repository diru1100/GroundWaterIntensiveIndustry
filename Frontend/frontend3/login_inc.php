<?php
$host="localhost";

$user="root";
$pw="";
$db="ground_water";

$login_username=$_POST["login_username"];
$login_password=$_POST["login_password"];


$conn=mysqli_connect($host,$user,$pw,$db);
if(!$conn){
	die("connection not established".mysqli_error($conn));

}
else
{
	
	$query="SELECT * FROM login WHERE username='$login_username' AND password='$login_password' ";
	$result=$conn->query($query);
	if($row=mysqli_fetch_row($result))
	{
		print_r($row);
		//echo "<script type='text/javascript'>alert('check your username and password');</script>";

		//header('Location:industryafterlogin.php');

	}
	else
	{
		echo "<script type='text/javascript'>alert('check your username and password');</script>";
		header('Location:login.php');
	}
}
?>