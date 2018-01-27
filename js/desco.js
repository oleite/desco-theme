jQuery(document).ready(function($) {


//----- SIDENAV -----//
   $(document).on('click', '.js-toggleSidenav', function() {
      $('.sidenav').toggleClass('sidenav-closed');
      if ($(window).width() > 1100) {
         $('.sidenav-open').toggleClass('sidenav-opened');
      }
   });


//----- NOX -----//

   var isNox = localStorage['nox'];

   if (isNox == 'true') {
     $('*').addClass('nox');
   }

   $(document).on('click', '#nox', function() {

      if (isNox == 'true') {
         $('*').removeClass('nox');
         localStorage['nox'] = 'false';
         isNox = 'false';
      } else {
         $('*').addClass('nox');
         localStorage['nox'] = 'true';
         isNox = 'true';
      }

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
   $('.js-highlightable').on('click', 'p', function() {
      $(this).toggleClass('highlight');
   });


//----- POSTS LOADING AJAX FUNCTIONS -----//
   $(document).on('click', '.js-load-more', function() {

      $('.js-icon-loading').toggleClass('icon-loading');

      var that = $(this);
      var page = that.data('page');
      var newPage = page + 1;
      var ajaxurl = $(this).data('url');


      $.ajax({

         url : ajaxurl,
         type : 'post',
         data : {
            page : page,
            action : 'desco_load_more'
         },
         error : function( response ){
            console.log(response);
            $('.js-icon-loading').toggleClass('icon-loading');
         },
         success : function( response ) {

            that.data('page', newPage);
            $('.js-posts-container').append( response );
            $('.js-icon-loading').toggleClass('icon-loading');

         }

      });
   });


});
