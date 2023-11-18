<?php
ini_set('memory_limit', '1024M');
require "conn.php";
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
$sql = "SELECT * FROM data ORDER BY id DESC LIMIT 1";
$query = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = [
        'temperature' => $row['temperature'],
        'density' => $row['density'],
        'viscosity' => $row['viscosity'],
        'wear_debris' => $row['wear_debris'],
        'timestamp' => $row['timestamp'],
    ];
    
}
echo json_encode($data);
?>
