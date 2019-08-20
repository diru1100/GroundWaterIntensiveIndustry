<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet"  type="text/css" href="header.css">
</head>
<body>
  <header>
<div class="container">

  <h1 class="logo">Minsitry of Water Resources<span></span></h1>
  <a href="login.html" >login |</a>
  <a href="register.html"> Register</a> 
  
  <nav class="site-nav">
      <ul>
        <li><a href=""><i class="fa fa-home site-nav--icon"></i>About</a></li> 
        <li><a href=""><i class="fa fa-info site-nav--icon"></i></a>Industries</li>
        <li><a href=""><i class="fa fa-pencil site-nav--icon"></i>Report</a></li>
        <li><a href=""><i class="fa fa-usd site-nav--icon"></i></a>Maps</li>
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