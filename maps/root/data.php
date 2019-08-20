<?php

$dbservername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="water";

$conn=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
   if(!$conn) {
      echo "Error : Unable to open database\n";
    $error = error_get_last();
    echo "Connection failed. Error was: ". $error['message']. "\n";
      
   } else {
      //echo "Opened database successfully\n";
   }
   
   $sql =<<<EOF
      SELECT * from Industry;
EOF;

   $ret = mysqli_query($conn, $sql);
   if(!$ret) {
      echo mysqli_error($conn);
      exit;
   }
 
    

   $results = array();
   while($row = mysqli_fetch_row($ret)) {
        $obj = array();
        $obj["INDUSTRY_NAME"] = $row[1];
        $obj["LANGITUDE"] = $row[2];
        $obj["LONGITUDE"] = $row[3];
        $obj["ANNUAL_CONSUMPTION"] = $row[4];
        $obj["GROUND_WATER_LEVEL_1"] = $row[5];
        $obj["GROUND_WATER_LEVEL_2"] = $row[6];
        array_push($results, $obj);
   }
   echo json_encode($results);
   //echo "Operation done successfully\n";
   //pg_close($db);   
?>
