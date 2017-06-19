$(document).ready(function(){
  $('.schedule').mouseenter(function(){
    $(this).fadeTo('fast',.6);
  });
  $('.schedule').mouseleave(function(){
    $(this).fadeTo('fast',1);
  });
});
