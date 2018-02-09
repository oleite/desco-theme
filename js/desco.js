jQuery(document).ready(function($) {


//----- SIDENAV -----//
   function toggleSidenav() {
      $('.sidenav').toggleClass('sidenav-closed');
      $('body').toggleClass('page-overlay');

      if ($(window).width() > 1100) {
         $('.sidenav-open').toggleClass('sidenav-opened');
      }
   }
   $(document).on('click', '.js-toggleSidenav', function() {
      toggleSidenav();
   });

   $(document).keyup(function(e) {
      if  (e.keyCode == 27) { // escape key maps to keycode `27`
         toggleSidenav();
      }

   });
   $(document).mouseup(function(e)
   {
      var container = $(".sidenav-container");

      // if the target of the click isn't the container nor a descendant of the container
      if (!container.is(e.target) && container.has(e.target).length === 0 && !$('.sidenav').hasClass('sidenav-closed'))
      {
          toggleSidenav();
      }
   });


//----- NOX -----//

   var isNox = localStorage['nox'];
   var noxSelector = 'body';

   if (isNox == 'true') {
     $(noxSelector).addClass('nox');
   }

   //Nox button
   $(document).on('click', '#nox', function() {

      if (isNox == 'true') {
         $(noxSelector).removeClass('nox');
         localStorage['nox'] = 'false';
         isNox = 'false';
      } else {
         $(noxSelector).addClass('nox');
         localStorage['nox'] = 'true';
         isNox = 'true';
      }

      return false;
   });

   //Nox button appearance
   if ($(window).width() < 800) {
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
   } else {
      $("#nox").css("z-index", 4);
      $("#nox").css("opacity", 1);
   }

//----- HIGHLIGHT TEXT -----//
   $('.js-highlightable').on('click', 'p', function() {
      $(this).toggleClass('highlight');
   });


//----- POSTS LOADING AJAX FUNCTIONS -----//
   $(document).on('click', '.js-load-more:not(.loading)', function() {
      function loading_icon_switch() {
         $('.js-icon-loading').toggleClass('icon-loading');
         $('.js-icon-loading').toggleClass('fa-spinner fa-chevron-down');
      }

      var that = $(this);
      var page = that.data('page');
      var newPage = page + 1;
      var ajaxurl = $(this).data('url');

      loading_icon_switch();
      that.addClass('loading');

      $.ajax({

         url : ajaxurl,
         type : 'post',
         data : {
            page : page,
            action : 'desco_load_more'
         },
         error : function( response ){
            console.log(response);
         },
         success : function( response ) {

            that.data('page', newPage);
            $('.js-posts-container').append( response );
            loading_icon_switch();
            that.removeClass('loading');

         }

      });
   });

//

   $(".fade-in").each(function(index){
      var s = 0.1;
      $(this).css({
         'animation-delay' : s*(1+index) + 's'
      });
   });


});
