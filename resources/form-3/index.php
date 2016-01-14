<?php
ob_start();
include 'header.php';
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
         $x=rand(0,6);
         $y=rand(8,15);
         
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
   	   
     
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="../favicon2.ico">
        <link  rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat' >
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css"/>
      
       
        <title></title>
         
    </head>
    <body>
     
    <div class="content" id="map-canvas"> <center>If the map does not load check your internet connection and reload the page!</center></div>
    <div class="container">
              <div class="alert alert-warning" role="alert" id="error"><h3>Ooops! some data is missing!</h3> </div>
    </div>
    <br>
    <br>
    
    <br>
    <br>   
  <div class="filter-body">
    <br>
    <div class="container">
     <div class="row container-fluid">
       
            <div class=" col-lg-4"><center><span></span></center></div>
            <form action="search.php" method="GET" class="submitter">
            <div class="col-lg-4 filter-label col-sm-3 col-xs-3"><center><span>Filter</span></center></div>
            <div class="col-lg-4"><center><span></span></center></div>
       
     </div>
     
      
      
      
       <div class="container-fluid filter">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon">$</span> <input class=
                    "form-control" id="top-range" name="toprange" placeholder=
                    "Price range" type="text">
                </div>
                <!-- /input-group -->
            </div>
            <!-- /.col-lg-6 -->


            <div class="col-lg-2 col-sm-6">
                <span class="to"></span>

                <center>
                    <span class="to">TO</span>
                </center>
            </div>


            <div class="col-lg-5 col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon">$</span> <input class=
                    "form-control" id="bottom-range" name="bottomrange"
                    placeholder="Price range" type="text">
                </div>
            </div>
            <br>


            <div class="col-lg-7">
                <select id="accomodation" name="accomodation">
                    <option value="Single">
                        Single
                    </option>

                    <option value="Shared">
                        Shared
                    </option>
                </select>
            </div>
            <br>


            <div class="col-lg-5">
                <select id="vicinity" name="vicinity">
                    <option disabled selected>
                        Vicinity
                    </option>

                    <option value="Gordon Town">
                        Gordon Town
                    </option>

                    <option value="Tavern">
                        Tavern
                    </option>

                    <option value="Elliston Flats">
                        Elliston Flats
                    </option>

                    <option value="Golding Circle">
                        Golding Circle
                    </option>

                    <option value="Mona">
                        Mona
                    </option>
                </select>
            </div>
            <br>


            <div class="col-lg-12 col-sm-6">
                <input class="btn btn-default search" type="submit" value=
                "Search">
            </div>
            <!--dropdown button-->
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

    <div class="container-fluid">
      
      <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src=<?php echo "../../uploads/".$images_holder[0]?> alt="...">
      <div class="caption">
        <h3><span class="price">$<?php echo $price[0]?></span></h3>
         <p><span class="titled">Location:<?php echo $location[0]?></span></p>
        
         <p><span class="titled">Accomodation:<?php echo $single_shared[0]?></span></p>
         <p><span class="titled">Telephone: <?php echo $telephone[0]?></span></p>
        
       
      </div>
    </div>
  </div>
  
  
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src=<?php echo "../../uploads/".$images_holder[1]?>  alt="...">
      <div class="caption">
         <h3><span class="price">$<?php echo $price[1]?></span></h3>
        <p><span class="titled">Location: <?php echo $location[1]?></span></p>
        
         <p><span class="titled">Accomodation: <?php echo $single_shared[1]?></span></p>
         <p><span class="titled">Telephone:  <?php echo $telephone[1]?></span></p>
        
       
       
      </div>
    </div>
  </div>
  

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src=<?php echo "../../uploads/".$images_holder[2]?>  alt="...">
      <div class="caption">
        <h3><span class="price">$<?php echo $price[2]?></span></h3>
        <p><span class="titled">Location: <?php echo $location[2]?></span></p>
        
         <p><span class="titled">Accomodation: <?php echo $single_shared[2]?></span></p>
         <p><span class="titled">Telephone:  <?php echo $telephone[2]?></span></p>
        
       
       
      </div>
    </div>
  </div>
    </div> 
      
    
   
  
    <style type="text/css">
/*marker customization*/
.gm-style-iw + div {display: none;}
.gm-style-iw {
   width: 250px !important;
   top: 15px !important; 
   left: 0 !important;
   background-color: #fff;
   box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
   border: 1px solid rgba(72, 181, 233, 0.6);
   border-radius: 2px 2px 0 0;
}
/*marker customization*/

.heart{
    position:absolute;
    font-size:3.7em;
    opacity:0.8;
    text-shadow: -2px 0 white, 0 2px white, 2px 0 white, 0 -2px white;
    cursor: pointer;
    cursor: hand;
    
}
.heart:hover{
    color: #1e1e15;
}

