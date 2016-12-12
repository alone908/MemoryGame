<html>
<head>
  <link href="css/style.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/index.js"></script>
</head>
<body id="body" style="background-image:url(images/background.jpg)">

<!--style="background-image:url(images/background.jpg)"-->

<?php
error_reporting(E_ALL);
if(!isset($_SESSION)){
  session_start();
}

if(!isset($_SESSION['login'])){
  $_SESSION['login'] = 0;
}

if(isset($_SESSION['welcome_text'])){
  $welcome_text = $_SESSION['welcome_text'];
}

if((isset($_POST['level']) && $_POST['level'] === "easy")){
  $h = 4;
  $w = 6;
  $refresh = NULL;
  $bomb = NULL;
  $re_num = 0;
  $bomb_num = 0;
  $chance = "on";
  $peek = "on";
  $chance_num = 5;
  $peek_num = 6;
  $_SESSION['level'] = "Easy";
  $_SESSION['h'] = $h;
  $_SESSION['w'] = $w;
  $_SESSION['cells'] = $h * $w;
  $_SESSION['refresh'] = $refresh;
  $_SESSION['bomb'] = $bomb;
  $_SESSION['re_num'] = $re_num;
  $_SESSION['bomb_num'] = $bomb_num;
  $_SESSION['chance'] = $chance;
  $_SESSION['peek'] = $peek;
  $_SESSION['chance_num'] = $chance_num;
  $_SESSION['peek_num'] = $peek_num;
}elseif ((isset($_POST['level']) && $_POST['level'] === "normal") || !isset($_POST['level']) ) {
  $h = 6;
  $w = 8;
  $refresh = 'on';
  $bomb = 'on';
  $re_num = 2;
  $bomb_num = 2;
  $chance = "on";
  $peek = "on";
  $chance_num = 3;
  $peek_num = 4;
  $_SESSION['level'] = "Normal";
  $_SESSION['h'] = $h;
  $_SESSION['w'] = $w;
  $_SESSION['cells'] = $h * $w;
  $_SESSION['refresh'] = $refresh;
  $_SESSION['bomb'] = $bomb;
  $_SESSION['re_num'] = $re_num;
  $_SESSION['bomb_num'] = $bomb_num;
  $_SESSION['chance'] = $chance;
  $_SESSION['peek'] = $peek;
  $_SESSION['chance_num'] = $chance_num;
  $_SESSION['peek_num'] = $peek_num;
}elseif (isset($_POST['level']) && $_POST['level'] === "hard") {
  $h = 7;
  $w = 10;
  $refresh = 'on';
  $bomb = 'on';
  $re_num = 4;
  $bomb_num = 4;
  $chance = NULL;
  $peek = NULL;
  $chance_num = 0;
  $peek_num = 0;
  $_SESSION['level'] = "Hard";
  $_SESSION['h'] = $h;
  $_SESSION['w'] = $w;
  $_SESSION['cells'] = $h * $w;
  $_SESSION['refresh'] = $refresh;
  $_SESSION['bomb'] = $bomb;
  $_SESSION['re_num'] = $re_num;
  $_SESSION['bomb_num'] = $bomb_num;
  $_SESSION['chance'] = $chance;
  $_SESSION['peek'] = $peek;
  $_SESSION['chance_num'] = $chance_num;
  $_SESSION['peek_num'] = $peek_num;
}

