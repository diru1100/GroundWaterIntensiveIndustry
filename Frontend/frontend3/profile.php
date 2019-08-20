<?php
  include 'industryafterlogin.php';
?>
<html>
<title>Change Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet"  type="text/css" href="signup.css">
<link href='https://fonts.googleapis.com/css?family=Bubblegum Sans' rel='stylesheet'>
<body>
	<div class="w3-container">
  <h1>Change Password</h1><br>
  <div class="w3-panel w3-card-4" style="background: lightblue;"><br>
    <form method="post" action="includes/signup_inc.php">
    	<span style="font-size: 20px;">Password :</span><input type="password" id="P1" name="password" placeholder="Password" required onfocus="this.value=''" autocomplete="off"><br>
    	<span style="font-size: 20px;">New Password :</span><input type="password" id="P2" name="re-type_password" placeholder="Confirm Password" required   onfocus="this.value=''" autocomplete="off"><br>
    	<span style="font-size: 20px;">Confirm New Password :</span><input type="password" id="P3" name="re-type_password" placeholder="Confirm Password" required onblur="check()"  onfocus="this.value=''" autocomplete="off"><br>
    	<button name="signupbtn">Submit</button><br>
    </form>
</div>
</div>
<script type="text/javascript">
	function check() {
		var P2=document.getElementById('P2').value;
		var P3=document.getElementById('P3').value;
		if (P2!=P3) {
			alert("please check the passwords");
		}
	}
</script>
</body>
</html>
    	
