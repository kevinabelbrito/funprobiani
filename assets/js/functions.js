// remap jQuery to $
(function($){})(window.jQuery);

$(document).ready(function (){

/*-----------------------------------------------------------------------------------*/
/*  CONTACT FORM
/*-----------------------------------------------------------------------------------*/
  $("#ajax-contact-form").submit(function() {
    var str = $(this).serialize();

    $.ajax({
      type: "POST",
      url: "includes/contact-process.php",
      data: str,
      success: function(msg) {
          // Message Sent? Show the 'Thank You' message
          if(msg == 'OK') {
            result = '<div class="notification_ok alert-box success radius">Your message has been sent. Thank you!</div>';
            //$("#fields").hide();
          } else {
            result = msg;
          }
          $('#note').html(result);
      }
    });
    return false;
  });

/*
  START STRICT MODE
*/
  'use strict';

/*-----------------------------------------------------------------------------------*/
/*  FOOTER COPYRIGHT YEAR
/*-----------------------------------------------------------------------------------*/
  var currentYear = (new Date).getFullYear();
  $('span.date').text(currentYear);

/*-----------------------------------------------------------------------------------*/
/*  NAV
/*-----------------------------------------------------------------------------------*/
  /* The target nav */
  var responsiveNav = document.getElementById('js-responsive-nav');

  /* Insert <a> element for toggle button inside the <nav> element */
  var toggleBtn = document.createElement('a');
  toggleBtn.setAttribute('href', '#');
  toggleBtn.setAttribute('class', 'responsive-nav__toggle');
  responsiveNav.insertBefore(toggleBtn, responsiveNav.firstChild);

  /* Has Class Function */
  function hasClass(e,t){return(new RegExp(' '+t+' ')).test(' '+e.className+' ')}

  /* Toggle Class Function */
  function toggleClass(e,t){var n=' '+e.className.replace(/[\t\r\n]/g,' ')+' ';if(hasClass(e,t)){while(n.indexOf(' '+t+' ')>=0){n=n.replace(' '+t+' ',' ')}e.className=n.replace(/^\s+|\s+$/g,'')}else{e.className+=' '+t}}

  /* Toggle 'responsive-nav--open' when button is clicked */
  toggleBtn.onclick = function() {
      toggleClass(this.parentNode, 'responsive-nav--open');
  }

  /* Add a class of 'js' to the HTML element */
  var root = document.documentElement;
  root.className = root.className + ' js';



  $("a.responsive-nav__toggle").click(function(e) {
     e.preventDefault();
  });

  $('input, textarea').placeholder();


});