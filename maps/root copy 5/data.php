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
   
   $sql=" SELECT * from Industry";
   $sql1=" SELECT * from Zone";
   $sql2=" SELECT * from District";
 


   $ret = mysqli_query($conn, $sql);
   if(!$ret) {
      echo mysqli_error($conn);
      exit;
   }

   $ret1 = mysqli_query($conn, $sql1);
   if(!$ret1) {
      echo mysqli_error($conn);
      exit;
   }
    $ret2 = mysqli_query($conn, $sql2);
   if(!$ret2) {
      echo mysqli_error($conn);
      exit;
   }
 
    

   $results = array();
   while($row = mysqli_fetch_row($ret)) {
        $obj = array();

        $obj["LATITUDE"] = $row[2];
        $obj["LONGITUDE"] = $row[3];
        $obj["LIMIT"] = $row[4];
        $obj["EXTRACTION"] = $row[5];

        array_push($results, $obj);
   }
   // echo json_encode($results);
$results1 = array();
   while($row1 = mysqli_fetch_row($ret1)) {
        $obj1 = array();

        $obj1["LATITUDE"] = $row1[2];
        $obj1["LONGITUDE"] = $row1[3];
        $obj1["RATIO"] = $row1[6];

        array_push($results1, $obj1);
   }
  $results2= array();
   while($row2 = mysqli_fetch_row($ret2)) {
        $obj2 = array();
        $obj2["D_NAME"] = $row2[1];
        $obj2["LATITUDE"] = $row2[2];
        $obj2["LONGITUDE"] = $row2[3];

        array_push($results2, $obj2);
   }
   echo json_encode(array($results,$results1,$results2));
?>
