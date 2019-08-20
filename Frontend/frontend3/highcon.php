
<?php
$host="localhost";
$user="root";
$pw="";
$db="ground_water";

$conn = mysqli_connect($host,$user,$pw,$db);
if(!$conn){
	die("Connection not established:".mysqli_error());
}
else{

	function myfunction(){
	$sql1 = "SELECT industry_id,industry_name,industry_ext from industry where industry_ext > 200000";
	$result1 = $conn->query($sql1);
	$solution = array();

	if($result1->num_rows >0){
		while($row=$result1->fetch_assoc()){
			$solution[]=([$row['industry_id'],$row['industry_name'],$row['industry_ext']]);	
		}
	}
	else{
		echo "0 results";
	}
	echo "<table border=2>";
	for($i=0;$i<COUNT($solution);$i++){
		echo "<tr>";
		$str = implode("	",$solution[$i]);
		$exp = explode("	",$str);
		for($j=0;$j<COUNT($exp);$j++){
			echo "<td>".$exp[$j]."</td>";
		}

		echo "</tr>";
	}
	echo "</table>";
}
	
}
?>