if(isset($_POST['level']) && $_POST['level'] === "custom"){

  $_SESSION['level'] = "Custom";

  if(isset($_POST['row_num']) && isset($_POST['col_num'])){
    $h = $_POST['row_num'];
    $w = $_POST['col_num'];
    $_SESSION['h'] = $h;
    $_SESSION['w'] = $w;
    $_SESSION['cells'] = $h * $w;
  }

  //Define $chance_num,$peek_num based on player's choice, chance_num and peek_num means number of chance and peek tool
  if((!isset($_POST['chance'])) && (!isset($_POST['peek']))){
    $chance = NULL;
    $peek = NULL;
    $_SESSION['chance'] = $chance;
    $_SESSION['peek'] = $peek;
  }else if((isset($_POST['chance'])) && (isset($_POST['peek']))){
    $chance = $_POST['chance'];
    $peek = $_POST['peek'];
    $_SESSION['chance'] = $chance;
    $_SESSION['peek'] = $peek;
  }else if(isset($_POST['chance'])){
    $chance = $_POST['chance'];
    $peek = NULL;
    $_SESSION['chance'] = $chance;
    $_SESSION['peek'] = $peek;
  }else if(isset($_POST['peek'])){
    $peek = $_POST['peek'];
    $chance = NULL;
    $_SESSION['chance'] = $chance;
    $_SESSION['peek'] = $peek;
  }

  //Define $chance_num,$peek_num based on player's choice, chance_num and peek_num means number of chance and peek tool
  if((!isset($_POST['chance_num'])) && (!isset($_POST['peek_num']))){
    $chance_num = 0;
    $peek_num = 0;
    $_SESSION['chance_num'] = $chance_num;
    $_SESSION['peek_num'] = $peek_num;
  }else if((isset($_POST['chance_num'])) && (isset($_POST['peek_num']))){
    $chance_num = $_POST['chance_num'];
    $peek_num = $_POST['peek_num'];
    $_SESSION['chance_num'] = $chance_num;
    $_SESSION['peek_num'] = $peek_num;
  }else if(isset($_POST['chance_num'])){
    $chance_num = $_POST['chance_num'];
    $peek_num = 0;
    $_SESSION['chance_num'] = $chance_num;
    $_SESSION['peek_num'] = $peek_num;
  }else if(isset($_POST['peek_num'])){
    $peek_num = $_POST['peek_num'];
    $chance_num = 0;
    $_SESSION['chance_num'] = $chance_num;
    $_SESSION['peek_num'] = $peek_num;
  }

  //Define $bomb,$refresh based on player's choice, $bomb controls bomb icon, $refresh controls refresh icon
  if((!isset($_POST['refresh'])) && (!isset($_POST['bomb']))){
    $refresh = NULL;
    $bomb = NULL;
    $_SESSION['refresh'] = $refresh;
    $_SESSION['bomb'] = $bomb;
  }else if((isset($_POST['refresh'])) && (isset($_POST['bomb']))){
    $refresh = $_POST['refresh'];
    $bomb = $_POST['bomb'];
    $_SESSION['refresh'] = $refresh;
    $_SESSION['bomb'] = $bomb;
  }else if(isset($_POST['refresh'])){
    $refresh = $_POST['refresh'];
    $bomb = NULL;
    $_SESSION['refresh'] = $refresh;
    $_SESSION['bomb'] = $bomb;
  }else if(isset($_POST['bomb'])){
    $bomb = $_POST['bomb'];
    $refresh = NULL;
    $_SESSION['refresh'] = $refresh;
    $_SESSION['bomb'] = $bomb;
  }

  //Define $re_num,$bomb_num based on player's choice, $re_num sets number of refresh icon, $bomb_num sets number of bomb icon
  if((!isset($_POST['re_num'])) && (!isset($_POST['bomb_num']))){
    $re_num = 0;
    $bomb_num = 0;
    $_SESSION['re_num'] = $re_num;
    $_SESSION['bomb_num'] = $bomb_num;
  }else if((isset($_POST['re_num'])) && (isset($_POST['bomb_num']))){
    $re_num = $_POST['re_num'];
    $bomb_num = $_POST['bomb_num'];
    $_SESSION['re_num'] = $re_num;
    $_SESSION['bomb_num'] = $bomb_num;
  }else if(isset($_POST['re_num'])){
    $re_num = $_POST['re_num'];
    $bomb_num = 0;
    $_SESSION['re_num'] = $re_num;
    $_SESSION['bomb_num'] = $bomb_num;
  }else if(isset($_POST['bomb_num'])){
    $bomb_num = $_POST['bomb_num'];
    $re_num = 0;
    $_SESSION['re_num'] = $re_num;
    $_SESSION['bomb_num'] = $bomb_num;
  }

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

echo "<h1 class = 'index_h1'>Memory Game ~~~~</h1>";
echo "<p class = 'index_p'>Author: Chung Jun Wang</p>";

if($_SESSION['login'] == 0){
  echo "<p class = 'index_welcome'>Hello ~~~ Welcome !!! Please login first .</p>";
}elseif ($_SESSION['login'] == 1) {
  echo "<p class = 'index_welcome'>".$welcome_text." </p>";
}

echo "<form class = 'index_form' action = 'game.php' method = 'post'>";

echo "<table class = 'index_table' >";

echo "<tr>
        <td class = 'index_cell play_button'>";

        if($_SESSION['login'] == 0){

          echo "<button class = 'index_login' type = 'button'>Please Login... </button>
                <p class = 'logout displaynone'>Log Out !!!</p>";
        }elseif ($_SESSION['login'] == 1) {

          echo "<button class = 'index_sub' type = 'submit'>Start to Play !!!</button>
                <p class = 'logout'>Log Out !!!</p>";
        }

echo "  </td>
      </tr>";

echo "</form>";

echo "<form class = 'index_form' action = 'option.php' method = 'post'>";

echo "<tr>
        <td class = 'index_cell'>";

          if($_SESSION['login'] == 0){
            echo "<button class = 'index_option' type = 'submit' disabled >Option</button>";
          }elseif($_SESSION['login'] == 1){
            echo "<button type = 'submit'>Option</button>";
          }

echo   "</td>
      </tr>";

echo "</form>";

echo "<form class = 'index_profile' action = 'profile.php' method = 'post'>";

echo "<tr>
        <td class = 'index_cell'>";

          if($_SESSION['login'] == 0){
            echo "<button class = 'index_option' type = 'submit' disabled >Your Profile</button>";
          }elseif($_SESSION['login'] == 1){
            echo "<button type = 'submit'>Your Profile</button>";
          }

echo   "</td>
      </tr>";

echo "</form>";

echo "<tr>
        <td class = 'index_cell'>
          <button type = 'button'>Exit</button>
        </td>
     </tr>";

echo "</table>";

echo "<p class = 'index_n'>This game supports different size of screen, NB and PC are all good. </p>";

echo "<div class = 'login_container'>";

echo "<div class = 'login'>
         <div class = 'login_op'>
             <ul>
               <li class = 'login_li tab_up'>LogIn</li>
               <li class = 'signup_li tab_down'>SignUp</li>
               <li class = 'border_li'></li>
             </ul>
         </div>

         <table class = 'login_table'>
           <tr>
             <td class = 'login_td'>
               <h2>Username:</h2><input class = 'login_input player_name'></input>

             </td>
           </tr>
           <tr>
             <td class = 'login_td'>
               <h2>Password:</h2><input class = 'login_input player_password' type = 'password'></input>
             </td>
           </tr>
           <tr>
             <td class = 'login_td'>
                <button class = 'login_button' type = 'button'>LogIn</button>
             </td>
           </tr>
         </table>

         <table class = 'signup_table displaynone'>

         <tr>
           <td class = 'signup_td'>
             <h2 class='signup_user'>Username:</h2><input class = 'signup_input signup_name' id = 'playername'></input>
             <p class = 'invalid_name red displaynone'>Username has been token!</p>
             <p class = 'index_n check_n'>4 ~ 12 characters. Required !</p>
           </td>
         </tr>

         <tr>
           <td class = 'signup_td'>
            <h2 class='signup_pass'>Password:</h2><input class = 'signup_input signup_password' id = 'password' type = 'password'></input>
            <p class = 'index_n check_pass' >At least 8 characters. Required !</p>
           </td>
         </tr>

         <tr>
           <td class = 'signup_td'>
             <h2 class='signup_firstname'>First Name:</h2><input class = 'signup_input first_name'></input>
            </td>
         </tr>

         <tr>
           <td class = 'signup_td'>
             <h2 class='signup_lastname'>Last Name:</h2><input class = 'signup_input last_name'></input>
           </td>
         </tr>

         <tr>
           <td class = 'signup_td'>
             <h2 class='signup_country'>Country:</h2>
             <select class = 'signup_input country'>
               <option disabled selected value> -- select an option -- </option>";

               $sql = "SELECT country_name FROM countries_list";
               $result = $conn->query($sql);

               while($row = $result->fetch_assoc()){
                 echo "<option value = '".$row['country_name']."'>".$row['country_name']."</option>";
              }



echo "        </select>
           </td>
         </tr>

         <tr>
           <td class = 'signup_td'>
             <h2 class='signup_email'>E-amil:</h2><input class = 'signup_input player_email' id = 'email'></input>
             <p class = 'index_n check_mail' >E-mail address. Required !</p>
           </td>
         </tr>

         <tr>
           <td class = 'signup_td'>
              <button class = 'signup_button' type = 'button' disabled >SignUp</button>
           </td>
         </tr>
       </table>

      </div>";

echo "</div>";

?>

</body>
</html>
