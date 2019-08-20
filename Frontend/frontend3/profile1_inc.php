<?php
$host="localhost";

$user="root";
$pw="";
$db="ground_water";

$industry_id=$_POST["industry_id"];
$industry_name=$_POST["industry_name"];
$state=$_POST["state"];
$district=$_POST["district"];
$zone=$_POST["zone"];
$consumption=$_POST["consumption"];
$conn=mysqli_connect($host,$user,$pw,$db);
if(!$conn)
{
	die("connection not established".mysqli_error($conn));

}
else
{
	$query="SELECT industry_id,industry_name,industry_ext FROM industry WHERE industry_id='$industry_id'
industry_name='$industry_name'";
	$result=$conn->query($query);
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