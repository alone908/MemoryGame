<?php

if(!isset($_SESSION)){
  session_start();
}

$oldplayer = 0;

if(isset($_POST['logout'])){
  $logout = $_POST['logout'];
}else {
  $logout = 0;
}
$playername = '******';
if(isset($_POST['playername'])){
  $playername = $_POST['playername'];
}

$playerpassword = '*****';
if(isset($_POST['playerpassword'])){
  $playerpassword = $_POST['playerpassword'];
}


if($logout == 0){

  $servername = "localhost";
  $username = "root";
  $password = "A123456b";
  $dbname = "memorygame";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }else {
    //echo "Connected successfully";
  }

  $sql = "SELECT * FROM player_info WHERE username='". mysqli_real_escape_string($conn,$playername) ."' AND password='".mysqli_real_escape_string($conn,$playerpassword)."'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    $_SESSION['login'] = 1;
    $_SESSION['playerid'] = $row['id'];
    $_SESSION['playername'] = $playername;
    $_SESSION['welcome_text'] = "Welcome back <text style = 'color: white;'>".$playername." !</text> Nice to see you again .";

    header('Content-Type: application/json');
    echo json_encode(array('result' => 'good', 'message' => "Welcome back <text style = 'color: white;'>".$playername." !</text> Nice to see you again ."));

   }else {
     header('Content-Type: application/json');
     echo json_encode(array('result' => 'bad', 'message' => "Sorry~~~ Wrong password or username !!!"));
   }
 }elseif($logout == 1){

  $_SESSION['login'] = 0;
  header('Content-Type: application/json');
  echo json_encode(array('result' => 'good', 'message' => ""));
}

?>
