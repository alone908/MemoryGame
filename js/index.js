$(document).ready(function(){

  var playername,
      playeremail,
      loginli = 1,
      signupli = 0,
      playername_len,
      password_len,
      mail_len,
      mail_cha,
      mail_result;

  $('.index_login').click(function(){

    if($('.index_h1').css('margin-top') == "150px"){
      $('.login').animate(
        {top: -310},300
      );

    }else if ($('.index_h1').css('margin-top') == "50px") {
      $('.login').animate(
        {top: -310},300
      );

    }

  })

  $('.login_button').click(function(){

    $('.login').animate(
      {top: -950},300
    );

      var datapost = {
        playername:$('.player_name').val(),
        playerpassword:$('.player_password').val(),
      }

      var login_info = $.ajax({

        url:"login.php",
        method:"POST",
        data:datapost,
        dataType:"json",
        success:function(data){
          //location.reload();
          if(data["result"] == "bad"){
            $('.index_welcome').html(data["message"]);
          }else if (data["result"] == "good") {
            $('.index_welcome').html(data["message"]);
            $('.index_option').removeAttr('disabled');
            $('.index_login').html("Start to Play !!!");
            $('.index_login').attr('type','submit');
            $('.index_login').addClass('index_sub').removeClass('index_login');
            $('.logout').toggleClass('displaynone');

          }

        }
      })

  })

  document.getElementById('playername').oninput = function(){

    playername_len = $('#playername').val().length;
    password_len = $('#password').val().length;

    mail_len = $('#email').val().length;
    mail_cha = $('#email').val().indexOf("@");

    $('.invalid_name').addClass('displaynone');

    if(playername_len < 4 || playername_len > 12){
      $('.check_n').removeClass('displaynone');
    }else {
      $('.check_n').addClass('displaynone');
    }

    if(mail_cha == -1 || mail_cha == 0 ||mail_cha == mail_len - 1){
      mail_result = "bad";
    }else if (mail_len == 0) {
      mail_result = "bad";
    }else {
      mail_result = "good";
    }

    check_signup(playername_len,password_len,mail_result);

  }


  document.getElementById('password').oninput = function(){

    password_len = $('#password').val().length;
    playername_len = $('#playername').val().length;

    mail_len = $('#email').val().length;
    mail_cha = $('#email').val().indexOf("@");

    if(password_len < 8){
      $('.check_pass').removeClass('displaynone');
    }else {
      $('.check_pass').addClass('displaynone');
    }

    if(mail_cha == -1 || mail_cha == 0 ||mail_cha == mail_len - 1){
      mail_result = "bad";
    }else if (mail_len == 0) {
      mail_result = "bad";
    }else {
      mail_result = "good";
    }

    check_signup(playername_len,password_len,mail_result);

  }


  document.getElementById('email').oninput = function(){

    playername_len = $('#playername').val().length;
    password_len = $('#password').val().length;

    mail_len = $('#email').val().length;
    mail_cha = $('#email').val().indexOf("@");

    if(mail_cha == -1 || mail_cha == 0 ||mail_cha == mail_len - 1){
      $('.check_mail').removeClass('displaynone');
      $('.check_mail').html("Illegal mail address !");
      mail_result = "bad";
    }else {
      $('.check_mail').addClass('displaynone');
      mail_result = "good";
    }

    if(mail_len == 0) {
      $('.check_mail').removeClass('displaynone');
      $('.check_mail').html("E-mail address. Required !");
      mail_result = "bad";
    }

    check_signup(playername_len,password_len,mail_result);

  }

  function check_signup(playername_len,password_len,mail_result){

    if(playername_len < 4 || playername_len > 12 || password_len < 8 || mail_result == "bad"){
      $('.signup_button').attr('disabled',"");
    }else {
      $('.signup_button').removeAttr('disabled');
    }

  }


  $('.signup_button').click(function(){

    var datapost = {
      playername:$('.signup_name').val(),
      playerpassword:$('.signup_password').val(),
      playeremail:$('.player_email').val(),
      firstname:$('.first_name').val(),
      lastname:$('.last_name').val(),
      country:$('.country').val(),
      playername: $('#playername').val(),
    }

    var chk_playername = $.ajax({
      url: "signup.php",
      method: "POST",
      data: datapost,
      dataType: "JSON",
      success: function(data){

        if(data["result"] == "bad"){
          $('.invalid_name').removeClass('displaynone');
          $('.signup_button').attr('disabled',"");

        }else if(data["result"] == "good"){

          $('.signup_button').attr('disabled',"");
          $('.invalid_name').removeClass('displaynone');
          $('.check_pass').removeClass('displaynone');
          $('.check_mail').html("E-mail address. Required !");
          $('.check_mail').removeClass('displaynone');
          $('.signup_input').val('');

          $('.login_table').toggleClass('displaynone');
          $('.signup_table').toggleClass('displaynone');
          $('.login_li').removeClass('tab_down').addClass('tab_up');
          $('.signup_li').removeClass('tab_up').addClass('tab_down');
          loginli = 1;
          signupli = 0;

          $('.login').animate(
            {top: -900},300
          );

          $('.index_welcome').html(data["message"]);

        }
      },
    })

  })

  $('.logout').click(function(){

    var datapost = {
      logout: 1,
    }

    var login_info = $.ajax({

      url:"login.php",
      method:"POST",
      data:datapost,
      dataType:"text",
      success:function(data){
        location.reload();
      }
    })

  })


  $('.login_li').click(function(){

      if(loginli == 0 && signupli == 1){
        $('.login_table').toggleClass('displaynone');
        $('.signup_table').toggleClass('displaynone');
        $('.login_li').removeClass('tab_down').addClass('tab_up');
        $('.signup_li').removeClass('tab_up').addClass('tab_down');
        loginli = 1;
        signupli = 0;
      }

  })


  $('.signup_li').click(function(){

      if(loginli == 1 && signupli == 0){
        $('.login_table').toggleClass('displaynone');
        $('.signup_table').toggleClass('displaynone');
        $('.login_li').removeClass('tab_up').addClass('tab_down');
        $('.signup_li').removeClass('tab_down').addClass('tab_up');
        loginli = 0;
        signupli = 1;
     }
  })

})
