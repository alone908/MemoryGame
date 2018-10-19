<html>
<head>
  <link href="css/style.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/game.js"></script>
</head>
<body style='background-image:url(images/background.jpg)'>
<?php

if(!isset($_SESSION)){
  session_start();
}

$re_num = $_SESSION['re_num'];
$bomb_num = $_SESSION['bomb_num'];
$cells = $_SESSION['cells'];
$chance_num = $_SESSION['chance_num'];
$peek_num = $_SESSION['peek_num'];
$pairs = ($cells - $re_num - $bomb_num)/2;
$re_prob = number_format(($re_num/$cells)*100,2);
$bomb_prob = number_format(($bomb_num/$cells)*100,2);
$level = $_SESSION['level'];

if(isset($_SESSION['playername'])){
  $playername = $_SESSION['playername'];
}

if(isset($_SESSION['playerid'])){
  $playerid = $_SESSION['playerid'];
}

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

$sql = "select best_score from best_record where player_id=".$playerid;
$result = $conn->query($sql);

if($result->num_rows == 1){
  $row = $result->fetch_assoc();
  $bestscore = $row['best_score'];
}else {
  $bestscore = 0;
}

echo "<div class = 'container'>";

echo "<div class = 'h1'>
        <h1>Game will start in 3 seconds</h1>
      </div>";

echo "<div class = 'game_left_div'>
        <h2>Hello! ".$playername.".</h2>
        <div class = 'left_info'>
          <h2 >Score: <text class = 'score red'>0</text></h2>
          <h2 >Best Score: <text class = 'bestscore red'>".$bestscore."</text></h2>
          <h2 >Level: <text class = 'cells red'>".$level."</text></h2>
          <h2 >Total Icons: <text class = 'cells red'>".$cells."</text></h2>
          <h2 >Pairs Remain: <text class = 'red pair_remain'>".$pairs."</text></h2>
          <h2 >Probability: </h2>
            <div class = 'leftinfo_icon' style = 'width: 102px float: left; display: inline-block;'>
              <img src = 'images/gameicon/refresh.png' ></img>
              <h2 ><text class = 'red re_prob'>".$re_prob."%</text></h2>
            </div>
            <div class = 'leftinfo_icon' style = 'width: 102px float: right; display: inline-block'>
              <img src = 'images/gameicon/bomb.png' ></img>
              <h2 ><text class = 'red bomb_prob'>".$bomb_prob."%</text></h2>
            </div>
        <h2 >Special Tools:
        </h2>
        <button class = 'chance img_left margin_top_10' type = 'button'>
          <img src = 'images/chance.png'></img>
        </button>
          <h2 class = 'margin_top_10'>&nbsp X <text class = 'chance_num red'>".$chance_num."</text>
          </h2>
        <button class = 'peek img_left margin_top_10' type = 'button'>
          <img src = 'images/peek.png'></img>
        </button>
          <h2 class = 'margin_top_10'>&nbsp X <text class = 'peek_num red'>".$peek_num."</text>
          </h2>

      </div>


      <button class = 'st_over margin_top_10' type = 'button' disabled>Start Over !!</button><br>
      <form class = 'game_form margin_top_10' action ='index.php'>
        <button class = 'go_back' type = 'submit'>Main Menu</button>
      </form>


      </div>";

$sql = "select id,username, level, best_score from best_record where id<=20 order by best_score desc";
$result = $conn->query($sql);
$rank = 0;
$lastscore = -1;

echo "<div class = 'game_right_div'>
        <h2>Top 10 !!!</h2>
        <div class = 'right_info'>";

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

          echo "<br>
                <p class = 'rank_detail'>
                  <text class = 'red '>Level: </text>".$row['level']."
                  <text class = 'red rank_score'>BestScore: </text>".$row['best_score']."
                </p>
              </div>";

          $lastscore = $row['best_score'];
        }

echo   "</div>
      </div>";

echo "<div class = 'end_container'>
      <div class = 'game_end'>
        <img src='images/gameover.png'></img>
      </div>
      </div>";

echo "<div class = 'win_container'>
      <div class = 'game_win'>
        <img src='images/win.png'></img>
      </div>
      </div>";

echo "<div class = 'explain_container'>
      <div class = 'game_explain'>
       <table>
       <tr>
         <td class = 'op_cell' style = 'background-color: rgba(0,0,0,0.8);'>
           <h4>Special Icons:</h4>
            <div style ='width: 330px; padding: 0px; display: inline; float: left;'>
             <img src = 'images/gameicon/refresh.png' style = 'float: left; margin: 5px;'></img>
             <p class = 'col_notice' style = 'font-size: 20px; '>Refresh Icon: </p>
             <p class = 'notice_p'>Pick two icons randomly in the game and then swap over until all icons position changed.</p>
            </div>
            <div style ='width: 330px; display: inline; float: right;'>
             <img src = 'images/gameicon/bomb.png' style = 'float: left; margin: 5px;'></img>
               <p class = 'col_notice' style = 'font-size: 20px;' >Bomb Icon: </p>
               <p class = 'notice_p'>Start to countdown 60 seconds, second bomb will halve time!
                                     Only way to cancel is making 3 pairs before timeout.</p>
            </div>
          <h4>Special Tools:</h4>
            <div style ='width: 330px; padding: 0px; display: inline; float: left;'>
              <img src = 'images/chance.png' style = 'margin: 5px;'></img>
              <p class = 'col_notice' style = 'font-size: 20px; '>Chance Tool: </p>
              <p class = 'notice_p'>Open two icons randomly for you. You may make pairs accidently if you are lucky !</p>
            </div>
            <div style ='width: 330px; display: inline; float: right;'>
              <img src = 'images/peek.png' style = 'margin: 5px;'></img>
              <p class = 'col_notice' style = 'font-size: 20px;' >Peek Tool: </p>
              <p class = 'notice_p'>Let you open 1 icon without any consequence. Useful for finding where are special icons.</p>
            </div>
          <h4 style = 'color: red; margin-left: 100px; clear: both;'>You can change all settins in the Option Menu</h4>
         </td>
       </tr>
       <tr>
         <td>
           <button class = 'explain_ok' type = 'buttom' >OK !</button>
         </td>
       </tr>
      </table>

      </div>
      </div>";

echo "<div class = 'game_table'>";
      include 'table.php';
echo "</div>";



echo "</div>";

?>
</body>
</html>
