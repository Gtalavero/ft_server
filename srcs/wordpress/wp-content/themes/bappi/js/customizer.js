/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
(function ($) {
  // Update the site title in real time...

  //Update site background color...
  wp.customize("background_color", function (value) {
    value.bind(function (newval) {
      // console.log("background_color newval", newval);
      $("[type='search'],input,.menu .children,.sub-menu").css({
        backgroundColor: newval,
      });
      $(".entry-header .entry-title,.entry-header .entry-title a").css({
        color: newval,
      });
    });
  });

  //Update site link color in real time...
  wp.customize("link_textcolor", function (value) {
    value.bind(function (newval) {
      // console.log("link_textcolor actual", newval);
      $(".entry-title").css({
        "background-color": newval,
      });
      $(
        ".site-title a,a,a:visited, .main-navigation .menu-item a, button, input,.widget-title,body,textarea "
      ).css({
        color: newval,
      });
      //Border Color
      $(
        ".toggled .menu,.site-header, .wp-block-pullquote, .wp-block-quote:not(.is-style-large), .wp-block-quote:not(.is-style-large),input, button, textarea, select .site-footer, .site-footer"
      ).css({
        borderColor: newval,
      });
    });
  });

  // Focus Color

  wp.customize("focus_textcolor", function (value) {
    value.bind(function (newval) {
      // console.log("focus color", newval);
      $("a:focus").css({
        color: newval,
      });
      $(
        'input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="range"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus,button:active, button:focus, input[type="button"]:active, input[type="button"]:focus, input[type="reset"]:active, input[type="reset"]:focus, input[type="submit"]:active, input[type="submit"]:focus'
      ).css({
        borderColor: newval,
      });
    });
  });

  //Update the site description in real time...
    wp.customize( 'blogdescription', function( value ) {
       console.log('site description valu is', value);
        value.bind( function( newval ) {
            $( '.site-description' ).html( newval );
        } );
    } );



  // Header Text color

  wp.customize("header_textcolor", function (value) {
    value.bind(function (newval) {
    if(newval){
        $('.site-description').removeClass('no-description');
      }else{
        $('.site-description').addClass('no-description');
      }
      $(".site-description").css({
        color: newval,
      });
    });
  });
  //
  wp.customize("show_header_center", function (value) {
    value.bind(function (newval) {
      console.log("setting heder text color", newval);
      if (newval) {
        $(".site-branding,.main-navigation").css({
          "justify-content": "center",
          "text-align": "center",
        });
      } else {
        $(".site-branding,.main-navigation").css({
          "justify-content": "flex-start",
          "text-align": "left",
        });
      }
    });
  });
})(jQuery);
