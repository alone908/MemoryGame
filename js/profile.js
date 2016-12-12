$(document).ready(function(){

  yoursli = 1,
  allli = 0,

  $('.yours_li').click(function(){

      if(yoursli == 0 && allli == 1){
        $('.yours_table').toggleClass('displaynone');
        $('.all_table').toggleClass('displaynone');
        $('.yours_li').removeClass('tab_down').addClass('tab_up');
        $('.all_li').removeClass('tab_up').addClass('tab_down');
        yoursli = 1;
        allli = 0;
      }

  })


  $('.all_li').click(function(){

      if(yoursli == 1 && allli == 0){
        $('.yours_table').toggleClass('displaynone');
        $('.all_table').toggleClass('displaynone');
        $('.yours_li').removeClass('tab_up').addClass('tab_down');
        $('.all_li').removeClass('tab_down').addClass('tab_up');
        yoursli = 0;
        allli = 1;
     }
  })



});
