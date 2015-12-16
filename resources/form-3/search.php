<?php
ob_start();
include 'header.php';
$buffer=ob_get_contents();
ob_end_clean();
$buffer=str_replace("..title..","Campus Flats- Search",$buffer);
echo $buffer;unset($_GET['no-name']);

?>

<?php
$servername = "localhost";
         $name = "root";
         $dbpassword = "620070733";
         $database = "Users";
         $dbport = 3306;
        
        // Create connection
       $db = new mysqli($servername, $name, $dbpassword, $database, $dbport);

    

         // Check connection
         if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
         } 
         
         
$toprange=$_GET['toprange'];
$bottomrange=$_GET['bottomrange'];
$vicinity=$_GET['vicinity'];
$accomodation=$_GET['accomodation'];

$content_price=[];
$content_location=[];
$content_accomodation=[];
$content_telephone=[];
$content_unique=[];
$images_holder=[];

if (!empty($toprange)&&!empty($bottomrange)&&!empty($vicinity)&&!empty($accomodation))
{
  

 $from_index="SELECT price,location,single_shared,telephone,uniqueid FROM `flatinfo` WHERE price>=$toprange and price<=$bottomrange and location='$vicinity' and single_shared='$accomodation' LIMIT 0, 30 ";
$query=$db->query($from_index);
$x=0;


   while($row=mysqli_fetch_row($query))
    {
     
          $content_price[$x]= $row[0];
          $content_location[$x]= $row[1];
          $content_accomodation[$x]= $row[2];
          $content_telephone[$x]=$row[3];
          $content_unique[$x]=$row[4];
          $x++;
      }
       
$num=mysqli_num_rows($query);
$y=0;

while($y<$num){
    $image_fetch= "SELECT image FROM `images` WHERE uniqueid='$content_unique[$y]'";
    $image_query=$db->query($image_fetch);
    $fetched=mysqli_fetch_row($image_query);
    $images_holder[$y]=$fetched[0];
    $y++;
}



}
else{
    
}

$single_shared=$_GET['single_shared'];
$top=$_GET['top'];
$bottom=$_GET['bottom'];
$search=$_GET['search'];
$numOfResults=0;

     

