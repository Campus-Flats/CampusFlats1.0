<?php
//include 'register.php';
session_start();
header('Content-type: text/html; charset=utf-8'); 
if(isset($_SESSION['firstname'])===FALSE&&isset($_SESSION['lastname'])===FALSE )
{
 header('location:login.html');;
}
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
         

   $id=$_SESSION['user_id'];
 $sql = "SELECT `image` from images WHERE id=$id ";
 $sql_listing = "SELECT price,location,telephone,single_shared,sep_all,uniqueid FROM `flatinfo` WHERE id=$id ";
 $price=[];
 $location=[];
 $telephone=[];
 $accomodation=[];
 $sep_all=[];
 $unique=[];
  $listing_query=$db->query($sql_listing);
  $num_rows=mysqli_num_rows($listing_query);
 
 $iter=0;
 while ($row=mysqli_fetch_row($listing_query))
    {
     $price[$iter]=$row[0];
      $location[$iter]=$row[1];
       $telephone[$iter]=$row[2];
        $accomodation[$iter]=$row[3];
         $sep_all[$iter]=$row[4];
          $unique[$iter]=$row[5];
     $iter++;
    }

    $query=$db->query($sql);
    $count=0;
 
   
    
  // echo $third_holder;
?>
<!DOCTYPE html>
<html>
    <head>
      <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
          <link rel="shortcut icon" href="../favicon2.ico">
        <title>CFlats- <?php echo($_SESSION['firstname']." ".$_SESSION['lastname']);?></title>
       <link rel="stylesheet" href="../../css/spinner.css" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
        <link href="../../css/dropzone.css" type="text/css" rel="stylesheet" />
         <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Indie+Flower"/>
         <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"/>
        <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css"/>
           

      
         
    </head>
    <body>
     <div class="container-fluid">
     <div class="se-pre-con loader"></div>
     <!--MODAL-->
    <div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close"><span class="glyphicon glyphicon-remove"></span></a>
		<div class="modalHeader"><h2>Just a bit more...</h2></div>
		<div class="pad">Price</div>
	<div class="input-group pad">
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control" name="mprice" id="mprice">
  <span class="input-group-addon">.00</span>
</div>
	<div class="pad">Accomodation</div>

<select id="marker-details" name="marker-details" class="pad">
     <option value="Single">Single</option>
      <option value="Shared">Shared</option>
       <option value="Single and Shared">Single and Shared</option>
      
  </select>
  <br>

  <div class="pad"> <button class="btn btn-default pad" id="coords">Save</button></div>
 
		</div>
