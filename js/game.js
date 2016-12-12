$(document).ready(function(){

var attr_1,
    attr_2,
    cellclick = 0,
    timer,
    timer_countdown,
    row_val = $('.main_table').attr('data-row'),
    col_val = $('.main_table').attr('data-col'),
    chance_val = $('.main_table').attr('data-chancenum'),
    peek_val = $('.main_table').attr('data-peeknum'),
    re_val,
    bomb_val,
    gamestart = 0,
    oohrefreshing = 0,
    bombing = 0,
    counting,
    cell_num,
    icons,
    pairs,
    pair_remain,
    prob_re,
    prob_bomb,
    goodjob,
    tryagain,
    chance = 0,
    timer_countdown,
    timer_counting,
    peeking = 0,
    or_chancenum,
    or_peeknum,
    use_chance,
    use_peek,
    score,
    bonus,
    cut,
    stepon_re,
    stipon_bomb,
    result,
    finalscore,
    windowheight = window.innerHeight,
    leftdiv_height = $('.game_left_div').outerHeight(),
    rightdiv_height = $('.game_right_div').outerHeight(),
    gametable_height = $('.game_table').outerHeight(),
    h1_height = $('.h1').outerHeight();

  timer = window.setInterval(changeh1,1000);
  window.setTimeout(game_start,3000);
  count_icon();

  function changeh1(){

    if(gamestart == 0){
      if($('h1').text() == "Let's Play Memory Game ~~~"){
        $('h1').text("Game will start in 3 seconds")
      }else if($('h1').text() == "Game will start in 3 seconds"){
        $('h1').text("Game will start in 2 seconds")
      }else if($('h1').text() == "Game will start in 2 seconds"){
        $('h1').text("Game will start in 1 seconds")
      }else if($('h1').text() == "Game will start in 1 seconds"){
        $('h1').text("Let's Play Memory Game ~~~")
        clearInterval(timer);
      }else if (bombing == 0) {
        $('h1').text("Game will start in 3 seconds");
      }
    }

    if(gamestart == 1){

        if(bombing >= 1 ){

          if(counting > 0){
            $('h1').text("Start to Countdown: "+counting+" seconds");
          }else if(counting <= 0){
            $('h1').text("Start to Countdown: 0 seconds");
            game_end();
          }

            if(peeking == 1){

              $('h1').text("Choose a Icon you want to see. (Bombing:"+counting+"seconds)");

            }else if (peeking == 0) {

              $('h1').text("Start to Countdown: "+counting+" seconds");

                 if(chance == 0){

                     $('h1').text("Start to Countdown: "+counting+" seconds");

                     if(oohrefreshing == 1){

                       $('h1').text("Oh~Oh~ Refreshing Icons Now!!!");

                     } else if (oohrefreshing == 0) {

                         $('h1').text("Start to Countdown: "+counting+" seconds");

                     }

                 }else if (chance == 1) {

                     $('h1').text("So Lucky ~~~ (Bombing:"+counting+"seconds)");

                 }else if (chance == -1) {

                     $('h1').text("Bad Luck ..... (Bombing:"+counting+"seconds)");

                 }

            }

        }else if (bombing == 0) {

          $('h1').text("Let's Play Memory Game ~~~");

             if(peeking == 1){

               $('h1').text("Choose a Icon you want to see.");


             }else if (peeking == 0) {

               $('h1').text("Let's Play Memory Game ~~~");

                 if(chance == 0){

                     $('h1').text("Let's Play Memory Game ~~~");

                     if(oohrefreshing == 1){

                       $('h1').text("Oh~Oh~ Refreshing Icons Now!!!");

                     } else if (oohrefreshing == 0) {

                         $('h1').text("Let's Play Memory Game ~~~");

                     }

               }else if (chance == 1) {

                     $('h1').text("So Lucky ~~~ ");

               }else if (chance == -1) {

                     $('h1').text("Bad Luck ..... ");

               }
            }

       }

    }
  }

  function game_start(){

    goodjob = 0;
    tryagain = 0;
    stepon_re = 0;
    stepon_bomb = 0;
    gamestart ++;
    clearInterval(timer_countdown);

    if(typeof $('.chance').attr('disabled') !== "undefined"){
      $('.chance').removeAttr('disabled');
    }

    if(typeof $('.peek').attr('disabled') !== "undefined"){
      $('.peek').removeAttr('disabled');
    }

    if($('.main_table').attr('data-peek') !== "on"){
      $('.peek').attr('disabled',"");
    }

    if($('.main_table').attr('data-chance') !== "on"){
      $('.chance').attr('disabled',"");
    }

    $('.cell').append('<img src=\'images/close.png\'></img>');
    if(gamestart == 1){
        $('.st_over').removeAttr('disabled');
    }

    restore_class();

    $('.cell').click(click_cell);
    $('.bomb').click(click_bomb);
    $('.refresh').click(click_refresh);

  }  //game_start function end here!!!!

  function click_cell(){

    if($(this).attr('class') == "paired"){
      console.log("Already paired");
    }else if (($(this).attr('class') == "cell")) {

      cellclick ++;

      if($('.cell').css('width') == "102px" && $('.cell').css('height') == "102px"){
        $(this).children('img').animate({height:0,width:102,},200);
      }else if ($('.cell').css('width') == "76px" && $('.cell').css('height') == "76px") {
        $(this).children('img').animate({height:0,width:76,},200);
      }else if ($('.cell').css('width') == "55px" && $('.cell').css('height') == "55px") {
        $(this).children('img').animate({height:0,width:55,},200);
      }

      if(cellclick%2 != 0){

        $(this).addClass('open');
        $(this).removeClass('cell');
        attr_1 = $(this).attr('style');

      }else if(cellclick%2 == 0){

        cellclick = cellclick - 2;
        $(this).addClass('open');
        $(this).removeClass('cell');
        attr_2 = $(this).attr('style');

      }

      if(attr_2 == attr_1 && cellclick == 0){

        console.log("Good Job");
        goodjob ++;
        pair_remain = pairs - goodjob;
        prob_re = (renum_val/(icons - goodjob*2))*100;
        prob_bomb = (bombnum_val/(icons - goodjob*2))*100;

        $('.pair_remain').html(pair_remain);
        $('.re_prob').html(prob_re.toFixed(2)+"%");
        $('.bomb_prob').html(prob_bomb.toFixed(2)+"%");

        window.setTimeout(to_paired,300);
        function to_paired(){

        $('.open').addClass('paired');
        $('.open').empty();
        $('.open').append('<img src=\'images/good.png\'></img>');
        $('.paired').removeClass('open').removeClass('cell');
        countscore();

        }
      }else if(attr_2 != attr_1  && cellclick == 0){

         console.log("Try again");
         tryagain ++;
         window.setTimeout(to_close,300);
         function to_close(){

         if($('.cell').css('width') == "102px" && $('.cell').css('height') == "102px"){
           $('.open').children('img').animate({height:102,width:102,},200);
         }else if ($('.cell').css('width') == "76px" && $('.cell').css('height') == "76px") {
           $('.open').children('img').animate({height:76,width:76,},200);
         }else if ($('.cell').css('width') == "55px" && $('.cell').css('height') == "55px") {
           $('.open').children('img').animate({height:55,width:55,},200);
         }
         $('.open').addClass('cell');
         $('.open').removeClass('open');

         }
      }
    }

    if(bombing >= 1){
      if(goodjob - cancelbomb == 3){
          clearInterval(timer_countdown);
          $('.bombing').append('<img src=\'images/close.png\'></img>');
          bombing = 0;
          changeh1();
          $('.bombing').addClass('bomb');
          $('.bombing').removeClass('bombing');
      }
    }

    if(goodjob == pairs){
      game_end();
    }
  }

  function click_refresh(){

    cellclick = 0;
    oohrefreshing = 1;
    stepon_re ++;
    countscore();

    if(oohrefreshing == 1){
      $('.st_over').attr('disabled',"");
    }

    changeh1();
    //console.log("Oh!Oh! Refreshing Now");

    for(r=1; r <= row_val; r++){
      for(c=1; c <= col_val; c++){
        if($('#'+r+"-"+c).attr('class') != "paired"){
          $('#'+r+"-"+c).empty();
          $('.cell').off('click');
          $('.refresh').off('click');
          $('.bomb').off('click');
          $('#'+r+"-"+c).toggleClass('open',false);
          $('#'+r+"-"+c).toggleClass('refresh',false);
          $('#'+r+"-"+c).toggleClass('bomb',false);
          $('#'+r+"-"+c).toggleClass('cell',false);
        }
      }
    }

    var changetimes = 0

    timer2 = window.setInterval(exchangeicon,50);

    function exchangeicon(){

      changetimes ++;
      //chose first cell randomly, pr1 and pc1 mean row and column, also exclued paired cell;
      var done = 0;
      while(done == 0){
        var pr1 = Math.round((1+Math.random()*(row_val-1)));
        var pc1 = Math.round((1+Math.random()*(col_val-1)));
        if($('#'+pr1+"-"+pc1).attr('class') == "paired" || $('#'+pr1+"-"+pc1).attr('class') == "bombing"){
          done = 0;
        }else {
          done = 1;
        }
      }

      //chose second cell randomly, pr2 and pc2 mean row and column, also exclued paired cell and the first cell above;
      var done = 0;
      while(done == 0){
        var pr2 = Math.round((1+Math.random()*(row_val-1)));;
        var pc2 = Math.round((1+Math.random()*(col_val-1)));;
        if($('#'+pr2+"-"+pc2).attr('class') == "paired" || $('#'+pr2+"-"+pc2).attr('class') == "bombing"){
          done = 0;
        }else {
          if(pr2 == pr1 && pc2 == pc1){
            done = 0;
          }else {
            done =1;
          }
        }
      }

      var background_1 = $('#'+pr1+"-"+pc1).attr('style');
      var background_2 = $('#'+pr2+"-"+pc2).attr('style');

      $('#'+pr1+"-"+pc1).attr('style', background_2);
      $('#'+pr2+"-"+pc2).attr('style', background_1);

      if( changetimes == (pair_remain*2) || changetimes == (row_val)*(col_val)){
        //console.log(changetimes);
        clearInterval(timer2);
        oohrefreshing = 0;
        changeh1();
        if(oohrefreshing == 0){
          $('.st_over').removeAttr('disabled');
        }

        for(r=1; r <= row_val; r++){
          for(c=1; c <= col_val; c++){
            if($('#'+r+"-"+c).attr('class') != "paired" && $('#'+r+"-"+c).attr('class') != "bombing"){

              $('#'+r+"-"+c).append('<img src=\'images/close.png\'></img>');
              if($('#'+r+"-"+c).attr('style') === "background-image:url(images/refresh.png);"){
                $('#'+r+"-"+c).toggleClass('refresh',true);
              }else if ($('#'+r+"-"+c).attr('style') === "background-image:url(images/bomb.png);" && $('#'+r+"-"+c).attr('class') != "bombing") {
                $('#'+r+"-"+c).toggleClass('bomb',true);
              }else {
                $('#'+r+"-"+c).toggleClass('cell',true);
              }

            }
          }
        }
        $('.refresh').click(click_refresh);
        $('.bomb').click(click_bomb);
        $('.cell').click(click_cell);
      }
    }    //function exchangeicon end here
  }      //function click_refresh end here

  function click_bomb(){

    stepon_bomb ++;
    countscore();
    $(this).removeClass('bomb').addClass('bombing');

    if(bombing == 0){
      bombing = 1;
      cancelbomb = goodjob;
    }else if (bombing == 1) {
      bombing ++;
    }

    if(bombing == 1){
      counting = 60;
    }else if (bombing > 1) {
      counting = Math.round((counting/2) + 0.5);
    }

    changeh1();

    if(bombing == 1){
      timer_countdown = window.setInterval(clock,1000);
    }

    function clock(){
      counting -- ;
      changeh1();
    }

    $(this).empty();

  }

  function game_end(){

    countscore();

    if(typeof $('.chance').attr('disabled') === "undefined"){
      $('.chance').attr('disabled',"");
    }

    if(typeof $('.peek').attr('disabled') === "undefined"){
      $('.peek').attr('disabled',"");
    }

    $('.cell').off('click');
    $('.refresh').off('click');
    $('.bomb').off('click');
    $('.bombing').off('click');

    for(r=1; r <= row_val; r++){
      for(c=1; c <= col_val; c++){
         $('#'+r+"-"+c).removeClass('cell');
          $('#'+r+"-"+c).removeClass('refresh');
           $('#'+r+"-"+c).removeClass('bomb');
            $('#'+r+"-"+c).removeClass('bombing');

            if($('#'+r+"-"+c).attr('class') != 'paired'){
              $('#'+r+"-"+c).addClass('end');
            }
        }
    }

    if(gamestart == 0 && bombing == 0  && oohrefreshing == 0 && (goodjob != pairs)){     //Rise game_end div and startover game

      $('.game_end').animate({
        top:"-695",},1500);
        clearInterval(timer_countdown);
      }

    if(gamestart == 1 && bombing >= 0 && oohrefreshing == 0 && (goodjob != pairs)){

      $('.game_end').animate({
      top:"0",},1500);
      $('.end').empty();
      clearInterval(timer_countdown);
      result = "Fail";
      insert_history();
    }

    if(goodjob == pairs && gamestart == 1){

      clearInterval(timer_countdown);
      $('.end').empty();
      $('.game_win').animate({
      top:"0",},1500);
      result = "Win";
      insert_history();
    }

  }

  function restore_class(){

    if(gamestart == 1){

        for(r=1; r <= row_val; r++){
          for(c=1; c <= col_val; c++){
            var classopen = $('#'+r+"-"+c).attr('class');
            if(classopen === "open"){
              $('#'+r+"-"+c).removeClass('open').addClass('cell');
            }
          }
        }

        for(r=1; r <= row_val; r++){
          for(c=1; c <= col_val; c++){
            var cellstyle = $('#'+r+"-"+c).attr('style');
            if(cellstyle === "background-image:url(images/refresh.png);"){
              $('#'+r+"-"+c).removeClass('cell').addClass('refresh');
            }
          }
        }

        for(r=1; r <= row_val; r++){
          for(c=1; c <= col_val; c++){
            var cellstyle = $('#'+r+"-"+c).attr('style');
            if(cellstyle === "background-image:url(images/bomb.png);"){
              $('#'+r+"-"+c).removeClass('cell').addClass('bomb');
            }
          }
        }
    }

  }

  function count_icon(){

    row_val = $('.main_table').attr('data-row');
    col_val = $('.main_table').attr('data-col');
    renum_val = $('.main_table').attr('data-renum');
    bombnum_val = $('.main_table').attr('data-bombnum');
    chance_val = $('.main_table').attr('data-chancenum'),
    peek_val = $('.main_table').attr('data-peeknum'),
    icons = row_val * col_val;
    cell_num = (row_val * col_val)-renum_val-bombnum_val;
    pairs = cell_num/2;
    prob_re = (renum_val/icons)*100;
    prob_bomb = (bombnum_val/icons)*100;
    or_chancenum = chance_val;
    or_peeknum = peek_val;

  }

  $('.st_over').click(function(){

    count_icon();

    $('.pair_remain').html(pairs);
    $('.re_prob').html(prob_re.toFixed(2)+"%");
    $('.bomb_prob').html(prob_bomb.toFixed(2)+"%");
    $('.chance_num').html(chance_val);
    $('.peek_num').html(peek_val);

    if(goodjob == pairs){
      $('.game_win').animate({
      top:"-695",},1500);
    }

    if(gamestart == 1){
      gamestart --;
      bombing = 0;
    }

    if(gamestart == 0){
      $('.st_over').attr('disabled',"");
    }

    if(bombing == 0){
      game_end();
    }

    if(peeking = 1){
      peeking = 0;
    }

    row_val = $('.main_table').attr('data-row');
    col_val = $('.main_table').attr('data-col');
    re_val = $('.main_table').attr('data-re');
    bomb_val = $('.main_table').attr('data-bomb');
    renum_val = $('.main_table').attr('data-renum');
    bombnum_val = $('.main_table').attr('data-bombnum');

    var postdata = {
      row_num: row_val,
      col_num: col_val,
      refresh: re_val,
      bomb: bomb_val,
      re_num: renum_val,
      bomb_num: bombnum_val,
    }
    //console.log(postdata);

    var checkout = $.ajax({
      url:"table.php",
      type:"POST",
      dataType:"text",
      data:postdata,
      success: function(data){
        //console.log(data);
        $('.game_table').html(data);
      },
      error: function(jqXHR,textStatus,errorThrown){
        console.log(textStatus);
      }
    })

    $('.score').html("Score: 0");
    changeh1();
    timer = window.setInterval(changeh1,1000);
    window.setTimeout(game_start,3000);

    var rankbox = $.ajax({
      url:"rankbox.php",
      type:"POST",
      dataType:"text",
      success: function(data){
        $('.right_info').html(data.substr(1,data.length));
      },
      error: function(jqXHR,textStatus,errorThrown){
        console.log(textStatus);
      }
    })

  })

  $('.chance').click(function(){

    if(typeof $('.chance').attr('disabled') === "undefined"){
      $('.chance').attr('disabled',"");
    }

    chance_val --;

    if(chance_val >= 0){

      if(goodjob != pairs && gamestart == 1){

        $('.chance_num').html(chance_val);

        //chose first cell randomly, pr1 and pc1 mean row and column, also exclued paired cell;
          var done = 0;
          while(done == 0){
            var pr1 = Math.round((1+Math.random()*(row_val-1)));
            var pc1 = Math.round((1+Math.random()*(col_val-1)));
            if($('#'+pr1+"-"+pc1).attr('class') !== "cell"){
              done = 0;
            }else {
              done = 1;
            }
          }

        //chose second cell randomly, pr2 and pc2 mean row and column, also exclued paired cell and the first cell above;
          var done = 0;
          while(done == 0){
            var pr2 = Math.round((1+Math.random()*(row_val-1)));;
            var pc2 = Math.round((1+Math.random()*(col_val-1)));;
            if($('#'+pr2+"-"+pc2).attr('class') !== "cell"){
              done = 0;
            }else {
              if(pr2 == pr1 && pc2 == pc1){
                done = 0;
              }else {
                done =1;
              }
            }
          }

          $('#'+pr1+"-"+pc1).empty();
          $('#'+pr2+"-"+pc2).empty();

          $('#'+pr1+"-"+pc1).removeClass('cell').addClass('random');
          $('#'+pr2+"-"+pc2).removeClass('cell').addClass('random');

          if($('#'+pr1+"-"+pc1).attr('style') === $('#'+pr2+"-"+pc2).attr('style')){

            chance = 1;
            //changeh1();
            console.log("Good Job");
            changeh1();
            goodjob ++;
            pair_remain = pairs - goodjob;
            prob_re = (renum_val/(icons - goodjob*2))*100;
            prob_bomb = (bombnum_val/(icons - goodjob*2))*100;

            $('.pair_remain').html(pair_remain);
            $('.re_prob').html(prob_re.toFixed(2)+"%");
            $('.bomb_prob').html(prob_bomb.toFixed(2)+"%");

            window.setTimeout(to_paired,500);
            window.setTimeout(reset_chance,500);

            function reset_chance(){
              chance = 0;
            }

            function to_paired(){

              $('#'+pr1+"-"+pc1).addClass('paired').removeClass('random');
              $('#'+pr2+"-"+pc2).addClass('paired').removeClass('random');
              $('#'+pr1+"-"+pc1).append('<img src=\'images/good.png\'></img>');
              $('#'+pr2+"-"+pc2).append('<img src=\'images/good.png\'></img>');
           }

           window.setTimeout(able_chance,1000);

           function able_chance(){
             if(typeof $('.chance').attr('disabled') !== "undefined"){
               $('.chance').removeAttr('disabled');
             }
           }

           if(bombing >= 1){
             if(goodjob - cancelbomb == 3){
                 clearInterval(timer_countdown);
                 $('.bombing').append('<img src=\'images/close.png\'></img>');
                 bombing = 0;
                 changeh1();
                 $('.bombing').addClass('bomb');
                 $('.bombing').removeClass('bombing');
             }
           }

         }else if ($('#'+pr1+"-"+pc1).attr('style') !== $('#'+pr2+"-"+pc2).attr('style')) {

           chance = -1;
           //changeh1();
           console.log("Try again");
           tryagain ++;
           changeh1();
           window.setTimeout(to_close,500);
           window.setTimeout(reset_chance,500);

           function reset_chance(){
             chance = 0;
           }

           function to_close(){

           $('#'+pr1+"-"+pc1).append('<img src=\'images/close.png\'></img>');
           $('#'+pr2+"-"+pc2).append('<img src=\'images/close.png\'></img>');
           $('#'+pr1+"-"+pc1).removeClass('random').addClass('cell');
           $('#'+pr2+"-"+pc2).removeClass('random').addClass('cell');
          }

          window.setTimeout(able_chance,500);

          function able_chance(){
            if(typeof $('.chance').attr('disabled') !== "undefined"){
              $('.chance').removeAttr('disabled');
            }
          }

        }

        window.setTimeout(changeh1,500);

      }

      if(goodjob == pairs && gamestart == 1){

          clearInterval(timer_countdown);
          $('.end').empty();
          $('.game_win').animate({
          top:"0",},1500);

          if(typeof $('.chance').attr('disabled') !== "undefined"){
            $('.chance').removeAttr('disabled');
          }

          result = "Win";
          insert_history();

        }
     }

     countscore();

  })

  $('.peek').click(function(){

      peeking = 1;
      changeh1();
      peek_val --;

      $('.refresh').off();
      $('.bomb').off();
      $('.cell').off();
      $('.chance').attr('disabled',"");
      $('.peek').attr('disabled',"");

      if(peek_val >= 0){
        $('.peek_num').html(peek_val);
      }

      for(r=1; r <= row_val; r++){
        for(c=1; c <= col_val; c++){
           $('#'+r+"-"+c).removeClass('cell');
            $('#'+r+"-"+c).removeClass('refresh');
             $('#'+r+"-"+c).removeClass('bomb');
              $('#'+r+"-"+c).addClass('peekicon');
          }
      }

      $('.peekicon').click(peekicon);
      countscore();

  })

  function peekicon(){

    $(this).empty();
    $(this).addClass('thisone');
    window.setTimeout(close_peek,500);

    function close_peek(){

      $('.thisone').append('<img src=\'images/close.png\'></img>');
      $('.thisone').removeClass('thisone');
      $('.peekicon').off();

      for(r=1; r <= row_val; r++){
        for(c=1; c <= col_val; c++){
          $('#'+r+"-"+c).removeClass('peekicon');
        }
      }

      for(r=1; r <= row_val; r++){
        for(c=1; c <= col_val; c++){
          if($('#'+r+"-"+c).attr('style') !== "background-image:url(images/bomb.png)" && $('#'+r+"-"+c).attr('style') !== "background-image:url(images/refresh.png)"){
            $('#'+r+"-"+c).addClass('cell');
          }
        }
      }

      for(r=1; r <= row_val; r++){
        for(c=1; c <= col_val; c++){
          var cellstyle = $('#'+r+"-"+c).attr('style');
          if(cellstyle === "background-image:url(images/refresh.png);"){
            $('#'+r+"-"+c).removeClass('cell').addClass('refresh');
          }
        }
      }

      for(r=1; r <= row_val; r++){
        for(c=1; c <= col_val; c++){
          var cellstyle = $('#'+r+"-"+c).attr('style');
          if(cellstyle === "background-image:url(images/bomb.png);"){
            $('#'+r+"-"+c).removeClass('cell').addClass('bomb');
          }
        }
      }

      peeking = 0;
      changeh1();

      $('.refresh').click(click_refresh);
      $('.bomb').click(click_bomb);
      $('.cell').click(click_cell);
      $('.chance').removeAttr('disabled');
      $('.peek').removeAttr('disabled');

    }

  }

  $('.explain_ok').click(function(){

    $('.game_explain').css('display','none');
  })

  function countscore(){

    use_chance = or_chancenum - chance_val;
    use_peek = or_peeknum - peek_val;

    bonus = 50*goodjob * (Number(renum_val) + Number(bombnum_val))/10;
    cut = (stepon_re + stepon_bomb)*5
    score = 50*goodjob *(1 - (use_chance + use_peek)/10 ) - cut;
    finalscore = score + bonus;

    //console.log(use_chance);
    //console.log(use_peek);
    //console.log(bonus);
    //console.log(cut);
    //console.log(score);
    //console.log(finalscore);

    if(goodjob == pairs){
      $('.score').html(finalscore);
    }else {
      $('.score').html(score);
    }

  }

  function insert_history(){

    console.log(result);

    if(result == "Fail"){
      insertscore = score;
    }else if (result == "Win") {
      insertscore = finalscore;
    }

    var postdata = {
      result:result,
      insertscore:insertscore,
    }

    var history = $.ajax({
      url:"history.php",
      type:"POST",
      dataType:"JSON",
      data:postdata,
      success: function(data){
        $('.bestscore').html(data['best_score']);
      },
      error: function(jqXHR,textStatus,errorThrown){
        console.log(textStatus);
      }
    })

  }

})
