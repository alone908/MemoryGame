<?php

$row_num = $_POST['row_num'];
$col_num = $_POST['col_num'];
$total_icon = $row_num * $col_num;

$rand_chance = rand(0,1);
$rand_chancenum = rand(1,8);
$rand_peek = rand(0,1);
$rand_peeknum = rand(1,8);

$rand_re_bomb_num = [2,4,6];

$rand_re = rand(0,1);

$rand_bomb = rand(0,1);


if($total_icon <= 10){
  $r = rand(0,1);
  $b = rand(0,1);
  $rand_renum = $rand_re_bomb_num[$r];
  $rand_bombnum = $rand_re_bomb_num[$b];
}elseif ($total_icon > 10) {
  $r = rand(0,2);
  $b = rand(0,2);
  $rand_renum = $rand_re_bomb_num[$r];
  $rand_bombnum = $rand_re_bomb_num[$b];
}

//print_r($rand_chance);
//print_r($rand_chancenum);
//print_r($rand_peek);
//print_r($rand_peeknum);
//print_r($row_num);
//print_r($col_num);

if($rand_chance == 0){

  $len_chance0 =
  strlen("
          <td class = 'op_cell col_1st'>
            <input class = 'check_tips' type = 'checkbox' name = 'chance' >Chance Tools</input><br>
          </td>
          <td class = 'op_cell'>
            <input class = 'tips' type = 'number' min = '1' max = '8' name = 'chance_num' value = '".$rand_chancenum."' disabled></input>
          </td>
        ");

  //print_r($len_chance0);

  echo "
          <td class = 'op_cell col_1st'>
            <input class = 'check_tips' type = 'checkbox' name = 'chance' >Chance Tools</input><br>
          </td>
          <td class = 'op_cell'>
            <input class = 'tips' type = 'number' min = '1' max = '8' name = 'chance_num' value = '".$rand_chancenum."' disabled></input>
          </td>
        ";


}elseif ($rand_chance == 1) {

  $len_chance1 =
  strlen("
          <td class = 'op_cell col_1st'>
            <input class = 'check_tips' type = 'checkbox' name = 'chance' checked >Chance Tools</input><br>
          </td>
          <td class = 'op_cell'>
            <input class = 'tips' type = 'number' min = '1' max = '8' name = 'chance_num' value = '".$rand_chancenum."' ></input>
          </td>
        ");

  //print_r($len_chance1);

  echo "
          <td class = 'op_cell col_1st'>
            <input class = 'check_tips' type = 'checkbox' name = 'chance' checked >Chance Tools</input><br>
          </td>
          <td class = 'op_cell'>
            <input class = 'tips' type = 'number' min = '1' max = '8' name = 'chance_num' value = '".$rand_chancenum."' ></input>
          </td>
        ";


}


if($rand_peek == 0){

  $len_peek0 =
  strlen("
          <td class = 'op_cell col_1st'>
            <input class = 'check_peek' type = 'checkbox' name = 'peek' >Peek Tools</input><br>
          </td>
          <td class = 'op_cell'>
            <input class = 'peek' type = 'number' min = '1' max = '8' name = 'peek_num' value = '".$rand_peeknum."' disabled></input>
          </td>
        ");

  //print_r($len_peek0);

  echo "
          <td class = 'op_cell col_1st'>
            <input class = 'check_peek' type = 'checkbox' name = 'peek' >Peek Tools</input><br>
          </td>
          <td class = 'op_cell'>
            <input class = 'peek' type = 'number' min = '1' max = '8' name = 'peek_num' value = '".$rand_peeknum."' disabled></input>
          </td>
        ";

}elseif ($rand_peek == 1) {

  $len_peek1 =
  strlen("
          <td class = 'op_cell col_1st'>
            <input class = 'check_peek' type = 'checkbox' name = 'peek' checked >Peek Tools</input><br>
          </td>
          <td class = 'op_cell'>
            <input class = 'peek' type = 'number' min = '1' max = '8' name = 'peek_num' value = '".$rand_peeknum."' ></input>
          </td>
        ");

  //print_r($len_peek1);

  echo "
          <td class = 'op_cell col_1st'>
            <input class = 'check_peek' type = 'checkbox' name = 'peek' checked >Peek Tools</input><br>
          </td>
          <td class = 'op_cell'>
            <input class = 'peek' type = 'number' min = '1' max = '8' name = 'peek_num' value = '".$rand_peeknum."' ></input>
          </td>
        ";

}

if($rand_re == 0){

  //print_r($rand_re);
  //print_r($rand_renum);
  $len_rand_re0 =
  strlen("
          <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
            <input class = 'check_re' type = 'checkbox' name = 'refresh' >Refresh Icon</input><br>
          </td>
          <td class = 'op_cell opcell_2ndstyle rand_renum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '2' >
            <input id = 're_num_2' class = 're_radio' type = 'radio' name = 're_num' value = '2' disabled checked > 2 Icons</input>
            <input id = 're_num_4' class = 're_radio' type = 'radio' name = 're_num' value = '4' disabled> 4 Icons</input>
            <input id = 're_num_6' class = 're_radio' type = 'radio' name = 're_num' value = '6' disabled> 6 Icons</input>
          </td>
       ");

  //print_r($len_rand_re0);

  echo "
          <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
            <input class = 'check_re' type = 'checkbox' name = 'refresh' >Refresh Icon</input><br>
          </td>
          <td class = 'op_cell opcell_2ndstyle rand_renum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '2' >
            <input id = 're_num_2' class = 're_radio' type = 'radio' name = 're_num' value = '2' disabled checked > 2 Icons</input>
            <input id = 're_num_4' class = 're_radio' type = 'radio' name = 're_num' value = '4' disabled> 4 Icons</input>
            <input id = 're_num_6' class = 're_radio' type = 'radio' name = 're_num' value = '6' disabled> 6 Icons</input>
          </td>
       ";


}elseif ($rand_re == 1) {

  //print_r($rand_re);
  //print_r($rand_renum);

  if($rand_renum == 2){

    $len_rand_renum2 =
    strlen("
            <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
              <input class = 'check_re' type = 'checkbox' name = 'refresh' checked >Refresh Icon</input><br>
            </td>
            <td class = 'op_cell opcell_2ndstyle rand_renum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '2' >
              <input id = 're_num_2' class = 're_radio' type = 'radio' name = 're_num' value = '2' checked > 2 Icons</input>
              <input id = 're_num_4' class = 're_radio' type = 'radio' name = 're_num' value = '4' > 4 Icons</input>
              <input id = 're_num_6' class = 're_radio' type = 'radio' name = 're_num' value = '6' > 6 Icons</input>
            </td>
         ");

    //print_r($len_rand_renum2);

    echo "
            <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
              <input class = 'check_re' type = 'checkbox' name = 'refresh' checked >Refresh Icon</input><br>
            </td>
            <td class = 'op_cell opcell_2ndstyle rand_renum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '2' >
              <input id = 're_num_2' class = 're_radio' type = 'radio' name = 're_num' value = '2' checked > 2 Icons</input>
              <input id = 're_num_4' class = 're_radio' type = 'radio' name = 're_num' value = '4' > 4 Icons</input>
              <input id = 're_num_6' class = 're_radio' type = 'radio' name = 're_num' value = '6' > 6 Icons</input>
            </td>
         ";


  }elseif ($rand_renum == 4) {

    $len_rand_renum4 =
    strlen("
            <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
              <input class = 'check_re' type = 'checkbox' name = 'refresh' checked >Refresh Icon</input><br>
            </td>
            <td class = 'op_cell opcell_2ndstyle rand_renum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '4' >
              <input id = 're_num_2' class = 're_radio' type = 'radio' name = 're_num' value = '2' > 2 Icons</input>
              <input id = 're_num_4' class = 're_radio' type = 'radio' name = 're_num' value = '4' checked > 4 Icons</input>
              <input id = 're_num_6' class = 're_radio' type = 'radio' name = 're_num' value = '6' > 6 Icons</input>
            </td>
         ");

    //print_r($len_rand_renum4);

    echo "
            <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
              <input class = 'check_re' type = 'checkbox' name = 'refresh' checked >Refresh Icon</input><br>
            </td>
            <td class = 'op_cell opcell_2ndstyle rand_renum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '4' >
              <input id = 're_num_2' class = 're_radio' type = 'radio' name = 're_num' value = '2' > 2 Icons</input>
              <input id = 're_num_4' class = 're_radio' type = 'radio' name = 're_num' value = '4' checked > 4 Icons</input>
              <input id = 're_num_6' class = 're_radio' type = 'radio' name = 're_num' value = '6' > 6 Icons</input>
            </td>
         ";

  }elseif ($rand_renum == 6) {

    $len_rand_renum6 =
    strlen("
            <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
              <input class = 'check_re' type = 'checkbox' name = 'refresh' checked >Refresh Icon</input><br>
            </td>
            <td class = 'op_cell opcell_2ndstyle rand_renum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '6' >
              <input id = 're_num_2' class = 're_radio' type = 'radio' name = 're_num' value = '2' > 2 Icons</input>
              <input id = 're_num_4' class = 're_radio' type = 'radio' name = 're_num' value = '4' > 4 Icons</input>
              <input id = 're_num_6' class = 're_radio' type = 'radio' name = 're_num' value = '6' checked > 6 Icons</input>
            </td>
         ");

    //print_r($len_rand_renum6);

    echo "
            <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
              <input class = 'check_re' type = 'checkbox' name = 'refresh' checked >Refresh Icon</input><br>
            </td>
            <td class = 'op_cell opcell_2ndstyle rand_renum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '6' >
              <input id = 're_num_2' class = 're_radio' type = 'radio' name = 're_num' value = '2' > 2 Icons</input>
              <input id = 're_num_4' class = 're_radio' type = 'radio' name = 're_num' value = '4' > 4 Icons</input>
              <input id = 're_num_6' class = 're_radio' type = 'radio' name = 're_num' value = '6' checked > 6 Icons</input>
            </td>
         ";

  }


}

if($rand_bomb == 0){

  //print_r($rand_bomb);
  //print_r($rand_bombnum);

  $len_rand_bomb0 =
  strlen("
          <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
            <input class = 'check_bomb' type = 'checkbox' name = 'bomb' >Bomb Icon</input><br>
          </td>
          <td class = 'op_cell opcell_2ndstyle rand_bombnum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '2' >
            <input id = 'bomb_num_2' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '2' disabled checked > 2 Icons</input>
            <input id = 'bomb_num_4' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '4' disabled> 4 Icons</input>
            <input id = 'bomb_num_6' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '6' disabled> 6 Icons</input>
          </td>
        ");

  //print_r($len_rand_bomb0);

  echo "
          <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
            <input class = 'check_bomb' type = 'checkbox' name = 'bomb' >Bomb Icon</input><br>
          </td>
          <td class = 'op_cell opcell_2ndstyle rand_bombnum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '2' >
            <input id = 'bomb_num_2' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '2' disabled checked > 2 Icons</input>
            <input id = 'bomb_num_4' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '4' disabled> 4 Icons</input>
            <input id = 'bomb_num_6' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '6' disabled> 6 Icons</input>
          </td>
        ";


}elseif ($rand_bomb == 1) {

  if($rand_bombnum == 2){

    //print_r($rand_bomb);
    //print_r($rand_bombnum);

    $len_rand_bombnum2 =
    strlen("
            <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
              <input class = 'check_bomb' type = 'checkbox' name = 'bomb' checked >Bomb Icon</input><br>
            </td>
            <td class = 'op_cell opcell_2ndstyle rand_bombnum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '2' >
              <input id = 'bomb_num_2' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '2' checked > 2 Icons</input>
              <input id = 'bomb_num_4' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '4' > 4 Icons</input>
              <input id = 'bomb_num_6' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '6' > 6 Icons</input>
            </td>
          ");

    //print_r($len_rand_bombnum2);

    echo "
            <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
              <input class = 'check_bomb' type = 'checkbox' name = 'bomb' checked >Bomb Icon</input><br>
            </td>
            <td class = 'op_cell opcell_2ndstyle rand_bombnum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '2' >
              <input id = 'bomb_num_2' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '2' checked > 2 Icons</input>
              <input id = 'bomb_num_4' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '4' > 4 Icons</input>
              <input id = 'bomb_num_6' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '6' > 6 Icons</input>
            </td>
          ";

  }elseif ($rand_bombnum == 4) {

    //print_r($rand_bomb);
    //print_r($rand_bombnum);

    $len_rand_bombnum4 =
    strlen("
            <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
              <input class = 'check_bomb' type = 'checkbox' name = 'bomb' checked >Bomb Icon</input><br>
            </td>
            <td class = 'op_cell opcell_2ndstyle rand_bombnum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum = '4' >
              <input id = 'bomb_num_2' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '2' > 2 Icons</input>
              <input id = 'bomb_num_4' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '4' checked > 4 Icons</input>
              <input id = 'bomb_num_6' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '6' > 6 Icons</input>
            </td>
          ");

    //print_r($len_rand_bombnum4);

    echo "
            <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
              <input class = 'check_bomb' type = 'checkbox' name = 'bomb' checked >Bomb Icon</input><br>
            </td>
            <td class = 'op_cell opcell_2ndstyle rand_bombnum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum =  '4' >
              <input id = 'bomb_num_2' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '2' > 2 Icons</input>
              <input id = 'bomb_num_4' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '4' checked > 4 Icons</input>
              <input id = 'bomb_num_6' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '6' > 6 Icons</input>
            </td>
          ";

  }elseif ($rand_bombnum == 6) {

    //print_r($rand_bomb);
    //print_r($rand_bombnum);

    $len_rand_bombnum6 =
    strlen("
            <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
              <input class = 'check_bomb' type = 'checkbox' name = 'bomb' checked >Bomb Icon</input><br>
            </td>
            <td class = 'op_cell opcell_2ndstyle rand_bombnum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum =  '6' >
              <input id = 'bomb_num_2' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '2' > 2 Icons</input>
              <input id = 'bomb_num_4' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '4' > 4 Icons</input>
              <input id = 'bomb_num_6' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '6' checked > 6 Icons</input>
            </td>
          ");

    //print_r($len_rand_bombnum6);

    echo "
            <td class = 'op_cell col_1st opcell_2ndstyle' style = 'background-color: rgba(0,199,237,0.65);'>
              <input class = 'check_bomb' type = 'checkbox' name = 'bomb' checked >Bomb Icon</input><br>
            </td>
            <td class = 'op_cell opcell_2ndstyle rand_bombnum' style = 'background-color: rgba(0,199,237,0.65);' data-randnum =  '6' >
              <input id = 'bomb_num_2' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '2' > 2 Icons</input>
              <input id = 'bomb_num_4' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '4' > 4 Icons</input>
              <input id = 'bomb_num_6' class = 'bomb_radio' type = 'radio' name = 'bomb_num' value = '6' checked > 6 Icons</input>
            </td>
          ";

  }

}


?>
