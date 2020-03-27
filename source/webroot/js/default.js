

$(document).ready(function(){
  AOS.init();
  function scrolls(){
    scroll= $(document).scrollTop();
    if(scroll>=300){
      $('.header2').css({"position":"fixed","margin-top":"-36px","animation":"fadeDown 0.5s forwards"});
      
    }
    else if(scroll<=30){
      $('.header2').css({"position":"","margin-top":"0","animation":""});
    }
  }
  scrolls();
  $(window).scroll(function(event) {
    scrolls();
  });
});
