<?php
ob_start();

$buffer=ob_get_contents();
ob_end_clean();
$buffer=str_replace("..title..","Campus Flats-Saved places",$buffer);
echo $buffer;

?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" href="materialize/css/materialize.css" type="text/css" />
	</head>
	
	
<body>

<nav>

    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse" ><i class="material-icons mdi-navigation-menu"></i></a>
      	<div class="container">
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
        </div>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
    </div>
  
  </nav>

  
	<script src="../../js/jquery.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.js"></script>
<style type="text/css">
.brand-logo{
		background-image: url(../images/logo.png) !important; background-repeat: no-repeat !important; background-size: 123px 49px !important;
    height:60px;
    	width: 123px;
/*	background: url(../images/logo.png) left center no-repeat;*/
	text-indent: -99999px;
	margin-top: 17px;
	margin-left:10px;
}

.nav-wrapper{
	background-color:#33CCFF;
}
  
</style>
	</body>
</html>