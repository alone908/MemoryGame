<<?php

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

$sql = "select id,username, level, best_score from best_record where id<=10 order by best_score desc";
$result = $conn->query($sql);
$rank = 0;
$lastscore = -1;

while($row = $result->fetch_assoc()){

  if($row['best_score'] != $lastscore){
    $rank ++;
  }

  echo "<div class = 'rank_box'>";

    if($rank < 10){
      echo"<text class = 'rank red'>0".$rank.". </text><text class = 'rank_name'>".$row['username']."</text>";
    }elseif ($rank >=10) {
      echo"<text class = 'rank red'>".$rank.". </text><text class = 'rank_name'>".$row['username']."</text>";
    }

  echo "
    <br>
    <p class = 'rank_detail'>
      <text class = 'red '>Level: </text>".$row['level']."
      <text class = 'red rank_score'>BestScore: </text>".$row['best_score']."
    </p>
  </div>";

  $lastscore = $row['best_score'];

}

?>
