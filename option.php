<html>
<head>
    <link href="css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/option.js"></script>
</head>
<body style="background-image:url(images/background.jpg)">

<?php
echo "<div><h1 class = 'op_h1'>Choose Your Option !!!</h1></div>";
echo "<div class = op_div>
        <form action = 'index.php' method = 'post'>
        <button  class = sub_op_button type = 'submit' >Save Choice !!</button><br>";

echo "<table class = 'op_table'>";

echo "<tr>
         <td class = 'op_cell'>
           Choose Level:
         </td>
       </tr>";


echo "<tr>
         <td class = 'op_cell'>
           <input class = 'easy level' type = 'radio' name = 'level' value = 'easy' checked >Easy</input>
           <input class = 'normal level' type = 'radio' name = 'level' value = 'normal'>Normal</input>
           <input class = 'hard level' type = 'radio' name = 'level' value = 'hard'>Hard</input>
           <input class = 'custom level' type = 'radio' name = 'level' value = 'custom'> Custom Choice Below!!</input>
        </td>
       </tr>";

echo "<tr>
         <td class = 'op_cell level_rules'>
            <h4>Rules for this level:</h4>
            <text class = 'col_notice'>(1)</text><text style = 'font-size: 20px;'> Total Icons: 4x6 = 24</text>
            <text class = 'col_notice'>(2)</text><text style = 'font-size: 20px;'> 5 Chance Tools </text>
            <text class = 'col_notice'>(3)</text><text style = 'font-size: 20px;'> 6 Peek Tools </text>

         </td>
      </tr>";


echo "<tr>
         <td class = 'op_cell'>
           <h4>Special Icons:</h4>
            <div style ='width: 330px; padding: 0px; display: inline; float: left;'>
             <img src = 'images/refresh.png' style = 'float: left; margin: 5px;'></img>
             <p class = 'col_notice' style = 'font-size: 20px; '>Refresh Icon: </p>
             <p class = 'notice_p'>Pick two icons randomly in the game and then swap over until all icons position changed.</p>
            </div>
            <div style ='width: 330px; display: inline; float: right;'>
             <img src = 'images/bomb.png' style = 'float: left; margin: 5px;'></img>
               <p class = 'col_notice' style = 'font-size: 20px;' >Bomb Icon: </p>
               <p class = 'notice_p'>Start to countdown 60 seconds, second bomb will halve time!
                                     Only way to cancel is making 3 pairs before timeout.</p>
            </div>
          <h4>Special Tools:</h4>
            <div style ='width: 330px; padding: 0px; display: inline; float: left;'>
              <img src = 'images/chance.png' style = 'margin: 5px;'></img>
              <p class = 'col_notice' style = 'font-size: 20px; '>Chance Tool: </p>
              <p class = 'notice_p'>Open two icons randomly for you. You may make pairs accidently if you are lucky ! </p>
            </div>
            <div style ='width: 330px; display: inline; float: right;'>
              <img src = 'images/peek.png' style = 'margin: 5px;'></img>
              <p class = 'col_notice' style = 'font-size: 20px;' >Peek Tool: </p>
              <p class = 'notice_p'>Let you open 1 icon without any consequence. Useful for finding where are special icons.</p>
            </div>
         </td>
       </tr>";

echo "<tr class='choose_ramdomly_tr'>
         <td class = 'op_cell'>
           <button class = 'random' type = 'button' disabled> Choose Randomly !!!</button>
         </td>
       </tr>";

echo "</table>";

echo "<table class = 'op_table customize_table'>";

echo "<tr>
        <td class = 'op_cell col_1st'>
          How many rows&nbsp
        </td>
        <td class = 'op_cell'>
          <input id='row' type = 'number' min = '2' max = '10' name = 'row_num' value = '4' disabled></input>
        </td>
     </tr>";

echo "<tr>
        <td class = 'op_cell col_1st'>
          How many columns&nbsp
        </td>
        <td class = 'op_cell'>
          <input id='col' type = 'number' min = '4' max = '10' name = 'col_num' value = '6' disabled></input>
        </td>
     </tr>";

echo "<tr>
       <td id = 'icons_num' class = 'op_cell col_1st'>
         Total Icons in Game: 24
       </td>
       <td class = 'op_cell'>
        <h5 style = 'color: red'>Notice !!!</h5>
        <p class = 'notice_p'>You can not have odd icons because each icon need to be paired. <text>Game will adjust row or column number automatically to make sure of this. </text></p>
       </td>
     </tr>";


echo "<tr class = 'chance_op'>
        <td class = 'op_cell col_1st'>
          <input class = 'check_tips' type = 'checkbox' name = 'chance' disabled >Chance Tools</input><br>
        </td>
        <td class = 'op_cell'>
          <input class = 'tips' type = 'number' min = '1' max = '8' name = 'chance_num' value = '4' disabled></input>
        </td>
      </tr>";

echo "<tr class = 'peek_op'>
        <td class = 'op_cell col_1st'>
          <input class = 'check_peek' type = 'checkbox' name = 'peek' disabled >Peek Tools</input><br>
        </td>
        <td class = 'op_cell'>
          <input class = 'peek' type = 'number' min = '1' max = '8' name = 'peek_num' value = '4' disabled></input>
        </td>
      </tr>";

echo "</table>";
echo "<table class = 'op_table customize_table'>";

echo "<tr>
         <td class = 'op_cell' style = 'background-color: rgba(0,199,237,0.65);' >
         <h5 style = 'color: red'>Notice !!!</h5>
         <p class = 'notice_p opcell_2ndstyle'>Total Icons need to be <text class = 'col_notice' style = 'font-weight: bold;'>larger than</text> Refresh Icon + Bomb Icon</text></p>
         </td>
       </tr>";

echo "</table>";
echo "<table class = 'op_table customize_table'>";

echo "<tr class = 're_op'>
        <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
          <input class = 'check_re' type = 'checkbox' name = 'refresh' disabled >Refresh Icon</input><br>
        </td>
        <td class = 'op_cell opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
          <input id = 're_num_2' class = 're_radio' type = 'radio' name = 're_num' value = '2' disabled checked > 2 Icons</input>
          <input id = 're_num_4' class = 're_radio' type = 'radio' name = 're_num' value = '4' disabled> 4 Icons</input>
          <input id = 're_num_6' class = 're_radio' type = 'radio' name = 're_num' value = '6' disabled> 6 Icons</input>
        </td>
     </tr>";

echo "<tr class = 'bomb_op'>
        <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
          <input class = 'check_bomb' type = 'checkbox' name = 'bomb' disabled >Bomb Icon</input><br>
        </td>
        <td class = 'op_cell opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
          <input id = 'bomb_num_2' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '2' disabled checked > 2 Icons</input>
          <input id = 'bomb_num_4' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '4' disabled> 4 Icons</input>
          <input id = 'bomb_num_6' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '6' disabled> 6 Icons</input>
        </td>
      </tr>";

echo "</table>";
echo "</form>";
echo "</div";
?>

</body>
</html>
