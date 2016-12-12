<?php

if(!isset($_SESSION)){
  session_start();
}

$playerid = $_SESSION['playerid'];
$playername = $_SESSION['playername'];

$h = $_SESSION['h'];
$w = $_SESSION['w'];
$cells = $_SESSION['cells'];

$level = $_SESSION['level'];
$re_num = $_SESSION['re_num'];
$bomb_num = $_SESSION['bomb_num'];
$chance_num = $_SESSION['chance_num'];
$peek_num = $_SESSION['peek_num'];

$consequence = $_POST['result'];
$score = $_POST['insertscore'];

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

  $sql = "INSERT INTO history (player_id,username,rows,columns,game_size,refresh_icons,bomb_icons,chance_tools,peek_tools,level,result,score) VALUES
                              (".$playerid.",'".$playername."',".$h.",".$w.",".$cells.",".$re_num.",".$bomb_num.",".$chance_num.",".$peek_num.",'".$level."','".$consequence."',".$score.")";
  $result = $conn->query($sql);

  //header('Content-Type: application/json');
  //echo json_encode(array('result' => 'good', 'message' => "Insert data into history table"));

  if($consequence == "Win"){

    $sql = "select * from best_record where player_id=".$playerid;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($result->num_rows == 0){

      $sql = "INSERT INTO best_record (player_id,username,rows,columns,game_size,refresh_icons,bomb_icons,chance_tools,peek_tools,level,result,best_score) VALUES
                                      (".$playerid.",'".$playername."',".$h.",".$w.",".$cells.",".$re_num.",".$bomb_num.",".$chance_num.",".$peek_num.",'".$level."','".$consequence."',".$score.")";
      $result = $conn->query($sql);

      header('Content-Type: application/json');
      echo json_encode(array('result' => 'good', 'message' => "Insert data into best_record table", 'best_score' => $score));

    }elseif ($result->num_rows == 1){

      if($row['best_score'] < $score){
        $sql = "UPDATE best_record SET rows=".$h.",columns=".$w.",game_size=".$cells.",refresh_icons=".$re_num.",bomb_icons=".$bomb_num.",
                chance_tools=".$chance_num.",peek_tools=".$peek_num.",level='".$level."',result='".$consequence."',best_score=".$score." where player_id = ".$playerid;
        $result = $conn->query($sql);

        header('Content-Type: application/json');
        echo json_encode(array('result' => 'good', 'message' => "Update data to best_record table", 'best_score' => $score));
      }
    }
  }


 ?>
