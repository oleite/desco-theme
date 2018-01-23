jQuery(document).ready(function($) {


//----- SIDENAV -----//
   $(document).on('click', '.js-toggleSidenav', function() {
      $('.sidenav').toggleClass('sidenav-closed');
      if ($(window).width() > 1100) {
         $('.sidenav-open').toggleClass('sidenav-opened');
      }
   });


//----- NOX -----//
   $(document).on('click', '#nox', function() {

         $('*').toggleClass('nox');

      return false;
   });
   $(window).scroll(function(){
      var thresholdA = 30; //pixels before start
      var thresholdB = 100; //pixels in wich it will fade

      var op = ($(window).scrollTop() - thresholdA) / thresholdB;

      if( op <= 0 ){
         $("#nox").hide();
      } else {
      	$("#nox").show();
      }

      if(op >= 1){
         op = 1;
      } else if (op <= 0) {
         op = 0;
      }

      $("#nox").css("opacity", op );
   });


//----- HIGHLIGHT TEXT -----//
   $('.highlightable').on('click', 'p', function() {
      $(this).toggleClass('highlight');
   });




});
