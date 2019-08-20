<?php
  include 'header.php';
?>
<html>
<head>
	<style type="text/css">
		button{
	font-size: 15px;
	border-radius: 3px;
	border:2px solid black;
	padding: 5px;
	width: 200px;
	height:60px;
    
	display: inline;
	margin: 0 auto;
	cursor: pointer;
	background-color: white;
	font-weight: bold;
}
button:hover,button:focus{
	background-color: black;
	color: white;
	transition: all ease-in-out .4s;
	outline: none;
}
.b1{
	position:relative;
	top:60px;
	left:300px;
	
   
	}
.b2{
    
    position:relative;
	top:50px;
	left:600px;
}	
	</style>

	
</head>
<body>
	<br>
	<form action="highcon.php">
	<div class="options" >
		<select name="type" id="type" style=" position:relative; display:inline;width: 10%; padding: 2px 10px;left:150px;background-color: #e5e8e7; font-size: 20px;">
        <option value="">State</option>
        <option value="user">User</option>
        <option value="owner">Owner</option>
      </select>
       <select style=" left:20px ;position:relative;background-color: #e5e8e7; font-size: 20px;padding: 2px 10px;  left:400px; width: 10%;" onChange="getdistrict(this.value);"  name="state" id="state" class="form-control" >
        <option value="">District</option>
    </select>
    <select style="width: 10%;position:relative;background-color: #e5e8e7; font-size: 20px; padding: 2px 10px; left:650px;" name="district" id="district-list" class="form-control">
        <option value="">zone</option>
      </select>
  </div>
  <br>
  
			<button name="list" class="b1" onclick="">List Of Industries</button>
  
  

			<button name="high"  class="b2" onsubmit="myfunction()">High Ground water consumption industries</button>
	
<div id="display">

</div>

  
</form>
</body>
</html>
