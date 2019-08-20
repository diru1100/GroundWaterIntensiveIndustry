<?php
$conn=mysqli_connect("localhost","root","","water");
$sql1="select  count(Z_ID) FROM Zone where  RATIO <70 AND D_ID=1";
$sql2="select count(Z_ID) FROM Zone where  RATIO between 70 and 90 AND D_ID=1";
$sql3="select count(Z_ID) FROM Zone where  RATIO between 90 and 100 AND D_ID=1";
$sql4="select count(Z_ID) FROM Zone where  RATIO >100 AND D_ID=1";
$row1=mysqli_query($conn,$sql1);
$sol1=array();
if($row1==true){
$play1 =$row1->fetch_ASSOC();
$sol1=$play1['count(Z_ID)'];
}
echo $sol1;
$row2=mysqli_query($conn,$sql2);
$sol2=array();
if($row2==true){
$play2 =$row2->fetch_ASSOC();
$sol2=$play2['count(Z_ID)'];
}
echo $sol2;

$row3=mysqli_query($conn,$sql3);
$sol3=array();
if($row3==true){
$play3=$row3->fetch_ASSOC();
$sol3=$play3['count(Z_ID)'];
}
$row4=mysqli_query($conn,$sql4);
$sol4=array();
if($row4==true){
$play4 =$row4->fetch_ASSOC();
$sol4=$play4['count(Z_ID)'];
}

echo $sol3;
echo $sol4;
$sol5=$sol1+$sol2+$sol3+$sol4;

$dataPoints = array( 
	array("label"=>"semicritical", "y"=>$sol1*100/$sol5),
	array("label"=>"critical", "y"=>$sol2*100/$sol5),
	array("label"=>"over_exploited", "y"=>$sol3*100/$sol5),
	array("label"=>"safe", "y"=>$sol4*100/$sol5)
)
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "categorized zone view"
	},
	data: [{
		type: "pie",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                    