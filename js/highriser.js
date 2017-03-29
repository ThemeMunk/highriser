jQuery(document).ready(function ($) {

	jQuery(document).ready(function () {
		jQuery('.main-navigation').meanmenu({
			meanScreenWidth: 991,
			meanRevealPosition: "center"
		});
	});
    
	$(function() {
		$('.card').matchHeight();
	});	
	
    /** Home Page Slider */
    $('#imagegallery').lightSlider({
        item : 1,
        slideMargin: 0,
        auto: true,
		speed: 700,
		pause: 4000,
		mode: 'fade',
        loop: true,
        pager: false,
        enableDrag:false,        
    });  
        
});