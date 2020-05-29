<?php
$servername = "localhost:3307";
$username='root';
$password='';
$connection=mysqli_connect($servername,$username,$password,"rentomojo");
if(!$connection){
 die('Could not Connect My Sql:' .mysql_error());
}
else
{
    //echo "connected";
}
?>