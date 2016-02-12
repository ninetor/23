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
        autoDimensions: false,
        helpers: {
		    overlay: {
		      locked: false,
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


	//hover-main
	$('.wot-select__item').on('mouseenter',function(){
		$('.wot-select__item').find('img').animate({opacity: "0.3",},100);
		$(this).find('img').animate({opacity: "1",},100);

		// $('.wot-select__item').find('.select-btn').animate({opacity: "0.4",},100);
		$(this).find('.select-btn').animate({opacity: "1",},100);

		$(this).find('.wot-select__item-img__info').animate({opacity: "0",});
		$(this).siblings('.wot-select__item').find('.wot-select__item-img__info').animate({opacity: "1",});
	});
	$('.wot-select__item').on('mouseleave',function(){
		$('.wot-select__item').find('.select-btn').animate({opacity: "0.4",},100);
	});


	if ($(window).width() < 584){
		$('.wot-select__item-img').appendTo( $('.wot-info__right') );
	}
	else{
		$('.wot-select__item-img--tank').insertBefore( $('.select-btn--tank') );
		$('.wot-select__item-img--prize').insertBefore( $('.select-btn--prize') );
	}

	//MASK
	if($('.user_phone').length>0){
		$('.user_phone').each(function(){
	      $(this).mask("(99) 999-99-99");
	    });
	}


	//TABS-MEMBERS
	$(".tab_content").hide();
	$("ul.tabs li:first").addClass("active").show();
	$(".tab_content:first").show();
	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTab = $(this).find("a").attr("href");
		$(activeTab).fadeIn();
		return false;
	});


	//open question winners-page
	$('.question-item').on('click',function(){
		$(this).toggleClass('active');
		$(this).find('.question-answer').fadeToggle(10);
	});

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



