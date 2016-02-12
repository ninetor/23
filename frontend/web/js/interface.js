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
	if ($(window).width() > 584){
		$('.wot-select__item').on('mouseenter',function(){
			$('.wot-select__item').find('img').stop().animate({opacity: "0.3",},100);
			$(this).find('img').stop().animate({opacity: "1",},100);

			$(this).find('.select-btn').stop().animate({opacity: "1",},100);

			$(this).find('.wot-select__item-img__info').stop().animate({opacity: "0",});
			$(this).siblings('.wot-select__item').find('.wot-select__item-img__info').stop().animate({opacity: "1",});

			if ($(this).find('.wot-select__item-img').hasClass("wot-select__item-img--tank")) {
				$('.bgblock1').stop().animate({opacity: "1",},300);
				$('.bgblock2').stop().css('opacity', '0');
			}else if ($(this).find('.wot-select__item-img').hasClass("wot-select__item-img--prize")) {
				$('.bgblock2').stop().animate({opacity: "1",},300);
				$('.bgblock1').stop().css('opacity', '0');
			};
		});
		$('.wot-select__item').on('mouseleave',function(){
			$('.wot-select__item').find('.select-btn').stop().animate({opacity: "0.4",},100);
		});
	}

	if ($(window).width() < 584){
		$('body').on('mouseenter', '.select-btn--tank', function(){
			$('.wot-select__item-img--prize').css('opacity','0');
			$('.wot-select__item-img--tank').animate({opacity: "1",},100);
		});
		$('body').on('mouseenter', '.select-btn--prize', function(){
			$('.wot-select__item-img--tank').css('opacity','0');
			$('.wot-select__item-img--prize').animate({opacity: "1",},100);
		});
	}


	// if ($(window).width() < 584){
	// 	$('.wot-select__item-img').appendTo( $('.wot-select__item-top'));
	// }
	// else{
	// 	$('.wot-select__item-img--tank').insertBefore( $('.select-btn--tank') );
	// 	$('.wot-select__item-img--prize').insertBefore( $('.select-btn--prize') );
	// }

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
	// if ($(window).width() < 584){
	// 	$('.wot-select__item-img').appendTo( $('.wot-select__item-top'));
	// }
	// else{
	// 	$('.wot-select__item-img--tank').insertBefore( $('.select-btn--tank') );
	// 	$('.wot-select__item-img--prize').insertBefore( $('.select-btn--prize') );
	// }

	$('.select-btn').css('opacity','1');

	$('.wot-select__item-img img').css('opacity','1');
	
});

// functions
function isTouchDevice() {
	return true == ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch);
}