</div>
     <!--END OF MODAL-->
     
     
     <!--DELETE MODAL-->
 
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="titled"><center><h4 class="modal-title" id="myModalLabel">Do you wish to delete this posting?</h4></center></span>
                  </div>
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger del left" data-dismiss="modal"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                  </div>
                </div>
              </div>
          </div>

        
     <!--END OF DELETE MODAL-->

     <!--UPDATE MODAL-->
          <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <span class="titled"><center><h4 class="modal-title" id="myModalLabel">Update Entry</h4></center></span>
                </div>
                <div class="modal-body">
                     <div class="input-group"><span class="input-group-addon" id="sizing-addon2">$ Price</span>
                     <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
                     </div>


                     <div class="input-group"><span class="input-group-addon" id="sizing-addon2">876</span>
                     <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
                     </div>

                     <div class="input-group"><span class="input-group-addon" id="sizing-addon2">@</span>
                     <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
                     </div>

                     <div class="input-group"><span class="input-group-addon" id="sizing-addon2">@</span>
                     <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
                     </div>

                     <div class="input-group"><span class="input-group-addon" id="sizing-addon2">@</span>
                     <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
                     </div>


                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-info del left" data-dismiss="modal"><i class="glyphicon glyphicon-pencil"></i> Update</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                </div>
              </div>
            </div>
        </div>
     <!--END OF UPDATE MODAL-->
 
     
        <div>
       <div id="navigation" class="navbar navbar-inverse ">
	      <div class="container-fluid">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
                <a class="navbar-brand" href="home.php"><b>CampusFlats</b></a>	        
            </div>
	        <div class="navbar-collapse collapse" id="navbar-collapse1">
	           <ul class="nav navbar-nav">
	               <li>
                       <a href="https://campusflats-hevongordon.c9.io/cflats/campus-flats/RentersWeb"><i class="fa fa-home"></i> Home</a>
                   </li>
	           </ul>
	           
               
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo($_SESSION['firstname']." ".$_SESSION['lastname']);?><strong class="caret"></strong></a>                  
                        <ul class="dropdown-menu">
                            <li>
                                <a href="logout.php"><i class="fa fa-mail-reply"></i> Logout</a>
                            </li>
                        </ul>
                    </li>	
                    	
                </ul>   
                
	           	           <ul class="nav navbar-nav navbar-right">
	               <li>
                       <a href="home.php"><i class="fa fa-facebook"></i></a>
                       
                   </li>
                    <li>
                       <a href="home.php"><i class="fa fa-twitter"></i></a>
                       
                   </li>
                    <li>
                       <a href="http://instagram.com/mental_giantt">  <i class="fa fa-instagram"></i></a>
                       
                   </li>
	           </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
	    
	    <div class="continer">
	     <div class="row">
	      <div class="col-lg-6 col-sm-6">
<button class="btn btn-default listings" id="outline" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
  View current listings
</button>
</div>
 <div class="col-lg-6 col-sm-6">
</div>
</div>
</div>
<br>
<br>
<br>

     
           


	
</div>
<div class="col-lg-12 col-sm-6 jumbotron"><center>
        <button class="plus btn btn-success btn-lg"><span class="plustext">Add new room</span></button>
        </div>
               <div class="alert alert-warning" id="warn" role="alert"> <center><h3>All fields are required!</h3></center></div>
             
              
   <div class="container-fluid">
	    <div class="row" id="bg">
         <div class="col-sm-6 col-md-4 col-lg-4"><span></span></div>  
         
         
        
           
    <div class="col-sm-6 col-md-4 col-lg-4 container" id="container">
     <div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
   
  </div>
</div>
        <div class="thumbnail">
        
         <form class="form-horizontal upload" method="post" action="upload.php" id="save">
  <div class="form-group">
    <label for="price" class="col-sm-2 control-label ">Price:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" placeholder="price" name="price">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Location:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="location" placeholder="location" name="location">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Tele: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="telephone" placeholder="1876-###-####" name="telephone">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Single:</label>
    <div class="col-sm-10">
     <input type="radio" name="single-shared" id="single" value="single">
    </div>
  </div>
  
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Shared:</label>
    <div class="col-sm-10">
     <input type="radio" name="single-shared" id="shared" value="shared">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">All inclusive</label>
    <div class="col-sm-10">
     <input type="radio" name="sep-all" id="shared" value="All-inclusive">
    </div>
  </div>
   <div class="form-group">
    <label for="sep-util" class="col-sm-2 control-label">Separate Utilities</label>
    <div class="col-sm-10">
     <input type="radio" name="sep-all" id="shared" value="Utilities-seperate">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
         <div class="fileUpload btn btn-primary">
    <span>Upload Photo</span>
    <input type="file" class="upload" name="upload" />
</div>
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>
</form>
            
    </div>
    
     </div>
     </div>
     <div class="alert alert-success" role="alert" id="error"> <center><h3>Your data has been saved!</h3></center></div>
     </div>
              
    </div>
    
   <div class="collapse" id="collapseExample">
  <div class="inner">
  
  </div>
