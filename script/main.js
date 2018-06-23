$(function($) {
    $("#flipping").flip({
        trigger: 'manual'
    });
  
    $("#sign-up-button").click(function(){
      $("#flipping").flip(true);
    })
  
    $("#sign-in-button").click(function(){
      $("#flipping").flip(false);
    })
          
  });
  
 