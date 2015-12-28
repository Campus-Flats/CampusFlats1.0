<?php

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
  $bool=$_POST['bool'];
  $unique=$_POST['unique'];
  $delete_from_info="DELETE FROM `flatinfo` WHERE uniqueid='$unique'";
  $delete_image="DELETE FROM `images` WHERE uniqueid='$unique'";
  $test="DELETE FROM `images` WHERE id=23";
  echo $bool;
 
  if($bool=='false')
  {
     
          if($db->query($delete_from_info)==TRUE && $db->query($delete_image)==TRUE)
          {
              echo ("entry deleted");
          }
          else{echo $unique;}
  }
  else{echo "true";}
  

?>