</div>
    <!--end of forms-->

 
  
    <div class="col-lg-12 col-sm-6 jumbotron"><center>
        
     <h2>Show us where the home you are renting is located</h2>
     <h3>(optional)</h3>
    
    <br>
    
    <h3>Tap on your community on the map below then share location of home!</h3></center>
    
    </div>
    <div id="panel">
     <div class="container-fluid"> <a href="#openModal"  class="btn btn-primary pad" >Share</a></div>
      
     
      
      <div class="alert alert-info info" role="alert">...</div>
       <div id="map-canvas"  class="col-lg-12 col-sm-6"></div>
     </div>
    
      

     <!--<div id="footer"  class="col-lg-12 col-sm-6 jumbotron" ></div>-->
        </div>
        </div>
        </div>
  
  
         <script src="../../js/jquery.js"></script>
           <script src="../../js/jquery.liteuploader.js"></script>
             <script src="../../js/progressbar.min.js"></script>
         <script src="assets/bootstrap/js/bootstrap.min.js"></script>
         <script src="../../js/jquery.anoslide.js"></script>
         
       
        
<style type="text/css">
/*.plustext{
 font-size:50px;
}*/

.pad{padding:5px;}
select{
     -webkit-appearance: menulist-button;
     color:gray;
   height: 30px;
  
  }
/*MODAL CSS*/
.glyphicon-remove{
 color:white;
}
.modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	z-index: 99999;
	opacity:0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	pointer-events: none;
	color:white;
	border-radius:6px;
		
}

.modalDialog:target {
	opacity:1;
	pointer-events: auto;
}

.modalDialog > div {
	width: 305px;
	position: relative;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	
	background:#222222;
}

.close {
;
	color: white;
	line-height: 20px;
	position: absolute;
	right: 7px;
	text-align: center;
	top: 1px;
	width: 20px;
	text-decoration: none;
	font-weight: bold;

}
.thumbnail>img{
 height:200px;
 width:300px;
}


/*MODAL CSS*/
@media screen and (max-width: 1024px) {
   .floater{
 float:right;
}

}

.progress{
 display:none;
}
.progress-bar {
    -webkit-transition: none !important;
    transition: none !important;
}
.ext{
 font-size:16px;
}
#add{
 font-family: 'Slabo 27px', serif;
 font-size:25px;
 color:#191919;
}

.left{
  float:left;
}



button:focus {outline:0 !important;}
.jumbotron{
 background-color:white;
}
.glyphicon-plus{
 font-size:2em;
}


.thumbnail{
 padding-top:70px;
 padding-bottom:50px;
 border-radius: 97px 0px 97px 0px;
-moz-border-radius: 97px 0px 97px 0px;
-webkit-border-radius: 97px 0px 97px 0px;
border: 1px solid #191919;
}
.homes{
 width:90%;
 padding:40px;
 border-radius: 97px 0px 97px 0px;
-moz-border-radius: 97px 0px 97px 0px;
-webkit-border-radius: 97px 0px 97px 0px;
border: 1px solid #191919;
}
#container{
display:none;

}
#outline{
 outline:none;
}
.listings{
 
 color:white;
 background-color:#191919;
 padding:6px;
  font-family: 'Lora', serif;
  font-size:15px;
  margin-bottom:6px;
  border-radius:15px;
  
}
 .titled{
   font-family: 'Oswald', sans-serif;
   font-size:15px;
 }
.price{
        font-family: 'Oswald', sans-serif;
          color:#33CCFF;
        }
 .title{
   font-family: 'Oswald', sans-serif;
 }

.info{
 padding:5px;
}
 #panel {
        padding: 5px;
         font-size: 15px;
       
      }
#panel, .panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
         width: 100%;
      }

    .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
#footer{
 background-color:#1E1E1E;
}
.thumbnail>.carousel>ul>li>img{
 height:200px;
 width:400px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.jumbotron{
    font-family: 'Lora', serif;
}
.alert{
 display:none;
}
#modal-title{
 color:Gray;
 
}
 /*.progress{
  visibility:hidden;
 }*/
 html, body, #map-canvas,#mapBox {
        height: 30em;
        margin: 0px;
        padding: 0px;
      }

