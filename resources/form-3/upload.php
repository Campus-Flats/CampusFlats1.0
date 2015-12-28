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
         $image=$_POST['upload'];
         $id=$_SESSION['user_id'];
         $location=$_POST['location'];
           $price=$_POST['price'];
             $single_shared=$_POST['single-shared'];
               $sep_all=$_POST['sep-all'];
               $telephone=$_POST['telephone'];
                  $uniqueid=uniqid();
         $sql = "INSERT INTO `Users`.`images` (`id`, `image`, `uniqueid`) VALUES ('$id', '$image', '$uniqueid');";
      $flatsql = "INSERT INTO `flatinfo`(`location`, `price`, `single_shared`, `sep_all`, `id`, `telephone`, `uniqueid`) VALUES ('$location', '$price', '$single_shared', '$sep_all', '$id', '$telephone','$uniqueid');";
        # $flatsql = "INSERT INTO `Users`.`flatinfo` (`location`, `price`, `single_shared`, `sep_all`, `ID`,`telephone`,`uniqueid`) VALUES ('$location', '$price', '$single_shared', '$sep_all', '$id','$telephone','$uniqueid';";
        if($db->query($sql)===TRUE && $db->query($flatsql)===TRUE ){
          echo "uploaded";
          
        }
        else{
          echo $db->error;
        }
       
 
?>   