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

            if (localStorage['nox'] == 'true') {
               $('.js-posts-container *').addClass('nox');
            }
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