.se-pre-con {

	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(../images/loader-64x/Preloader_2.gif) center no-repeat #fff;
}


</style>
         <script type="text/javascript"  src="assets/js/jquery.backstretch.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script>
    $(".se-pre-con").hide();
    
var map;
var markers = [];
var coords={};
function initialize() {

 var x=0;
  var haightAshbury = new google.maps.LatLng(18.0104288,-76.741323);
  var mapOptions = {
    zoom: 13,
    center: haightAshbury,
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // This event listener will call addMarker() when the map is clicked.
  google.maps.event.addListener(map, 'click', function(event) {
    addMarker(event.latLng);
  });




  //Adds a marker at the center of the map.
  //addMarker(haightAshbury);
  
}

var image="../images/testmarkr.png"

// Add a marker to the map and push to the array.
function addMarker(location) {
clearMarkers();
  var marker = new google.maps.Marker({
    position: location,
    map: map,
    icon:image,
    draggable:true
    
  });
  google.maps.event.addListener(marker, 'click', function() {
    map.setZoom(10);
    map.setCenter(marker.getPosition());
  });

  markers.push(marker);
  coords["lat"]=marker.getPosition().lat();
  coords["long"]=marker.getPosition().lng();

  
}
$('.pad').on('click',function(){
 
 $(".modalDialog").show();
})
$("#coords").on('click',function(){

 if($('#mprice').val()=="")
{
 $(".alert-info").removeClass("alert-info")
    $(".info").addClass("alert-danger");
 $(".info").html("<center>Please enter a price</center>");
  $(".info").show();
 return;
}
else if(isNaN($('#mprice').val()))
{
  $(".alert-info").removeClass("alert-info")
    $(".info").addClass("alert-danger");
 $(".info").html("<center>Price needs to be a numeric value</center>");
  $(".info").show();
 return;
}
coords['price']=$('#mprice').val();
coords['option']=$('#marker-details').val();
 $.ajax({
  url:'coords.php',
  type:"POST",
  data:coords,
  success:function(response){
   console.log(response);
  
   if(response==-1)
   {
    $(".alert-info").removeClass("alert-info")
    $(".info").addClass("alert-danger");
     $(".modalDialog").fadeOut('slow');
    $(".info").html("<center> Select your location before attempting to save</center>");
    $(".info").show();
    console.log(coords['lat']);
     console.log(coords['long']);
   }
   else if(response==1)
   {
    $(".modalDialog").fadeOut('slow');
     $(".info").addClass("alert-info");
     $(".info").removeClass("alert-danger")
     $(".alert-info").html("<center>The location of your home has been saved!</center>");
      $(".alert-info").show();
     
   }
  }
 });
});

// Sets the map on all markers in the array.
function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(null);
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
//gets the latitude of location

//returns the longitude of the location

google.maps.event.addDomListener(window, 'load', initialize);


    </script>
 
    
    <script type="text/javascript">

   
    $('#outline').on('click',function(){
     var container="<div class='container-fluid'><div class='row'>";
      var endDiv="<div></div>";
      var put="";

     $.ajax({
      url:'addhomes.php',
      type:'POST',
      success:function(response){
       
       console.log(response);
       if(response==-1)
       {
        $('.inner').html("<div><h3><center>You do not have any rooms listed as yet</center></h3></div>");
       }
       
      for(var x=0;x<response[0].length;x++){
       console.log(response[6][x]);
       put+='\
  \
  <div class="col-sm-6 col-md-4" id='+response[6][x]+' col-lg-4">\
    <div class="thumbnail">\
      <img src="../../uploads/'+response[5][x]+'"'+' alt="image unavailable">\
      <div class="caption">\
         <p><h3><span class="title">Price:</span> <span class="price">$' +response[0][x]+'</h3></span></p>\
         <p><span class="titled">Location: ' +response[1][x]+'</span></p>\
         <p><span class="titled">Telephone: ' +response[2][x]+'</span></p>\
         <p><span class="titled">Accomodation: ' +response[3][x]+'</span></p>\
         <p><span class="titled">Rent type: ' +response[4][x]+'</span></p>\
      </div>\
      <div class=container">\
       <button class="test delete btn btn-danger" data-toggle="modal" data-target="#deleteModal" name='+response[6][x]+'><i class="glyphicon glyphicon-trash "> Delete</i></button>\
       <button class="test update btn btn-info" data-toggle="modal" data-target="#updateModal" name='+response[6][x]+'><i class="glyphicon glyphicon-pencil "> Update</i></button>\
      </div>\
    </div>\
  </div>\
\
  ';
      
      
      $('.inner').html(container+put+endDiv);
      }
      
      
       $('.test').on('click',function(){
        var thisButton=$(this);
        var unique=thisButton.attr("name");
        var bool=thisButton.hasClass('update')
        var id='#'+unique;
       
        
        $('.del').on('click',function(){

           $.ajax({
         url:'update_delete.php',
         type:'POST',
         data:{unique:unique,bool:bool},
         success:function(response){
          $(id).hide();
         
         }
      
        })

        });
       
      
       });
       
 
      }
     })
     
    });
      var count=0;
      
    $(".plus").on('click',function(){
     $('#error').hide();
      $('#warn').fadeOut('slow')
     $('.progress').hide();
     if(count==0)
     {
       $('#container').fadeIn('slow');
     }
     else if((count%2)==0)
     {
      $('#container').fadeIn('slow');
     }
     else
     {
       $('#container').fadeOut('slow');
     }
     count++;
    // $('#error').hide();
     
    });
 $(".upload").mousedown(function(){

$('.upload').liteUploader({
				script: 'uploadFile.php'
			})
			.on('lu:success', function (e, response) {
        console.log(response);

			});
    
 }); 
 
$("form.upload").on('submit',function(){
 $(".se-pre-con").show();
 console.log($('.upload').val());
 ///$(".spinner-loader").delay(5000).fadeOut('slow');
 var validator=true;
 var valid={};
 
$(this).find('[name]').each(function(index, val){
 val=$(this).val();
 var name=$(this).attr('name');
 valid[name]=val;

})

if(valid['price']==""||valid['location']==""||valid['telephone']==""||	$('input[name=single-shared]:checked', 'form.upload').val()==undefined||$('input[name=sep-all]:checked', 'form.upload').val()==undefined){

$('#warn').show();
 return false;
}
var regex = /^(\([0-9]{3}\)|[0-9]{3}-)[0-9]{3}-[0-9]{4}$/;
if (regex.test(valid['telephone'])) {
       console.log("success")
    } 
 if(isNaN(Number(valid['price']))){
  
 }

	var component=$(this);
	var url=component.attr('action'),
	 type=component.attr('method'),
	data={};
	
	component.find('[name]').each(function(index, value)
	{
		var component=$(this);
	 var name=component.attr('name'),
		value=component.val();

		data[name]=value;
	
	});
	
	
	withoutSlash=data['upload'].split('\\');
	
	data['upload']=withoutSlash[withoutSlash.length-1];
var single_shared=	$('input[name=single-shared]:checked', 'form.upload').val()
var sep_all=$('input[name=sep-all]:checked', 'form.upload').val()
data['single-shared']=single_shared;
data['sep-all']=sep_all;


	$.ajax({
		url:url,
		type:type,
		data:data,
		success: function(response){
      console.log(response);
		 
		 
  	$('#warning').hide();
		 $(".container").fadeOut(5500);
		 $('#error').fadeIn(5500);
		 $('.progress').show();
		  $(".progress-bar").animate({
    width: "100%"
}, 3800);
      $(".progress-bar").animate({
    width: "0%"
}, 4000);

document.getElementById("save").reset();
setTimeout(function(){$(".se-pre-con").hide();},5600)
		 
	/*	$('form.upload').trigger("reset");*/
	 
		}
	});
	return false;
});




 
    </script>
       </body>
</html>
<?php
?>