$(document).ready(function() {
	// detect touch device
	if (isTouchDevice() === true) {
		$('body').addClass('touch');
	} else {
		$('body').addClass('no-touch');
	}

	//POPUP
	$(".popup").fancybox({
        'titlePosition'     : 'inside',
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        padding: 0,
        maxWidth	: 1160,
        // minHeight: 300,
        // autoSize    : false,
        autoDimensions: false,
    	// maxWidth : '100%',
        // autoCenter : false,
        helpers: {
		    overlay: {
		      locked: true,
		    }
		}
    });

    //MOBILE MENU
	$('.menu-btn').click(function(){
		$('.layout').toggleClass('active');
		$('.menu-right').toggleClass('active');
		$(this).toggleClass('active');
		return false
	})


	//hover
	// $('.wot-select__item').on('mouseover',function(){
	// 	console.log('энавел');
	// });
	// $('.wot-select__item').on('mouseout',function(){
	// 	console.log('убрал');
	// });


	if ($(window).width() < 584){
		$('.wot-select__item-img').appendTo( $('.wot-info__right') );
	}
	else{
		$('.wot-select__item-img--tank').insertBefore( $('.select-btn--tank') );
		$('.wot-select__item-img--prize').insertBefore( $('.select-btn--prize') );
	}

});

$(window).resize(function() {
	if ($(window).width() > 752) {
		$('.layout').removeClass('active');
		$('.menu-right').removeClass('active');
		$('.menu-btn').removeClass('active');
	}
});



$(window).resize(function() {
	if ($(window).width() < 584){
		$('.wot-select__item-img').appendTo( $('.wot-info__right') );
	}
	else{
		$('.wot-select__item-img--tank').insertBefore( $('.select-btn--tank') );
		$('.wot-select__item-img--prize').insertBefore( $('.select-btn--prize') );
	}
});

// functions
function isTouchDevice() {
	return true == ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch);
}



