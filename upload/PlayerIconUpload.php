<?php
session_start();
require('UploadHandler.php');

$playerid = $_SESSION['playerid'];

$handler = new UploadHandler(array('upload_dir' => __DIR__.'/../images/playericon/'));

$file = $handler->response['files'][0];

$servername = "localhost";
$username = "root";
$password = "A123456b";
$dbname = "memorygame";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //echo "Connected successfully";
}

$sql = "UPDATE player_info SET player_icon='".$file->name."' WHERE id = ".$playerid;
$result = $conn->query($sql);

echo json_encode(array('result' => 'good', 'file' => $file));


?>
