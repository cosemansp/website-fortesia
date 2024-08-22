jQuery(document).ready(function ($) {
  if ($("ul.portfolio_toggle").exists()) {
    function portfolio_quicksand() {
      var $filter;
      var $container;
      var $containerClone;
      var $filterLink;
      var $filteredItems;
      $filter = $(".filter li.active a").attr("class");
      $filterLink = $(".filter li a");
      $container = $("ul.portfolio_toggle").parent().find(".thumbs_container ul");
      $containerClone = $container.clone();
      $filterLink.click(function (e) {
        $(".filter li").removeClass("active");
        $filter = $(this).attr("class").split(" ");
        $(this).parent().addClass("active");
        if ($filter == "all") {
          $filteredItems = $containerClone.find("li");
        } else {
          $filteredItems = $containerClone.find("li[data-type~=" + $filter + "]");
        }
        $container.quicksand($filteredItems, { duration: 700, easing: "easeInOutCirc", adjustHeight: "auto" });
        $container.quicksand($filteredItems, function () {
          slideshow();
        });
      });
    }
    if (jQuery().quicksand) {
      portfolio_quicksand();
    }
  }
  function slideshow() {
    $(".portfolio_container").each(function (i) {
      $(this)
        .find(".thumbs_container")
        .attr("id", "thumbs-" + i);
      $(this)
        .find(".controls")
        .attr("id", "controls-" + i);
      $(this)
        .find(".slideshow")
        .attr("id", "slideshow-" + i);
      $(this)
        .find(".caption")
        .attr("id", "caption-" + i);
      $(this)
        .find(".loading")
        .attr("id", "loading-" + i);
      var gallery = $("#thumbs-" + i).galleriffic({
        delay: 6000,
        numThumbs: 999,
        preloadAhead: 0,
        enableTopPager: false,
        enableBottomPager: false,
        maxPagesToShow: 6,
        imageContainerSel: "#slideshow-" + i,
        controlsContainerSel: "#controls-" + i,
        captionContainerSel: "#caption-" + i,
        loadingContainerSel: "#loading-" + i,
        renderSSControls: true,
        renderNavControls: true,
        playLinkText: "<i class='icon-play'></i>",
        pauseLinkText: "<i class='icon-pause'></i>",
        prevLinkText: "<i class='icon-chevron-left'></i>",
        nextLinkText: "<i class='icon-chevron-right'></i>",
        renderSSControls: true,
        renderNavControls: true,
        nextPageLinkText: "Next &rsaquo;",
        prevPageLinkText: "&lsaquo; Previous",
        enableHistory: false,
        enableKeyboardNavigation: false,
        autoStart: false,
        syncTransitions: false,
        defaultTransitionDuration: 500,
        onSlideChange: undefined,
        onTransitionOut: undefined,
        onTransitionIn: undefined,
        onPageTransitionOut: undefined,
        onPageTransitionIn: undefined,
        onImageAdded: undefined,
        onImageRemoved: undefined,
      });
    });
    $(".portfolio_preview").css("display", "none");
    $(".thumb").click(function () {
      $(this).closest(".portfolio_container").find(".portfolio_preview").slideDown(500, "swing");
      $(this).closest("section").find(".portfolio_toggle, .curly_brackets").slideUp(200, "swing");
      $("html,body").animate({ scrollTop: $(this).closest("section").offset().top + 170 }, 500);
    });
    $(".controls").prepend('<a class="close"><i class="icon-remove"></i></a>');
    $(".controls a.close").click(function () {
      $(this).closest(".portfolio_container").find(".portfolio_preview").slideUp(500, "swing");
      $(this).closest("section").find(".portfolio_toggle, .curly_brackets").slideDown(200, "swing");
      $("html,body").animate({ scrollTop: $(this).closest("section").offset().top }, 500);
    });
  }
  if (jQuery().galleriffic && $(".thumbs_container ul.thumbs li").exists()) {
    slideshow();
  }
});
