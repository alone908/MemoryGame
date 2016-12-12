<?php

if(!isset($_SESSION)){
  session_start();
}

if(isset($_SESSION['login'])){
  $login = $_SESSION['login'];
}else {
  $login = 0;
}

if(isset($_POST['playername'])){
  $playername = $_POST['playername'];
}

if(isset($_POST['playerpassword'])){
  $playerpassword = $_POST['playerpassword'];
}

if(isset($_POST['playeremail'])){
  $playeremail = $_POST['playeremail'];
}

if(isset($_POST['firstname'])){
  $firstname = $_POST['firstname'];
}

if(isset($_POST['lastname'])){
  $lastname = $_POST['lastname'];
}

if(isset($_POST['country'])){
  $country = $_POST['country'];
}

if($login == 0){

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

  $sql = "SELECT username FROM player_info where username = '". mysqli_real_escape_string($conn,$playername) ."' ";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // output data of each row
      $row = $result->fetch_assoc();
      //echo "Id: " . $row["id"]. "Name: " . $row["name"]. "Email: " . $row["email"]."Score: ". $row["score"]. "<br>";
      if($playername == $row["username"]){

        header('Content-Type: application/json');
        echo json_encode(array('result' => 'bad', 'message' => "Username has been token!"));

      }

  } else {

      $sql = "INSERT INTO player_info (username,password,firstname,lastname,country,email) VALUES
             ('".mysqli_real_escape_string($conn,$playername)."','".mysqli_real_escape_string($conn,$playerpassword)."',
              '".mysqli_real_escape_string($conn,$firstname)."','".mysqli_real_escape_string($conn,$lastname)."',
              '".mysqli_real_escape_string($conn,$country)."','".mysqli_real_escape_string($conn,$playeremail)."')";

      $result = $conn->query($sql);

      header('Content-Type: application/json');
      echo json_encode(array('result' => 'good', 'message' => "SignUp successfully! Please LogIn now..."));
  }

}


?>
