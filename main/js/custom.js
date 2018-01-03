vW = jQuery(window).width();
// Hamburger icon interaction
if (vW <= 991){

  jQuery(".fb-hamburger-button").click(function(){
    jQuery(".fb-header-right-list").slideToggle();
  });

  jQuery(".fb-header-right-list > li > a").click(function(){
    jQuery(this).closest("li").find(".fb-hrl-dropdown").slideToggle();
  });

  jQuery(".fb-header-donated-amount-link-wrapper > a").click(function(){
    jQuery(".fb-header-notification-link-wrapper .fb-hrl-dropdown").slideUp();
    jQuery(".fb-header-projects-link-wrapper .fb-hrl-dropdown").slideUp();
    jQuery(".fb-header-profile-link-wrapper .fb-hrl-dropdown").slideUp();
  });

  jQuery(".fb-header-notification-link-wrapper > a").click(function(){
    jQuery(".fb-header-projects-link-wrapper .fb-hrl-dropdown").slideUp();
    jQuery(".fb-header-profile-link-wrapper .fb-hrl-dropdown").slideUp();
    jQuery(".fb-header-donated-amount-link-wrapper .fb-hrl-dropdown").slideUp();
  });

  jQuery(".fb-header-projects-link-wrapper > a").click(function(){
    jQuery(".fb-header-notification-link-wrapper .fb-hrl-dropdown").slideUp();
    jQuery(".fb-header-profile-link-wrapper .fb-hrl-dropdown").slideUp();
    jQuery(".fb-header-donated-amount-link-wrapper .fb-hrl-dropdown").slideUp();
  });

  jQuery(".fb-header-profile-link-wrapper > a").click(function(){
    jQuery(".fb-header-notification-link-wrapper .fb-hrl-dropdown").slideUp();
    jQuery(".fb-header-projects-link-wrapper .fb-hrl-dropdown").slideUp();
    jQuery(".fb-header-donated-amount-link-wrapper .fb-hrl-dropdown").slideUp();
  });

}

// Header on scroll animation
jQuery(window).scroll(function(){
   if (jQuery(this).scrollTop() > 5) {
       jQuery('.fb-header').addClass('fixed');
       jQuery("body").addClass('floating-header-active');
   } else {
       jQuery('.fb-header').removeClass('fixed');
       jQuery("body").removeClass('floating-header-active');
   }
});
