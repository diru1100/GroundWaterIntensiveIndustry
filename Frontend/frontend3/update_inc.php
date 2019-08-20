<?php
$host="localhost";

$user="root";
$pw="";
$db="ground_water";

$water_extraction=$_POST["water_extraction"];

$conn=mysqli_connect($host,$user,$pw,$db);
if(!$conn)
{
	die("connection not established".mysqli_error($conn));

}
else
{
	$query="UPDATE  FROM industry WHERE industry_id='$industry_id'
industry_name='$industry_name'";
	$result=$conn->query($query);
	$row=
	if($result->num_rows===1)
	{
		echo "<script type='text/javascript'>alert('success');</script>";

		

	}
	else
	{
		echo "<script type='text/javascript'>alert('no success');</script>";
		
	}
}
?>