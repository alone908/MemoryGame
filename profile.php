<html>
<head>
  <link href="css/style.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/profile.js"></script>
</head>
<body style="background-image:url(images/background.jpg)">

<!--style="background-image:url(images/background.jpg)"-->

<?php

if(!isset($_SESSION)){
  session_start();
}

$playerid = $_SESSION['playerid'];
$playername = $_SESSION['playername'];

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

$sql = "SELECT * FROM player_info WHERE id='". mysqli_real_escape_string($conn,$playerid)."'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $country = $row['country'];
  $playeremail = $row['email'];

}else {
  echo "Duplicate User!";
}

echo "<h1 class = 'profile_h1'>".$playername."'s Profile.</h1>";

echo "<div class = 'info'>

         <div class = 'playericon'>

           <img src = 'images/playericon/empty-avatar.jpg' style='cursor: pointer;' />

         </div>

         <div class = 'info_detail'>
           <h2>".$playername."</h2>
           <h3>".$firstname." ".$lastname."</h3>

          <table class = 'info_table'>
             <tr>
               <td>Country: Taiwan </td>
             </tr>
             <tr>
               <td>Email: ".$playeremail."</td>
             </tr>
           </table>
         </div>";

echo "</div>";

echo "<div class = 'history_container'>";

echo "<div class = 'history'>

         <div class = 'history_op'>
             <ul>
               <li class = 'yours_li tab_up'>Your History</li>
               <li class = 'all_li tab_down'>All Players' History</li>
               <li class = 'last_li'></li>
             </ul>
         </div>

         <table class = 'yours_table'>

           <tr>
             <td>Username</td>
             <td>Rows</td>
             <td>Columns</td>
             <td>Total Icons</td>
             <td>Refresh Icons</td>
             <td>Bomb Icons</td>
             <td>Chance Tools</td>
             <td>Peek Tools</td>
             <td>Level</td>
             <td>Result</td>
             <td>Score</td>
             <td>Timestamp</td>
           </tr>";

$sql = "SELECT * FROM history WHERE player_id='". mysqli_real_escape_string($conn,$playerid)."' order by timestamp desc";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
  echo "     <tr>
               <td>".$row['username']."</td>
               <td>".$row['rows']."</td>
               <td>".$row['columns']."</td>
               <td>".$row['game_size']."</td>
               <td>".$row['refresh_icons']."</td>
               <td>".$row['bomb_icons']."</td>
               <td>".$row['chance_tools']."</td>
               <td>".$row['peek_tools']."</td>
               <td>".$row['level']."</td>
               <td>".$row['result']."</td>
               <td>".$row['score']."</td>
               <td>".$row['timestamp']."</td>
             </tr>";
}

echo    "</table>

         <table class = 'all_table displaynone'>

           <tr>
             <td>Username</td>
             <td>Rows</td>
             <td>Columns</td>
             <td>Total Icons</td>
             <td>Refresh Icons</td>
             <td>Bomb Icons</td>
             <td>Chance Tools</td>
             <td>Peek Tools</td>
             <td>Level</td>
             <td>Result</td>
             <td>Score</td>
             <td>Timestamp</td>
           </tr>";

$sql = "SELECT * FROM history WHERE id <= '1000' order by timestamp desc";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
  echo "     <tr>
               <td>".$row['username']."</td>
               <td>".$row['rows']."</td>
               <td>".$row['columns']."</td>
               <td>".$row['game_size']."</td>
               <td>".$row['refresh_icons']."</td>
               <td>".$row['bomb_icons']."</td>
               <td>".$row['chance_tools']."</td>
               <td>".$row['peek_tools']."</td>
               <td>".$row['level']."</td>
               <td>".$row['result']."</td>
               <td>".$row['score']."</td>
               <td>".$row['timestamp']."</td>
             </tr>";
}

echo "</table>

       </div>";

echo "</div>";

echo "<div history_bt>
        <form class = 'history_form' action = 'index.php' method = 'post'>
          <button type = 'submit'>Go Back.</button>
        </form>
      </div>";

?>

</body>
</html>
