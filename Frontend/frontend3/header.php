<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet"  type="text/css" href="header.css">
</head>
<body>
<div style="width:1020px;margin:0 auto"><img src="images/logo.png" /></div>
  <header>
  
<div class="container">

  <h1 class="logo"><a href="index.php" style="    color: #fff;    font-size: 24px;    text-decoration: none;">Ministry of Water Resources</a><span></span></h1>
  
  <nav class="site-nav">
      <ul>
        <li><a href="index1.php"><i class="fa fa-home site-nav--icon"></i>Home</a></li> 
        <li><a href="about.php"><i class="fa fa-info site-nav--icon"></i>About</a></li>
        <li><a href="industry.php"><i class="fa fa-pencil site-nav--icon"></i>Industries</a></li>
        <li><a href="map.php"><i class="fa fa-usd site-nav--icon"></i>Map</a></li>
        <li><a href=""><i class="fa fa-envelope site-nav--icon"></i>Report</a></li>
      </ul> 
  </nav>
  
  <div class="menu-toggle">
    <div class="hamburger"></div>
  </div>
  
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
</body>
</html>