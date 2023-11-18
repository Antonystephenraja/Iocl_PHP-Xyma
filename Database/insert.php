<?php 
require "conn.php";
date_default_timezone_set('Asia/Kolkata'); // set the timezone to Asia/Kolkata
$timestamp = date('Y-m-d H:i:s');
$temperature = $_GET['temperature'];
$density = $_GET['density'];
$viscosity = $_GET['viscosity'];
$wear_debris= $_GET['wear_debris'];

echo $temperature;
echo $density;
echo $viscosity;
echo $wear_debris;

$sql = "INSERT INTO data (temperature, density, viscosity,wear_debris,timestamp) VALUES('$temperature', '$density', '$viscosity','$wear_debris','$timestamp')";
$sql1 = "SELECT * from data ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql1);
$num = mysqli_fetch_array($result);
if ($conn->query($sql) === TRUE) {
    echo "STATUS: OK";
 
	echo $num['level'];
	

}
else{   

    echo "<h6>STATUS: failed</h6>";

}
?>