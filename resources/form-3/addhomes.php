<?php
session_start();

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

 $sql_listing = "SELECT price,location,telephone,single_shared,sep_all,uniqueid FROM `flatinfo` WHERE id=$id ";

 $images=[];
 $price=[];
 $location=[];
 $telephone=[];
 $accomodation=[];
 $sep_all=[];
 $unique=[];
 $master_container=[];
  $listing_query=$db->query($sql_listing);
  $num_rows=mysqli_num_rows($listing_query);
 
 $iter=0;
 $img_iter=0;
 
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
    while($img_iter<$num_rows)
    {
     $sql = "SELECT `image` from images WHERE uniqueid='$unique[$img_iter]' ";
     $query=$db->query($sql);
     $fetch=mysqli_fetch_row($query);
     $images[$img_iter]=$fetch[0];
     $img_iter++;
    }
     
   
  if($num_rows!=0)
  {
    $master_container[0]=$price;
    $master_container[1]=$location;
    $master_container[2]=$telephone;
    $master_container[3]=$accomodation;
    $master_container[4]=$sep_all;
    $master_container[5]=$images;
    $master_container[6]=$unique;
    header('Content-Type: application/json');
    echo json_encode($master_container);
}
else{
     header('Content-Type: application/json');
    echo json_encode(-1);
    
}
    
  
 
   
    
  


?>