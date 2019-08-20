<?php
$dbservername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="water";

$conn=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
   if(!$conn)
    {
      echo "Error : Unable to open database\n";
    $error = error_get_last();
    echo "Connection failed. Error was: ". $error['message']. "\n";
      
   } 
   else 
   {

    $sql="SELECT * FROM Industry WHERE ANNUAL_CONSUMPTION >20 order by ANNUAL_CONSUMPTION DESC";
    $result=$conn->query($sql);

    if($result==TRUE)
    {
      echo '<table border=1 width=500 title="High Consumption industries" cellspacing = 0>';
      echo '<tr><td border=1 align = center>'.'Industry_id'.'</td><td>'.'INDUSTRY_NAME'.'</td><td>'.'ANNUAL_CONSUMPTION'.'</td><tr>';
      #sno=1;
      while($row = $result->fetch_assoc())
      {
        echo '<tr><td border=1 align = center>'.$row['Industry_id'].'</td><td>'.$row['INDUSTRY_NAME'].'</td><td>'.$row['ANNUAL_CONSUMPTION'].'</td><tr>';

      }   
      echo '</table>';  
    }

    

      //echo "Opened database successfully\n";
   }
  ?>