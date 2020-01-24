<?php
include_once "index.php";
$servername='localhost';
$username='user';
$password='password';
$dbname = "wthrinfo";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(isset($_POST['go'])){
    $city=$_POST['location'];
    $content=file_get_contents("http://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&APPID=a10f618b0f035ce072168b7808df745d");
    $result=json_decode($content);
    $name=$result->name;
    $temperature=$result->main->temp."°C";
    $description=$result->weather[0]->description;
    $sql=mysqli_query($conn,"INSERT INTO wthrinfo(city,temperature,description)VALUES('$name','$temperature','$description')");
    $display=mysqli_query($conn,"SELECT * FROM wthrinfo");
    if(mysqli_num_rows($display)>0){
        $i=0;
        while($display_result=mysqli_fetch_array($display)){
            echo "<center>".$display_result["city"]."</center>";
            echo "<center>".$display_result["temperature"]."</center>";
            echo "<center>".$display_result[3]."</center>";
            echo "<center>".$display_result["time"]."</center>";
            $i++;
            echo "<center><input type='submit' name='delete' id='delete' value='Delete' action='delete.php'></center>";
            echo "<br><br>";
        }
    }
}
?>