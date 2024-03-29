window.onload = function () {
  // OpenCloseBtn
  var openUserBtn = document.getElementById("open-user-btn");
  var closeUserBtn = document.getElementById("close-user-btn");
  var userAccount = document.querySelector(".header-bottom-account-hidden");

  openUserBtn.addEventListener("click", toggleUserAccount);
  closeUserBtn.addEventListener("click", toggleUserAccount);

  function toggleUserAccount() {
    if (userAccount.style.display === "none") {
      userAccount.style.display = "block";
    } else {
      userAccount.style.display = "none";
    }
  }

  var openCartBtn = document.getElementById("open-cart-list");
  var closeCartBtn = document.getElementById("close-cart-btn");
  var cartIcon = document.querySelector(".header-bottom-cart-icon-hidden");

  openCartBtn.addEventListener("click", toggleCartIcon);
  closeCartBtn.addEventListener("click", toggleCartIcon);

  function toggleCartIcon() {
    if (cartIcon.style.display === "none") {
      cartIcon.style.display = "block";
    } else {
      cartIcon.style.display = "none";
    }
  }

  // ShinerLogo
  jQuery.browser = {};
  (function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
      jQuery.browser.msie = true;
      jQuery.browser.version = RegExp.$1;
    }
  })();
  $(window).bind("load", function () {
    $(".peShiner").each(function () {
      var api = $(this).peShiner({
        api: true,
        paused: true,
        reverse: true,
        repeat: 1,
        color: "fireHL",
      });
      /* Color: monoHL, oceanHL, fireHL */
      api.resume();
    });
  });
 $(".changeLanguage").click(function(event) {
        var value = $(this).data("value");
        var text = $(this).data("text");
        $(".changeLanguage").removeClass("active");
        $(this).addClass("active");
        var text_1 = $(".changeLanguage.active").html();
        $(".lang_current").html(text_1);
        doGoogleLanguageTranslator(value);
        return false;
    });
    $('.box_solang').hide();
    $('.lang_current').click(function(e) {
        e.stopPropagation();
        $('.box_solang').slideToggle();
    });
    $('.box_solang').click(function(e) {
        e.stopPropagation();
    });
    $(document).click(function() {
        $('.box_solang').slideUp();
    });
  // GoTop
  var progressPath = document.querySelector(".scrollToTop path");
  var pathLength = progressPath.getTotalLength();
  progressPath.style.transition = progressPath.style.WebkitTransition =
    "none";
  progressPath.style.strokeDasharray = pathLength + " " + pathLength;
  progressPath.style.strokeDashoffset = pathLength;
  progressPath.getBoundingClientRect();
  progressPath.style.transition = progressPath.style.WebkitTransition =
    "stroke-dashoffset 10ms linear";
  var updateProgress = function () {
    var scroll = $(window).scrollTop();
    var height = $(document).height() - $(window).height();
    var progress = pathLength - (scroll * pathLength) / height;
    progressPath.style.strokeDashoffset = progress;
  };
  updateProgress();
  $(window).scroll(updateProgress);
  var offset = 150;
  var duration = 550;
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > offset) {
      $(".scrollToTop").addClass("active-progress");
    } else {
      $(".scrollToTop").removeClass("active-progress");
    }
  });
  $(".scrollToTop").on("click", function (event) {
    event.preventDefault();
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      duration
    );
    return false;
  });
};
