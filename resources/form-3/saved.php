<?php
ob_start();
include 'header.php';
$buffer=ob_get_contents();
ob_end_clean();
$buffer=str_replace("..title..","Campus Flats-Saved places",$buffer);
echo $buffer;
$X='text';
$X.=$_POST['signedin'];
echo $X." ".'cyaa bada'
 
 
?>