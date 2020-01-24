<?php
$servername='localhost';
$username='user';
$password='password';
$dbname = "wthrinfo";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(isset($_POST['delete'])){
    $id=mysqli_query($conn,"SELECT id FROM wthrinfo ORDER BY id DESC LIMIT 1");
    $delete_id=mysqli_fetch_array($id);
    $delete=mysqli_query($conn,"DELETE FROM wthrinfo WHERE id=$delete_id[0]");
    }
?>