?>
<!DOCTYPE html>
<html>
    <head>
            <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <!--filter section beginning-->
                <div class="col-lg-3 col-sm-6 container filter-style">
                  
                    <form method="GET">
                       <div class="input-group input-group-lg">
                          <span class="input-group-addon" id="sizing-addon1"> <span class="glyphicon glyphicon-search"></span></span>
                          <input type="text" class="form-control" placeholder="search location" aria-describedby="sizing-addon1" name="search">
                       </div>
                                                   <br>
                       <div class="input-group input-group-lg">
                          <span class="input-group-addon" id="sizing-addon1">$</span>
                          <input type="text" class="form-control" placeholder="price range" aria-describedby="sizing-addon1" name="top">
                       </div>
                       
                                                       <center><span class="to">TO</span></center>
                       
                       <div class="input-group input-group-lg">
                          <span class="input-group-addon" id="sizing-addon1">$</span>
                          <input type="text" class="form-control" placeholder="price range" aria-describedby="sizing-addon1" name="bottom">
                       </div>
                       <br>
                        <select name="single_shared">
                           <option selected disabled>Accomodation</option>
                           <option>Single</option>
                           <option>Shared</option>
                        </select>
                       <br>
                       <br>
                        <input type="submit" name="push" value="Search"class="btn btn-default"/>
                    </form>
                </div>
                <!--END OF FILTER-->
               <?php
               
               if(isset($_GET['push']))
                {
                    $x=0;
                    if(isset($single_shared)&&isset($top)&&isset($bottom)&&isset($search))
                    {
                        if(is_numeric($top)&&is_numeric($bottom) && !is_numeric($search))
                        {unset($GLOBALS['content_price'],$GLOBALS['content_'],$GLOBALS['content_accomodation'],$GLOBALS['content_telephone'],$GLOBALS['content_unique']);
                            
                            $search_query="SELECT price,location,single_shared,telephone,uniqueid FROM `flatinfo` WHERE price>=$top and price<=$bottom and location='$search' and single_shared='$single_shared' LIMIT 0, 30 ";
                            $search_results=$db->query($search_query);
                            while($row=mysqli_fetch_row($search_results)){
                                $content_price[$x]= $row[0];
                                 $content_location[$x]= $row[1];
                                $content_accomodation[$x]= $row[2];
                                $content_telephone[$x]=$row[3];
                                 $content_unique[$x]=$row[4];
                                 $x++;
                            }
                            $numOfResults=mysqli_num_rows($search_results);
                            $y=0;

                            while($y<$numOfResults){
                                $image_fetch= "SELECT image FROM `images` WHERE uniqueid='$content_unique[$y]'";
                                $image_query=$db->query($image_fetch);
                                $fetched=mysqli_fetch_row($image_query);
                                $images_holder[$y]=$fetched[0];
                                $y++;
                            }
                            for($p=0;$p<$numOfResults;$p++)
                               {
                                   echo '<div class="col-sm-6 col-md-4 col-lg-3">
                                        <div class="thumbnail">'.'
                                          <img src="'.'../../uploads/'.$images_holder[$p].'" alt="...">
                                          <div class="caption">
                                            <h3><span class="price">$'.$content_price[$p].'</span></h3>
                                            <p><span class="titled">Location: '.$content_location[$p].'</span></p>
                                             <p><span class="titled">Accomodation: '.$content_accomodation[$p].' </span></p>
                                              <p><span class="titled">Telephone: '.$content_telephone[$p].'</span></p>
                                          </div>
                                        </div>
                                      </div>';
                               } 
                            
                        }
                        else{
                            echo  "<div class='container alert alert-warning' role='alert'>
                       <h4> Ensure that price ranges are numeric and that locations searched for are not solely numeric!</h4>
                        </div>";
                        }
                        
                        
                    }
                    else{
                        echo "<div class='container alert alert-warning' role='alert'>
                       <h4> All search criterias are necessary!</h4>
                        </div>";
                    }
                
                
                }
                else{
                	
                }
               
               
              
               if ($num!=0)
               {
                  for($p=0;$p<$num;$p++)
               {
                   echo '<div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">'.'
                          <img src="'.'../../uploads/'.$images_holder[$p].'" alt="...">
                          <div class="caption">
                            <h3><span class="price">$'.$content_price[$p].'</span></h3>
                            <p><span class="titled">Location: '.$content_location[$p].'</span></p>
                             <p><span class="titled">Accomodation: '.$content_accomodation[$p].' </span></p>
                              <p><span class="titled">Telephone: '.$content_telephone[$p].'</span></p>
                          </div>
                        </div>
                      </div>';
               }  
               }
               else{
                   if(empty($top)&&empty($bottom&&empty($single_shared)&&empty($search)))
                   {
                        echo "<span class='noresultsfound'><center>Sorry! we could not find any rooms in ".$vicinity." between "."$".$toprange." and "."$".$bottomrange."</center></span>";
                   }
                  
               }
             
               ?>
                <!--The other side-right side, content and stuff-->
               </div>
               </div>

    </body>
    <style type="text/css">
    .noresultsfound{
        font-size:27px;
        color:#4E4E40;
        font-family: 'Dosis', sans-serif;
    }
        .filter-style{
          padding:5px;
            border:1px solid  #E6E6E6;
            border-radius:6px;
        }
          .to{
      font-size:25px;
      color:#33CCFF;
    }
    
    select{
     -webkit-appearance: menulist-button;
   height: 30px;
  
  }
  .price{
        font-family: 'Oswald', sans-serif;
          color:#33CCFF;
        }
        .titled{
   font-family: 'Oswald', sans-serif;
   font-size:20px;
 }
        
    </style>
</html>
