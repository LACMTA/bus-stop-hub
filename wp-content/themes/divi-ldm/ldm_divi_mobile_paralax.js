/** [LDM] Apply Divi Paralax settings to Mobile Devices */
jQuery(document).ready(function($) {
  // Mobile device check
  $is_mobile_device = null !== navigator.userAgent.match(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/);
  if ($is_mobile_device) {
    // Function to check if an element is in the Viewport
    isInViewport = function(elem) {
        elementTop = elem.offset().top, elementBottom = elementTop + elem.outerHeight(), viewportTop = $(window).scrollTop(), viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    };
    // Apply Parallax transform calculations when scrolling
    $(window).scroll(function() {
        $(".et_parallax_bg").each(function() {
           var $this_parent = $(this).parent();
           // Check if the parent element is on-screen
           var $is_visible = isInViewport($this_parent);
           if ($is_visible) {
             element_top = $this_parent.offset().top,
             parallaxHeight = $(this).parent(".et_pb_fullscreen").length && $(window).height() > $this_parent.innerHeight() ? $(window).height() : $this_parent.innerHeight(),
             bg_height = .3 * $(window).height() + parallaxHeight,
             main_position = "translate(0, " + .3 * ($(window).scrollTop() + $(window).height() - element_top) + "px)";
             $(this).css({height: bg_height,"-webkit-transform": main_position,"-moz-transform": main_position,"-ms-transform": main_position,transform: main_position});
           }
        });
    });
  }
});
