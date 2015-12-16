<?php
session_start();
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
         $id=$_SESSION['user_id'];
         $lat=$_POST['lat'];
         $long=$_POST['long'];
         $price=$_POST['price'];
         $accomodation=$_POST['option'];
         if($lat!==null|| $long!==null)
         {
            $sql = "INSERT INTO `Users`.`coords` (`id`, `latitude`, `longitude`,`price`, `accomodation`) VALUES ('$id', '$lat','$long',$price,'$accomodation');";
            if($db->query($sql)===TRUE)
             {
             echo 1;
            }
            else{
             echo $db->error;
             }
         }
         else{
              echo -1;
         }
        
         
?>