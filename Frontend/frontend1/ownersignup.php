<?php
  include 'header.php';
?>
<!DOCTYPE html>
<html>
<title>Signup</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" media="screen and (min-width:700px)" type="text/css" href="signup.css">
<link href='https://fonts.googleapis.com/css?family=Bubblegum Sans' rel='stylesheet'>
<body>
<div class="w3-container">
  <h1>Sign Up</h1><br>
  <div class="w3-panel w3-card-4"><br>
    <form method="post" action="includes/signup_inc.php">
  	<input type="text" name="username" placeholder="Username" required onfocus="this.value=''" autofocus="autofocus"
     autocomplete="off"><br>
  	<input type="password" id="P1" name="password" placeholder="Password" required onfocus="this.value=''" autocomplete="off"><br>
  	<input type="password" id="P2" name="re-type_password" placeholder="Re-Type Password" required onblur="check()" onfocus="this.value=''" autocomplete="off"><br>
  	<input type="email" name="email" placeholder="Email" required onfocus="this.value=''" autocomplete="off"><br><br>
  	<button name="signupbtn">Sign Up</button><br>
    </form>
  </div>
</div>
<script type="text/javascript">
	function check() {
		var P1=document.getElementById('P1').value;
		var P2=document.getElementById('P2').value;
		if (P1!=P2) {
			alert("please check the passwords");
		}
	}
</script>
</body>
</html>
