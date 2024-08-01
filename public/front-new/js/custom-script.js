jQuery(document).ready(function(){
    //for box hover gradient animation
    $(document).on('mousemove', '.mouse-cursor-gradient-tracking', function(e) {
        var btn = $(this);
        var btnWidth = btn.width();
        var halfwidth = btnWidth / 2;
        var offset = btn.offset();
        var halfoofset = offset.left + halfwidth;

        var relX = e.pageX;
        if (relX > halfoofset) {
            btn.removeClass('leftside');
            btn.addClass('rightside');
        } else {
            btn.removeClass('rightside');
            btn.addClass('leftside');
        }
    });


        var $main = $("main");
        window.mySparticles = new Sparticles($main.get(0),{
              count: 350,
             direction: 360,
             maxSize: 5,
             color:"white"
            });



    // let cookie = localStorage.getItem("cookie");
    // if (cookie == 1) {
    //     var cookiePolicy = document.querySelector('.cookies-hide');
    //     cookiePolicy.style.display = 'none';
    // }

    var labels = ["Contact Us","Schedule A Demo"];
    var currentIndex = 0;
    function updateButtonLabel() {
    jQuery(".dropdown-new").text(labels[currentIndex]);
    currentIndex = (currentIndex + 1) % labels.length;
    }
    setInterval(updateButtonLabel, 2000);

 
});
jQuery(document).ready(function() {


function changeActiveClass() {
  // Select all list items except for the documentFile field
  const listItems = $('#list li').not('#documentFile');

  const activeItem = listItems.filter('.active');
  const nextItem = activeItem.next().length ? activeItem.next() : listItems.first();

  activeItem.removeClass('active');
  nextItem.addClass('active');
}

setInterval(changeActiveClass, 150);


/*     function changeActiveClass() {
      const listItems = $('#list li');
      const activeItem = listItems.filter('.active');
      const nextItem = activeItem.next().length ? activeItem.next() : listItems.first();

      activeItem.removeClass('active');
      nextItem.addClass('active');
    }

    setInterval(changeActiveClass, 150); */


  });


  document.addEventListener('DOMContentLoaded', function(event) {
    var navbarToggler = document.querySelectorAll('.navbar-toggler')[0];
    navbarToggler.addEventListener('click', function(e) {
    e.target.children[0].classList.toggle('active');
    });
  });


// Hide the button initially
jQuery('#backToTop').hide();

jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 200) {
        jQuery('#backToTop').fadeIn('fast');
    } else {
        jQuery('#backToTop').fadeOut('fast');
    }
});

jQuery('#backToTop').click(function () {
    jQuery("html, body").animate({
        scrollTop: 0
    }, 300);
    return false;
});


//   function hideCookiePolicy(val) {
//     localStorage.setItem("cookie", val);
//     // Get the cookie policy element and hide it
//     var cookiePolicy = document.querySelector('.cookies-hide');
//     cookiePolicy.style.display = 'none';
// }




$(".js-input").keyup(function () {
    if ($(this).val()) {
        $(this).addClass("not-empty");
    } else {
        $(this).removeClass("not-empty");
    }
});


//  document.addEventListener('DOMContentLoaded', function () {
//                 // Initially hide the privacy-policy section
//                 document.getElementById('privacy-policy').classList.add('hidden');

//                 document.getElementById('btn-3').addEventListener('change', function () {
//                     var legalNoticeSection = document.getElementById('legal-notice');
//                     var privacyPolicySection = document.getElementById('privacy-policy');

//                     if (legalNoticeSection && privacyPolicySection) {
//                         legalNoticeSection.classList.remove('hidden');
//                         privacyPolicySection.classList.add('hidden');
//                     }
//                 });

//                 document.getElementById('btn-4').addEventListener('change', function () {
//                     var legalNoticeSection = document.getElementById('legal-notice');
//                     var privacyPolicySection = document.getElementById('privacy-policy');

//                     if (legalNoticeSection && privacyPolicySection) {
//                         legalNoticeSection.classList.add('hidden');
//                         privacyPolicySection.classList.remove('hidden');
//                     }
//                 });
//             });



/*     $(document).ready(function(){
        $('.play').click(function() {
            // $('.youtube-section .video-parent-box .js-video').css('padding-top', '0');
        });
    });
 */

    autosize();
function autosize(){
    var text = $('.autosize');

    text.each(function(){
        $(this).attr('rows',1);
        resize($(this));
    });

    text.on('input', function(){
        resize($(this));
    });

    function resize ($text) {
        $text.css('height', 'auto');
        $text.css('height', $text[0].scrollHeight+'px');
    }
}



