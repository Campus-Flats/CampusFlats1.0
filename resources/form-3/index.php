<?php
ob_start();
//include 'header.php';
$buffer=ob_get_contents();
ob_end_clean();
$buffer=str_replace("..title..","Campus Flats",$buffer);
echo $buffer;


$servername = '127.0.0.1';
         $name = "jermyhewitt";
         $dbpassword = "";
         $database = "Users";
         $dbport = 3306;
        
        // Create connection
       $db = new mysqli($servername,$name, $dbpassword, $database,$dbport);

    

         // Check connection
         if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
        
         } 
         $x=rand(0,3);
         $y=rand(3,6);
         
       #$sql = "SELECT location,price,single_shared,telephone,uniqueid FROM `flatinfo`";
       $sql = "SELECT location,price,single_shared,telephone,uniqueid FROM `flatinfo` LIMIT $x,$y";
        $query=$db->query($sql);
        $count=0;
        $location=[];
        $price=[];
        $single_shared=[];
        $telephone=[];
        $uniqueid=[];
       while($row=mysqli_fetch_row($query))
       {
           $location[$count]=$row[0];
           $price[$count]=$row[1];
           $single_shared[$count]=$row[2];
           $telephone[$count]=$row[3];
           $uniqueid[$count]=$row[4];
           $count++;
       }
       $img_count=0;
       $images_holder=[];
       
       while($img_count<3)
       {
             $image_fetch= "SELECT image FROM `images` WHERE uniqueid='$uniqueid[$img_count]'";
             $image_query=$db->query($image_fetch);
             $fetched=mysqli_fetch_row($image_query);
             $images_holder[$img_count]=$fetched[0];
             $img_count++;
             
        
       }
       
      
  
       
       
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   	   
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="materialize/css/materialize.css" type="text/css" />
        <title>Test</title>
    </head>
<body>
    
<!--_______________________________NAVBAR_______________________________________ -->    
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
<!--_______________________________NAVBAR_______________________________________ -->


<div class="map z-depth-1" id="map"></div>

<br>
<!--_______________________________FILTER FORM_______________________________________ -->


<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 l12">
          <input placeholder="Search locations" id="first_name" type="text" class="validate">
          <label for="first_name">Location</label>
        </div>
        
        <div class="input-field col s12 l6">
            <select>
              <option value="" disabled selected>Choose your option</option>
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
              <option value="3">Option 3</option>
            </select>
            <label>Materialize Select</label>
        </div>
      
      </div>
    </form>
  </div>
        


<!--_______________________________FILTER FORM_______________________________________ -->






<!--_______________________________CSS RULES________________________________________ -->
<style type="text/css">
#map{
    height:400px;
}
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
.bground{
    height:200px;
    width:200px;
}
</style>
<!--_______________________________CSS RULES________________________________________ -->











<!--_______________________________JAVASCRIPT FILES________________________________________ -->
<script src="../../js/jquery.js"></script>
<script type="text/javascript" src="materialize/js/materialize.js"></script>
<script type="text/javascript"  src="assets/js/jquery.backstretch.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5G9JFJu-6F4zbj3POdmAVGDi2mCQ7coE&callback=initMap"async defer></script>
<!--_______________________________JAVASCRIPT FILES________________________________________ -->









<!--_______________________________JAVASCRIPT FUNCTIONS________________________________________ -->

<script type="text/javascript">
$(".button-collapse").sideNav();


/*DROPDOWN INITIALIZATION*/
$(document).ready(function() {
    $('select').material_select();
  });
/*DROPDOWN INITIALIZATION*/
    
</script>

<!--_______________________________GOOGLE MAPS________________________________________ -->
<script type="text/javascript">
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8,
          styles:[{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}],

        });
      }
</script>
<!--_______________________________GOOGLE MAPS________________________________________ -->


<!--_______________________________JAVASCRIPT FUNCTIONS________________________________________ -->




</body>
</html>

