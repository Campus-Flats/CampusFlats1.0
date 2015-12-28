<?php
   session_start();
  
class Login{
    public $username,$password;

 public function flatten($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 
    public function login()
    {
        $servername = "127.0.0.1";
         $name = "jermyhewitt";
         $dbpassword = "";
         $database = "Users";
         $dbport = 3306;
        
        // Create connection
       $db = new mysqli($servername, $name, $dbpassword, $database,$dbport);

    

         // Check connection
         if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
         } 
       // $username= $this->connect_to_db->$db->real_escaped_string("test");
      
        $this->password=$this->flatten($_POST['password']);
        $this->username=$this->flatten($_POST['username']);
        
        $sql = "SELECT `firstname`,`lastname`,`id` FROM `landlords` WHERE username='$this->username' AND password='$this->password'";
        $query=  $db->query($sql);
       $num_rows=mysqli_num_rows($query);
       if($num_rows<1)
       {
           echo -1;
       }
       else{
    
       $row = $query->fetch_array(MYSQLI_ASSOC);
       $_SESSION['firstname']=$row['firstname'];
       $_SESSION['lastname']=$row['lastname'];
       $_SESSION['user_id']=$row['id'];
        //header("location:profile.php");   
       }
        
   
    }
    

}
$login=new Login;
//$login->login();
?>