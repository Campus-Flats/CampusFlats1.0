<?php
   
class Registration{
        
 public $fname,$lname,$username,$password;
 
 public function flatten($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    public function connect_to_db( $fname,$lname,$username,$password)
    {
        $servername = "localhost";
         $name = "root";
         $dbpassword = "620070733";
         $database = "Users";
         $dbport = 3306;
        
        // Create connection
       $db = new mysqli($servername, $name, $dbpassword, $database);

    

         // Check connection
         if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
         } 
        // echo "Connected successfully";
         
         
 if($_SERVER["REQUEST_METHOD"] == "POST"){

     $this ->fname=$this->flatten($fname);
     $this ->lname=$this->flatten($lname);
     $this ->username=$this->flatten($username);
     $this ->password=$this->flatten($password);
     if(isset($fname)&&isset($lname)&&isset($username)&&isset($password))
     {
     $sql = "INSERT INTO `Users`.`landlords` (`firstname`, `lastname`, `username`, `password`, `ID`) VALUES ('$this->fname', '$this->lname', '$this->username', '$this->password', NULL);";
     if ($db->query($sql) === TRUE) {
     echo "New record created successfully";
     header("location:login.html");
        } 
     else {
             //header('Content-Type: application/x-json; charset=utf-8');
          echo -1;
          }

$db->close();
         
    }
    
    

}
}
}

$rgstr=new Registration;
$rgstr->connect_to_db($_POST["first-name"],$_POST["last-name"],$_POST["username"],$_POST["password"]);

    
    

 
   
?>

