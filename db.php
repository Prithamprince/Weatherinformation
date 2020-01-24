<?php
$servername='localhost';
$username='user';
$password='password';
$dbname = "wthrinfo";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
?>