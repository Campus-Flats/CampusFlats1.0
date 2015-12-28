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
         $x=rand(0,3);
         $y=rand(5,10);
         
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
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name=
    "viewport">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel=
    'stylesheet' type='text/css'>
    <link href="../favicon2.ico" rel="shortcut icon">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel=
    'stylesheet' type='text/css'>
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="../../js/jquery.js">
    </script>

    <title>
    </title>
</head>

<body>
    <div class="content" id="map-canvas">
        <center>
            If the map does not load check your internet connection and reload
            the page!
        </center>
    </div>


    <div class="container">
        <div class="alert alert-warning" id="error" role="alert">
            <h3>Ooops! some data is missing!</h3>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>


    <div class="filter-body">
        <br>


        <div class="container">
            <div class="row container-fluid">
                <div class=" col-lg-4">
                    <center>
                        <span></span>
                    </center>
                </div>


                <form action="search.php" class="submitter" method="get">
                    <div class="col-lg-4 filter-label col-sm-3 col-xs-3">
                        <center>
                            <span>Filter</span>
                        </center>
                    </div>


                    <div class="col-lg-4">
                        <center>
                            <span></span>
                        </center>
                    </div>
                </form>
            </div>


            <div class="container-fluid filter">
                <div class="row">
                    <div class="col-lg-5 col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input class="form-control" id="top-range" name=
                            "toprange" placeholder="Price range" type="text">
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
                            <span class="input-group-addon">$</span>
                            <input class="form-control" id="bottom-range" name=
                            "bottomrange" placeholder="Price range" type=
                            "text">
                        </div>
                    </div>
                    <br>
                     <br>

            
                   
                    <div class="col-lg-5">
                       
                            <div class="input-group">
                                 <span class="input-group-addon" id="sizing-addon2">Location</span>
                                 <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
                            </div>
                        <!--<select id="vicinity" name="vicinity">
                          <option selected disabled>Vicinity</option>
                          <option value="Gordon Town">Gordon Town</option>
                          <option value="Tavern">Tavern</option>
                          <option value="Elliston Flats">Elliston Flats</option>
                          <option value="Golding Circle">Golding Circle</option>
                          <option value="Mona">Mona</option>
      
                       </select>-->
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


                    <div class="col-lg-12 col-sm-6">
                        <input class="btn btn-default search" type="submit"
                        value="Search">
                    </div>
                    <!--dropdown button-->
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>


    <div class="container-fluid">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src=<?php echo "../../uploads/".$images_holder[0]?>  alt="...">
                <div class="caption">
                    <h3><span class="price">$<?php echo $price[0]?></span>
                    </h3>


                    <p><span class=
                    "titled">Location:<?php echo $location[0]?></span>
                    </p>


                    <p><span class=
                    "titled">Accomodation:<?php echo $single_shared[0]?></span>
                    </p>


                    <p><span class="titled">Telephone:
                    <?php echo $telephone[0]?></span>
                    </p>
                </div>
            </div>
        </div>


        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                 <img src=<?php echo "../../uploads/".$images_holder[1]?>  alt="...">

                <div class="caption">
                    <h3><span class="price">$<?php echo $price[1]?></span>
                    </h3>


                    <p><span class="titled">Location:
                    <?php echo $location[1]?></span>
                    </p>


                    <p><span class="titled">Accomodation:
                    <?php echo $single_shared[1]?></span>
                    </p>


                    <p><span class="titled">Telephone:
                    <?php echo $telephone[1]?></span>
                    </p>
                </div>
            </div>
        </div>


        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                 <img src=<?php echo "../../uploads/".$images_holder[2]?>  alt="...">

                <div class="caption">
                    <h3><span class="price">$<?php echo $price[2]?></span>
                    </h3>


                    <p><span class="titled">Location:
                    <?php echo $location[2]?></span>
                    </p>


                    <p><span class="titled">Accomodation:
                    <?php echo $single_shared[2]?></span>
                    </p>


                    <p><span class="titled">Telephone:
                    <?php echo $telephone[2]?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

   
  
    <style type="text/css">
.alert {
    display: none;
}

.thumbnail>img {
    height: 200px;
    width: 300px;
}

select {
    -webkit-appearance: menulist-button;
    height: 30px;
}

.titled {
    font-family: 'Oswald',sans-serif;
}

.top-of-filter {
    background-color: #F5FFFF;
    border-radius: 10px;
}

.filter-label {
    font-size: 30px;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
    padding: 3px;
    background-color: #fff;
    border-top: 1px solid #E6E6E6;
    border-left: 1px solid #E6E6E6;
    border-right: 1px solid #E6E6E6;
}

.to {
    font-size: 25px;
    color: #3CF;
}

.filter {
    border-top-left-radius: 1px;
    border-top-right-radius: 6px;
    padding: 4px;
    background-color: #fff;
    border: 1px solid #E6E6E6;
}

.content {
    height: 400px;
}

.filter-body {
    background-color: #fff;
}

.price {
    font-family: 'Oswald',sans-serif;
    color: #3CF;
}
    </style>
    
    
   
  
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<script>
// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var markers = [];
var coordsLat = [],
    coordsLong = [],
    price = [],
    accomodation = [];
var inn = 0;

function initialize() {
    var pos = new google.maps.LatLng(18.0104288, -76.741323);
    var mapOptions = {
        zoom: 13,
        center: pos,
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
    $(document).ready(function() {
        setTimeout(function() {
            addMarker(coordsLat, coordsLong, price,
                accomodation);
            setAllMap(map);
        }, 1000)
    });
    // Adds a marker at the center of the map.
}
var image = "../images/testmarkr.png"
    // Add a marker to the map and push to the array.

function addMarker(coordsLat, coordsLong, price, accomodation) {
    console.log("coords");
    for (var i = 0; i < coordsLat.length; i++) {
        var location = new google.maps.LatLng(Number(coordsLat[i]), Number(coordsLong[i]));
        console.log("problemm");
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            infowindow: new google.maps.InfoWindow({
                content: "<div> Price: " + price[i] +
                    "</div>" + "Accomodation: " +
                    accomodation[i]
            })
        });
        markers.push(marker);
        markers[i].addListener('click', function() {
            this.infowindow.open(map, this);
        })
    }
}
$(document).ready(function() {
    $.ajax({
        url: "getcoords.php",
        type: 'POST',
        success: function(response) {
            console.log(response[0]);
            coordsLat = response[0];
            coordsLong = response[1];
            price = response[2];
            accomodation = response[3];
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
</html>
