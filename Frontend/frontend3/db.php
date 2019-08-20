<?php
session_start();
$dbservername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="industry";
$conn=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);