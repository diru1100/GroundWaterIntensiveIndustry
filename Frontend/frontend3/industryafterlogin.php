<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet"  type="text/css" href="header.css">
  <style type="text/css">
    
    .nav ul {
  list-style: none;
  background-color:#232222;
  text-align: center;
  padding: 2;
  margin: 0;
  margin-left: 200px;
  margin-right: 200px;
  border-bottom-style: groove;
  border-bottom-right-radius:40px;
  border-bottom-left-radius:40px;

}
.nav li {
  font-family: 'Oswald', sans-serif;
  font-size: 1.2em;
  line-height: 40px;
  height: 40px;
  border-bottom: 1px solid #888;
}
 
.nav a {
  text-decoration: none;
  color: #fff;
  display: block;
  transition: .3s background-color;
}
 
.nav a:hover {
  background-color: #005f5f;
}
 
.nav a.active {
  background-color: #fff;
  color: #444;
  cursor: default;
}
 
@media screen and (min-width: 600px) {
  .nav li {
    width: 120px;
    border-bottom: none;
    height: 50px;
    line-height: 50px;
    font-size: 1.4em;
  }
 
  /* Option 1 - Display Inline */
  .nav li {
    display: inline-block;
    margin-right: -4px;
  }
  </style>
</head>
<body>
  <header>
<div class="container">

  <h1 class="logo">Ministry of Water Resources<span></span></h1>
  
  <a href="index1.php" style="text-decoration: none;float: right;color: white;padding-right: 10px;">Logout</a>
 <!--<nav class="site-nav">
      <ul>
        <li><a href="index1.php"><i class="fa fa-home site-nav--icon"></i>Home</a></li> 
        <li><a href="about.php"><i class="fa fa-info site-nav--icon"></i>About</a></li>
        <li><a href="industry.php"><i class="fa fa-pencil site-nav--icon"></i>Industries</a></li>
        <li><a href=""><i class="fa fa-usd site-nav--icon"></i>Map</a></li>
        <li><a href=""><i class="fa fa-envelope site-nav--icon"></i>Report</a></li>
      </ul> 
  </nav>
  
  <div class="menu-toggle">
    <div class="hamburger"></div>
  </div>
  -->
</div>

</header>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script>
    $('.menu-toggle').click(function(){
      $('.site-nav').toggleClass('site-nav--open',500);
      $(this).toggleClass("open");
    });
  </script>
<nav class="navoption">
<div class="nav">
  <ul>
    <li class="Maps"><a href="industryafterlogin.php" >  Home </a></li>
        
    <li ><a name="profile" class="about"  href="profile1.php">  Profile  </a></li>
        <li ><a name="setting" class="ind" href="profile.php" >  Settings  </a></li>
        <li class="Maps"><a name="update" href="update.php" >  Update </a></li>
              
  
      </ul>
</div>
</nav>
  
</body>
</html>