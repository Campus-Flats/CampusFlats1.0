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
         
        $sql = "SELECT latitude,longitude,price,accomodation FROM `coords`";
        $query=$db->query($sql);
        $count=0;
        $latitude=[];
        $longitude=[];
        $price=[];
        $accomodation=[];
        $coordsContainer=[];
       while($row=mysqli_fetch_row($query))
       {
           $latitude[$count]=$row[0];
           $longitude[$count]=$row[1];
           $price[$count]=$row[2];
           $accomodation[$count]=$row[3];
           $count++;
       }
       $coordsContainer[0]=$latitude;
       $coordsContainer[1]=$longitude;
       $coordsContainer[2]=$price;
       $coordsContainer[3]=$accomodation;
       header('Content-Type: application/json');
        echo json_encode($coordsContainer);
       


?>