<?php

$level = $_POST['level'];

if(isset($level)){

  if($level === 'easy'){

    echo "<h4>Rules for this level:</h4>
          <text class = 'col_notice'>(1)</text><text style = 'font-size: 20px;'> Total Icons: 4x6 = 24</text>
          <text class = 'col_notice'>(2)</text><text style = 'font-size: 20px;'> 5 Chance Tools </text>
          <text class = 'col_notice'>(3)</text><text style = 'font-size: 20px;'> 6 Peek Tools </text>";

  }elseif ($level === 'normal') {

    echo "<h4>Rules for this level:</h4>
          <text class = 'col_notice'>(1)</text><text style = 'font-size: 20px;'> Total Icons: 6x8 = 48</text>
          <text class = 'col_notice'>(2)</text><text style = 'font-size: 20px;'> 3 Chance Tools </text>
          <text class = 'col_notice'>(3)</text><text style = 'font-size: 20px;'> 4 Peek Tools </text>
          <br>
          <text class = 'col_notice'>(4)</text><text style = 'font-size: 20px;'> 2 Refresh Icons </text>
          <text class = 'col_notice'>(4)</text><text style = 'font-size: 20px;'> 2 Bomb Icons </text>";

  }elseif ($level === 'hard') {
    echo "<h4>Rules for this level:</h4>
          <text class = 'col_notice'>(1)</text><text style = 'font-size: 20px;'> Total Icons: 7x10 = 70</text>
          <text class = 'col_notice'>(2)</text><text style = 'font-size: 20px;'> 0 Chance Tools </text>
          <text class = 'col_notice'>(3)</text><text style = 'font-size: 20px;'> 0 Peek Tools </text>
          <br>
          <text class = 'col_notice'>(4)</text><text style = 'font-size: 20px;'> 4 Refresh Icons </text>
          <text class = 'col_notice'>(5)</text><text style = 'font-size: 20px;'> 4 Bomb Icons </text>";
  }elseif ($level === 'custom') {
    echo "<h4>Rules for this level:</h4>
          <text style = 'font-size: 20px; color:red;'>Chose Any Option You Like Below ~~~</text>";
  }





}



 ?>
