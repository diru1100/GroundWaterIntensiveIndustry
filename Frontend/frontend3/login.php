<?php
  include 'header.php';
?>

<html>
<title>login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" media="screen and (min-width:700px)" type="text/css" href="login.css">
<link href='https://fonts.googleapis.com/css?family=Bubblegum Sans' rel='stylesheet'>
<body>

<div class="w3-container"><br><br>
  <h1>Login</h1><br>
  <div class="w3-panel w3-card-4"><br>
  	<svg width="45" height="45" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
      <path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0
       26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72
        72-72s72 32.3 72 72v72z"/></svg>
      <br><br>
  	<form method="POST" action="login_inc.php">
  		<input type="text" name="login_username" placeholder="Username" required onfocus="this.value=''" autofocus="autofocus" autocomplete="off"><br>
  		<input type="password" name="login_password" placeholder="Password" required onfocus="this.value=''" autocomplete="off"><br><?php
      if(isset($_GET['login']))
      {
        echo "<p>invalid username or password</p>";
      }
      ?><br>
  		<button name="login">Login</button>
  	</form>
  </div>
</div>

</body>
</html>
