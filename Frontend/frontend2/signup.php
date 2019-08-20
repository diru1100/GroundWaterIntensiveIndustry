<?php
  include 'header.php';
?>
<!DOCTYPE html>
<html>
<title>Signup</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet"  type="text/css" href="signup.css">
<link href='https://fonts.googleapis.com/css?family=Bubblegum Sans' rel='stylesheet'>
<body>
<div class="w3-container">
  <h1>Sign Up</h1><br>
  <div class="w3-panel w3-card-4" style="background: lightblue;"><br>
    <form method="post" action="includes/signup_inc.php">
    	<span style="font-size: 20px;">Username :</span><input type="text" name="username" placeholder="Username" required onfocus="this.value=''" autofocus="autofocus"
       autocomplete="off"><br>
    	<span style="font-size: 20px;">Password :</span><input type="password" id="P1" name="password" placeholder="Password" required onfocus="this.value=''" autocomplete="off"><br>
    	<span style="font-size: 20px;">Confirm Password :</span><input type="password" id="P2" name="re-type_password" placeholder="Confirm Password" required onblur="check()"  onfocus="this.value=''" autocomplete="off"><br>
    	<span style="font-size: 20px;">Email :</span><input type="email" name="email" placeholder="Email" required onfocus="this.value=''" autocomplete="off"><br>
      <span style="font-size: 20px;">State :</span><select name="type" id="type" style="display: table;margin: 0 auto;width: 70%;">
        <option value="">Select</option>
        <option value="user">User</option>
        <option value="owner">Owner</option>
      </select>
      <br>
      <?php require_once("config.php"); ?>
      <span style="font-size: 20px;">District :</span><select style="display: table;margin: 0 auto;width: 70%;" onChange="getdistrict(this.value);"  name="state" id="state" class="form-control" ><br>
        <option value="">Select</option>
        <?php $query =mysqli_query($con,"SELECT * FROM state");
          while($row=mysqli_fetch_array($query))
          { ?>
            <option value="<?php echo $row['StCode'];?>"><?php echo $row['StateName'];?></option>
          <?php
          }
          ?>
      </select>
      <?php
        require_once("config.php");
        if(!empty($_POST["state_id"]))
        {
        $query =mysqli_query($con,"SELECT * FROM district WHERE StCode = '" . $_POST["state_id"] . "'");
        ?>
        <option value="">Select District</option>
        <?php
        while($row=mysqli_fetch_array($query))
        {
        ?>
        <option value="<?php echo $row["DistrictName"]; ?>"><?php echo $row["DistrictName"]; ?></option>
        <?php
        }
        }
      ?>
      <br>
      <span style="font-size: 20px;">Zone :</span><select style="display: table;margin: 0 auto;width: 70%;" name="district" id="district-list" class="form-control">
        <option value="">Select</option>
      </select>
      <br><br>
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
<script>
function getdistrict(val) {
$.ajax({
type: "POST",
url: "get_district.php",
data:'state_id='+val,
success: function(data){
$("#district-list").html(data);
}
});
}

</script>
</body>
</html>
