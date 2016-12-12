<?php

if(!isset($_SESSION)){
  session_start();
}

$h = $_SESSION['h'];
$w = $_SESSION['w'];
$refresh = $_SESSION['refresh'];
$bomb = $_SESSION['bomb'];
$re_num = $_SESSION['re_num'];
$bomb_num = $_SESSION['bomb_num'];
$cells = $_SESSION['cells'];
$chance = $_SESSION['chance'];
$peek = $_SESSION['peek'];
$chance_num = $_SESSION['chance_num'];
$peek_num = $_SESSION['peek_num'];



//Build array $icon contain icon file name from 001.png to 095.png, $icon[1001] = bomb.png, $icon[1002] = refresh.png
$icon = array(1001 => "bomb.png",1002 => "refresh.png");

for($i=1; $i<=95; $i++){
  if($i<10){
    $n="$i";
    $icon[$i] = "00".$n.".png";
  }elseif($i>=10 && $i<100){
    $n="$i";
    $icon[$i] = "0".$n.".png";
  }
}

//Build array $count contain int from 1 to 95, 1001, 1002
$count = array(1001 => 1001,1002 => 1002);

for($i=1; $i<=95; $i++){
  $count[$i] = $i;
}

//Build array $pick based on different choices of $refresh and $bomb
if(($refresh == NULL) && ($bomb == NULL )){
  //echo "No bomb and refresh!";
  //Build array $pick contain pairs of int picked from array $count
  for($i=1; $i<=$cells; $i++){
    if($i%2!=0){
      $r = rand(1,95);
    }
    $pick[$i] = $count[$r];
  }

  shuffle($pick);

}elseif (($refresh != NULL) && ($bomb != NULL)) {
  //echo "Both bomb and refresh are set!";
  //Pick bomb icon
  for($i=1; $i<=$re_num; $i++){
    $pick[$i] = $count[1001];
  }
  //Pick refresh icon
  for($i=$re_num+1; $i<=$re_num+$bomb_num; $i++){
    $pick[$i] = $count[1002];
  }
  //Build array $pick contain pairs of int picked from array $count
  for($i=$re_num+$bomb_num+1; $i<=$cells; $i++){
    if($i%2!=0){
      $r = rand(1,95);
    }
    $pick[$i] = $count[$r];
  }

  shuffle($pick);

}elseif (($bomb != NULL) && ($refresh == NULL)) {
  //echo "Only set bomb!";
  //Pick bomb icon
  for($i=1; $i<=$bomb_num; $i++){
    $pick[$i] = $count[1001];
  }
  //build array $pick contain pairs of int picked from array $count
  for($i=$bomb_num+1; $i<=$cells; $i++){
    if($i%2!=0){
      $r = rand(1,95);
    }
    $pick[$i] = $count[$r];
  }

  shuffle($pick);

}elseif (($bomb == NULL) && ($refresh != NULL)) {
  //echo "Only set refresh!";
  //Pick refresh icon
  for($i=1; $i<=$re_num; $i++){
    $pick[$i] = $count[1002];
  }
  //build array $pick contain pairs of int picked from array $count
  for($i=$re_num+1; $i<=$cells; $i++){
    if($i%2!=0){
      $r = rand(1,95);
    }
    $pick[$i] = $count[$r];
  }

  shuffle($pick);

}

//Echo Game Icons Table Here!
echo "<table class='main_table' data-row='$h' data-col='$w' data-re='$refresh'
      data-bomb='$bomb' data-renum='$re_num' data-bombnum='$bomb_num' data-chance='$chance' data-peek='$peek' data-chancenum='$chance_num' data-peeknum='$peek_num'>";

$c=-1;
for($r=1 ; $r<=$h ; $r++){
    echo "<tr>";
    for($d=1 ; $d<=$w ; $d++){
      $c++;
      $a = $pick[$c];
      echo "<td class = \"cell\" id = '$r-$d' style='background-image:url(images/$icon[$a]);'></td>";
    }
    echo "</tr>";
}
echo "</table>";

?>
