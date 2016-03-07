<?php



?>
<!DOCTYPE html>
<html>
 <head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   	   
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="materialize/css/materialize.css" type="text/css" />
        <link rel="stylesheet" href="materialize/extras/nouislider.css" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5G9JFJu-6F4zbj3POdmAVGDi2mCQ7coE&callback=initMap"></script>
  <title></title>
 </head>
 <body>



<!--_______________________________NAVBAR_______________________________________ -->    
<nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">Campusflats</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse" ><i class="material-icons">menu</i></a>
      
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"></a></li>
        <li><a href="badges.html">Compare</a></li>
        <li><a href="collapsible.html">Login</a></li>
        <li><a href="mobile.html">Register</a></li>
         <li><a href="mobile.html">Logged in name</a></li>
      </ul>
       
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
    </div>
</nav>
<!--_______________________________NAVBAR_______________________________________ -->



  
<!--__________________________________________TABS_______________________________________________________-->

  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3 "><a class="active" href="#add-prop">Add Property</a></li>
        <li class="tab col s3"><a class="active" href="#view-prop">View Properties</a></li>
      </ul>
    </div>
    <div class="space"></div>
    <!----------------------------------------ADD PROPERTY------------------------------------------------->
    <div id="add-prop" class="col s12">
     
           <p><center><span class="map-label">Click to <span class="color">ADD MARKER</span> to the community in which your home is located.</span></center></p>
           
           <div id="map"></div>
           
           <div class="input-field col s12">
              <input id="location" type="text" class="validate">
              <label for="location">Location</label>
            </div>
            
            
            <div class="input-field col s12 l6">
              <input id="telephone" type="text" class="validate">
              <label for="telephone">Telephone</label>
            </div>
       
     
    </div>
    <!----------------------------------------ADD PROPERTY------------------------------------------------->
    
    
    
    
    
    
    <!------------------------------------------VIEW PROPERTY---------------------------------------------->
    <div id="view-prop" class="col s12">Test 2</div>
    <!------------------------------------------VIEW PROPERTY---------------------------------------------->
 </div>
 
<!--__________________________________________TABS_______________________________________________________-->
 
 
 
 
 
 
 
<!--_____________________________________JAVASCRIPT FILES___________________________________________-->

<script src="../../js/jquery.js"></script>
<script type="text/javascript" src="materialize/js/materialize.js"></script>

<!--_____________________________________JAVASCRIPT FILES___________________________________________-->









<!------------------------------------------------------------CSS RULES------------------------------------------------------->
<style type="text/css">
.input-field input[type=text]:focus {
     border-bottom: 1px solid #33CCFF;
     box-shadow: 0 1px 0 0 #33CCFF;
   }
.space{
    padding:30px;
    height:100px;
}
.color{
    color:#33CCFF;
}
.map-label{
    color:#8c8c8c;
    padding-top:20px;
    font-weight:bold;
}

.tabs .indicator { 
    background-color:#33CCFF;
}
.tabs .tab a {
  color:#33CCFF;
}
.nav-wrapper{
	background-color:#33CCFF;
}
.tabs .tab a:hover {
  color: #0099ff;
}
#map{
    height:400px;
}

@media only screen and (min-width: 320px) and (max-width: 480px) {
  #map {
    height:300px;
  }
 .space{
     height:70px;
 }
}
</style>

<!------------------------------------------------------------CSS RULES------------------------------------------------------->








<!--------------------------------------------------JAVASCRIPT FUNCTIONS AND INITIALIZATIONS----------------------------------->
<script type="text/javascript">
$(".button-collapse").sideNav();
 $(document).ready(function(){
    $('ul.tabs').tabs();
  });
</script>

<!--------------------------------------------------JAVASCRIPT FUNCTIONS AND INITIALIZATIONS----------------------------------->










<!--_______________________________GOOGLE MAPS________________________________________ -->
<script type="text/javascript">

    var map;
       var jamaica = new google.maps.LatLng(18.0104288,-76.741323);
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: jamaica,
          zoom: 13,
          styles:[{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}],

        });
      }
      

   google.maps.event.addDomListener(window, 'load', initMap);   
</script>
<!--_______________________________GOOGLE MAPS________________________________________ -->





 </body>
</html>