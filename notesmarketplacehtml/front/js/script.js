$(function(){

    $(".toggle-password").click(function() {

        $(this).toggleClass("eye");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
})


$(function () {
  showHidenav();
  
  $(window).scroll(function () {

      showHidenav();    
      

  });

  function showHidenav() {


      if ($(window).scrollTop() > 50) {

          //show White navbar
          $("#nav").addClass("bg-light");
          $("ul.navbar-nav > li > a").css("color","#333");
          
          //dark logo

          $("#home-logo img").attr("src", "images/navbarbanner.png");

          

      } else {
          $("#nav").removeClass("bg-light");
          $("ul#home-list > li > a").css("color","#fff");
          // normal logo
          $("#home-logo img").attr("src", "images/top-logo.png");
          
      }


  }
});


$(document).ready(function() {
  for (i = 1; i <5 ; i++) {
      for (j = 5; j >= 1 ; j--) {
          $('.rate'+i+' .rate').append('<input type="radio" id="s_'+i+'_'+j+'" name="rate'+i+'" value="5" /><label for="s_'+i+'_'+j+'" title="text">5 stars</label>');
      }
  }
});

$(document).ready(function(){
  
 $('.card .collapse').on('shown.bs.collapse',function(){
  $(this).parent().find('img').attr('src','images/FAQ/minus.png');
  $(this).parent().find('.card-header').css('background-color','#fff').css('border-bottom','none');
 });
 $('.card .collapse').on('hidden.bs.collapse',function(){
  $(this).parent().find('img').attr('src','images/FAQ/add.png');
  $(this).parent().find('.card-header').css('background-color','rgba(0,0,0,.03)').css('border-bottom','1px solid rgba(0,0,0,0.125)');
 });
});



$(document).ready(function(){
  $('.navbar-collapse').on('shown.bs.collapse',function(){
    $('.navbar-toggler-icon').css("background","none")
    $('.navbar-toggler-icon').html("&times;").css("font-size","45px")
    $('nav').css('height','100%').css('display','block');
    $(window).resize(function(){
      if($(window).width()>991){
        $('.navbar-collapse').collapse("hide");
      }
    });
    if(($(window).scrollTop() < 50)){
      $("#nav").addClass("bg-light");
          $("ul.navbar-nav > li > a").css("color","#333");
          
          //dark logo

          $("#home-logo img").attr("src", "images/navbarbanner.png");
    }
    
   });
   $('.navbar-collapse').on('hidden.bs.collapse',function(){
    
    $('.navbar-toggler-icon').html("&#9776;").css("font-size","35px")
    $('nav').css('height','66px');

    if(($(window).scrollTop() < 50)){
      $("#nav").removeClass("bg-light");
          $("ul#home-list > li > a").css("color","#fff");
          // normal logo
          $("#home-logo img").attr("src", "images/top-logo.png");
                    
    }
   });
})