<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0"
    nonce="wCtUy2oT"></script>
<script>
$('.owl-slideshow').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    loop:true,
    lazyLoad:true,
    dots:false,
    autoplay:true,
    autoplayTimeout:2500,
    autoplaySpeed:400,
    autoplayHoverPause:true,
    responsive: {
        0: {
            items: 1
        },
    }
})
$('.owl-partner').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    loop:true,
    lazyLoad:true,
    dots:false,
    autoplay:true,
    autoplayTimeout:2500,
    autoplaySpeed:400,
    autoplayHoverPause:true,
    responsive: {
        0: {
            items: 7
        },
    }
})
$('.owl-spnb').owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    loop:false,
    lazyLoad:true,
    dots:false,
    autoplay:true,
    autoplayTimeout:2500,
    autoplaySpeed:400,
    autoplayHoverPause:true,
    responsive: {
        0: {
            items: 5
        },
    }
})  

$('.news-slick').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 500,
    arrows: false,
    vertical: true,
    verticalSwiping: true,
    centerMode: true,
    centerPadding: '0',
    dots: false,
    infinite: false,
    focusOnSelect: true,

});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#features').wowBook({
        height: 595,
        width: 1188,
        centeredWhenClosed: true,
        hardcovers: true,
        turnPageDuration: 1000,
        numberedPages: [1, -2],
        controls: {
            zoomIn: '#zoomin',
            zoomOut: '#zoomout',
            next: '#next',
            back: '#back',
            first: '#first',
            last: '#last',
            slideShow: '#slideshow',
            flipSound: '#flipsound',
            thumbnails: '#thumbs',
            fullscreen: '#fullscreen'
        },
        scaleToFit: "#container",
        thumbnailsPosition: 'bottom',
        onFullscreenError: function() {
            var msg = "Fullscreen failed.";
            if (self != top) msg =
                "The frame is blocking full screen mode. Click on 'remove frame' button above and try to go full screen again."
            alert(msg);
        }
    }).css({
        'display': 'none',
        'margin': 'auto'
    }).fadeIn(1000);

    $("#cover").click(function() {
        $.wowBook("#features").advance();
    });

    var book = $.wowBook("#features");

    function rebuildThumbnails() {
        book.destroyThumbnails()
        book.showThumbnails()
        $("#thumbs_holder").css("marginTop", -$("#thumbs_holder").height() / 2)
    }
    $("#thumbs_position button").on("click", function() {
        var position = $(this).text().toLowerCase()
        if ($(this).data("customized")) {
            position = "top"
            book.opts.thumbnailsParent = "#thumbs_holder";
        } else {
            book.opts.thumbnailsParent = "body";
        }
        book.opts.thumbnailsPosition = position
        rebuildThumbnails();
    })
    $("#thumb_automatic").click(function() {
        book.opts.thumbnailsSprite = null
        book.opts.thumbnailWidth = null
        rebuildThumbnails();
    })
    $("#thumb_sprite").click(function() {
        book.opts.thumbnailsSprite = "images/thumbs.jpg"
        book.opts.thumbnailWidth = 136
        rebuildThumbnails();
    })
    $("#thumbs_size button").click(function() {
        var factor = 0.02 * ($(this).index() ? -1 : 1);
        book.opts.thumbnailScale = book.opts.thumbnailScale + factor;
        rebuildThumbnails();
    }) 
});
</script>
<!-- Chữ rung -->
<script type="text/javascript">
$(document).ready(function() {
    $('.header__cpnname').textillate({
        in: {
            effect: 'bounceIn'
        },
        out: {
            effect: 'bounceOut'
        },
        loop: true
    });

    $('.company_desc').textillate({
        in: {
            effect: 'bounceIn'
        },
        out: {
            effect: 'bounceOut'
        },
        loop: true
    });

});
</script>  
<!-- Btn back to top -->
<script> 
let mybutton = document.getElementById("myBtn"); 
window.onscroll = function() {
    scrollFunction()
}; 
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
} 
function topFunction() {
    document.body.scrollTop = 0;  
    document.documentElement.scrollTop = 0;  
}
</script>
<!-- Btn contact -->
<script type="text/javascript" src="assets/js/jQuery.WCircleMenu-min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    /* Phone circle */
    $('#my-phone-circle').WCircleMenu({
        angle_start: -Math.PI,
        delay: 50,
        distance: 70,
        angle_interval: Math.PI / 4,
        easingFuncShow: "easeOutBack",
        easingFuncHide: "easeInBack",
        step: 5,
        openCallback: false,
        closeCallback: false,
    }); 
    /* Phone support */
    $('.support-content').hide();
    $('a.btn-support').click(function(e) {
        e.stopPropagation();
        $('.support-content').slideToggle();
    });
    $('.support-content').click(function(e) {
        e.stopPropagation();
    });
    $(document).click(function() {
        $('.support-content').slideUp();
    });
    
})

</script>
<!-- Shiner -->

<script type="text/javascript">   
    $(window).bind("load", function() {
        var api = $(".peShiner").peShiner({ api: true, paused: true, reverse: true, repeat: 1, color: 'oceanHL' });
        api.resume();
    });
</script>
 <!-- Menu sticky -->
<script>
window.onscroll = function() {
    myFunction()
};
var header = document.getElementById("menu-scroll");
var sticky = header.offsetTop; 
function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}
</script>
<script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "111404121865899");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v17.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
<noscript></noscript>