.info-price{
   
    color:#33CCFF;
    font-size:25px;
    padding:4px;
    font-family: 'Oswald', sans-serif;
}

.info-image{
   
    width:250px;
    height:200px;
}


.alert{
        display:none;
    }
 .thumbnail>img{
 height:200px;
 width:300px;
}
  select{
     -webkit-appearance: menulist-button;
   height: 30px;
  
  }
 
 .titled{
   font-family: 'Oswald', sans-serif;
 }
      
    .top-of-filter{
       background-color:#F5FFFF;
       border-radius:10px;
    }
   .filter-label{
     font-size:30px;
     border-top-left-radius:6px;
     border-top-right-radius:6px;
        padding:3px;
        background-color:#fff;
         border-top:1px solid #E6E6E6;
         border-left:1px solid #E6E6E6;
         border-right:1px solid #E6E6E6;
       
    }
    .to{
      font-size:25px;
      color:#33CCFF;
    }
    .filter{
       border-top-left-radius:1px;
     border-top-right-radius:6px;
      padding:4px;
       background-color:#fff;
         border:1px solid #E6E6E6;
    }
   
        .content{
            height:400px;
           
        }
        .filter-body{
          background-color:#fff;
        
       
        }
        .price{
        font-family: 'Oswald', sans-serif;
          color:#33CCFF;
        }
    </style>
    
    
   
    
      <script src="../../js/jquery.js"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script>
// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.

var map;
var markers = [];
var coordsLat=[],coordsLong=[],price=[],accomodation=[];
var inn=0;
function mouseIn(){
     $(this).css('color','red')
    
}

function mouseOut(){
     $(this).css('color','grey')
}

function initialize() {
  var pos = new google.maps.LatLng(18.0104288,-76.741323);
  var mapOptions = {
    zoom: 13,
    center: pos,
    scrollwheel: false,
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // This event listener will call addMarker() when the map is clicked.
 /* google.maps.event.addListener(map, 'click', function(event) {
    addMarker(new google.maps.LatLng(18.0105042940437,
    -76.71976089477539
        ));
    
  });*/

  
$(document).ready(function(){
    setTimeout(function(){
    addMarker(coordsLat,coordsLong,price,accomodation);
    setAllMap(map);
     
    },1000)
    
    google.maps.event.addListener(map, "click", function(event) {
    for (var i = 0; i < markers.length; i++ ) {  //I assume you have your infoboxes in some array
         markers[i].infowindow.close();
    }
});
    
    
});

  // Adds a marker at the center of the map.

}

var image="../images/testmarkr.png"

// Add a marker to the map and push to the array.

function addMarker(coordsLat,coordsLong,price,accomodation) {
   
   
   for(var i=0;i<coordsLat.length;i++)
   {
   
    var location=new google.maps.LatLng(Number(coordsLat[i]),Number(coordsLong[i]));
    var marker = new google.maps.Marker({
    position: location,
    map: map,
    infowindow:new google.maps.InfoWindow({content:"<div><span class='glyphicon glyphicon-heart heart'></span><img class='info-image' src='../images/info-img.jpg'/><div class='info-price'> $"+price[i]+"</div>"+"</div>"+"Accomodation: "+accomodation[i]})
   
      
  });
  
  google.maps.event.addListener(marker.infowindow, 'domready', function() {
      /*marker customization*/
      var iwOuter = $('.gm-style-iw');

   /* The DIV we want to change is above the .gm-style-iw DIV.
    * So, we use jQuery and create a iwBackground variable,
    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
    */
   var iwBackground = iwOuter.prev();

   // Remove the background shadow DIV
   iwBackground.children(':nth-child(2)').css({'display' : 'none'});

   // Remove the white background DIV
   iwBackground.children(':nth-child(4)').css({'display' : 'none'});
   iwOuter.parent().parent().css({left: '55px'});
   iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 85px !important;'});

// Moves the arrow 76px to the left margin 
iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 85px !important;'});

iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});



    /*marker customization*/
      
     
      $(".heart").on('click',function(){
         
        $(this).css('color','red')
});
    
});

  
     markers.push(marker); 
     
     markers[i].addListener('click',function(){
         this.infowindow.open(map,this);
     })
 
   }
 

}

$(document).ready(function(){
    $.ajax({
       url:"getcoords.php",
       type:'POST',
       success:function(response){
        console.log(response[0]);
           coordsLat=response[0];
           coordsLong=response[1];
           price=response[2];
           accomodation=response[3];
           
       }
    });
});
/*$(document).ready(function(){setTimeout(function(){
   console.log(coordsLat) ;
},5000)})*/

// Sets the map on all markers in the array.
function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setAllMap(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setAllMap(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    </body>
</html>

