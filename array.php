<?php

$cells = $_POST['row_num']*$_POST['col_num'];

//build array $icon contain icon file name from 001.png to 095.png
for($i=1; $i<=95; $i++){
  if($i<10){
    $n="$i";
    $icon[$i] = "00".$n.".png";
  }elseif($i>=10 && $i<100){
    $n="$i";
    $icon[$i] = "0".$n.".png";
  }
}

//build array $count contain int from 1 to 95
for($i=1; $i<=95; $i++){
  $count[$i] = $i;
}

//build array $pick contain pairs of int picked from array $count
for($i=1; $i<=$cells; $i++){
  if($i%2!=0){
    $r = rand(1,95);
    }
  $pick[$i] = $count[$r];
}

shuffle($pick);
?>
