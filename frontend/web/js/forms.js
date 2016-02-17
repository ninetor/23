$(document).ready(function() {
	Tank = {};
	var hash = location.hash;
	if (hash == '#prize-step1')
		$('.select-btn--prize').click();
	else if(hash.match(/\#post\-\d+/)) {
		var dataArray = hash.split('-');
		var postId = parseInt(dataArray.slice(-1).pop());

		$.post(
			'/getpostdata',
			{id : postId},
			function (res) {
				if(res) {
					$('.member-item__n').text(res.name);
					$('.member-item__date').text(res.date);
					$('.member-item__info').text(res.text);

					$('.member_click').click();
				}
			}
		)
	}

	var giftObject = {};

	$('#prize-step1').find('.btn-wrap span').on('click', function () {
		$('#prize-step1').find('#loadersoc').show();
		var data = {};
		var phoneNumber = $('#prize-step1').find('input[name="Step1[from]"]').val();
		console.log(phoneNumber);
		$('#prize-step2').find('.password-wrap i').text('+375 '+phoneNumber);



		data['Step1[gift_code]'] = $('#prize-step1').find('input[name="Step1[gift_code]"]:checked').val();
		data['Step1[from]'] = proccessPhone(phoneNumber);

		$.post(
			'/gift_step1',
			data,
			function (res) {
				$('#prize-step1').find('#loadersoc').hide();
				if(parseInt(res)) {
					giftObject.id = parseInt(res);
					$('#toStep2').click();
					$('#prize-step1').find('input[name="Step1[from]"]').val('');
				} else {
					var msg = res.from[0];
					$('#prize-step1').find('div.error-wrap')
						.addClass('active').find('.error-msg')
						.text(msg);
				}
			}
		);
	});
	$('#prize-step2').find('.btn-wrap span').on('click', function () {
		$('#prize-step2').find('#loadersoc').show();
		var data = {};


		data['Step2[id]'] = giftObject.id;
		data['Step2[validation_code]'] = $('#prize-step2').find('input[name="Step2[validation_code]"]').val();

		$.post(
			'/gift_step2',
			data,
			function (res) {
				$('#prize-step2').find('#loadersoc').hide();
				if(res == true) {
					$('#toStep3').click();
                    $('#prize-step2').find('input[name="Step2[validation_code]"]').val('');
				} else {
					var msg = res.validation_code[0];
					$('#prize-step2').find('div.error-wrap')
						.addClass('active').find('.error-msg')
						.text(msg);
				}

			}
		);
	});
	$('#prize-step3').find('.btn-wrap span').on('click', function () {
		$('#prize-step3').find('#loadersoc').show();
		var data = {};
		var phoneNumber = $('#prize-step3').find('input[name="Step3[to]"]').val();

		data['Step3[id]'] = giftObject.id;
		data['Step3[to]'] = proccessPhone(phoneNumber);

		$.post(
			'/gift_step3',
			data,
			function (res) {
				$('#prize-step3').find('#loadersoc').hide();
				if(res == true) {
					$('#toStep4').click();
					$('#prize-step3').find('input[name="Step3[to]"]').val('');
				} else {
					var msg = res.to[0];
					$('#prize-step3').find('div.error-wrap')
						.addClass('active').find('.error-msg')
						.text(msg);
				}
			}
		);
	});
	$('#prize-step4').find('.social-btn').on('click', function () {
		var share_btn = $(this).attr('data-share');
		console.log(share_btn);
		Share[share_btn]();
	});

	$('#tank-step2').find('a.other').on('click', function () {
		var data = {};
		data.id = $('#tank-step2').find('.current_activity').val();

		$.post(
			'/changeactivity',
			data,
			function (res) {
				if (res) {
					console.log(res);
					$('#tank-step2').find('.current_activity').val(res.id);
					$('#tank-step2').find('.prize-task').val(res.text);
					$('#tank-step2').find('.tank-cause').text(res.cause);
					$('#tank-step2').find('#tank-message').attr('placeholder', res.example);


				}
			}
		);
	});
	$('#tank-step2').find('.btn-wrap span').on('click', function () {
		var data = {};
		var phoneNumber = $('#tank-step2').find('input[name="TankForm[phone]"]').val();

		data['TankForm[activity]'] = $('#tank-step2').find('input[name="TankForm[activity]"]').val();
		data['TankForm[name]'] = $('#tank-step2').find('input[name="TankForm[name]"]').val();
		data['TankForm[phone]'] = proccessPhone(phoneNumber);
		data['TankForm[text]'] = $('#tank-step2').find('textarea[name="TankForm[text]"]').val();
		$('.error-msg').text('');

		if (window.containsMat(data['TankForm[text]'])) {
			$('#tank-step2').find('div.error-text').text('К сожалению, матерщина запрещена');
			return false;
		}
		if (window.containsMat(data['TankForm[name]'])) {
			$('#tank-step2').find('div.error-name').text('К сожалению, матерщина запрещена');
			return false;
		}


		addParticipant(data, function (res)  {
			if (parseInt(res)) {
				Tank.user_id = res;
				$('#tank_toStep3').click();

				$('#tank-step2').find('input[name="TankForm[phone]"]').val('');
				$('#tank-step2').find('input[name="TankForm[name]"]').val('');
				$('#tank-step2').find('textarea[name="TankForm[text]"]').val('');

				$("html, body").animate({ scrollTop: 0 }, "slow");
			} else {
				for(var result in res) {
					$('#tank-step2')
						.find('input[name="TankForm['+result+']"], textarea[name="TankForm['+res[result]+']"]')
						.addClass('active');
					$('#tank-step2')
						.find('div.error-'+result)
						.text(res[result][0]);
				}
			}
		});
		/*$.post(
			'/addparticipant',
			data,
			function (res) {
				callback(res)
				if (parseInt(res)) {

					$('#tank_toStep3').click();
					Tank = {user_id : res}

					$('#tank-step2').find('input[name="TankForm[phone]"]').val('');
					$('#tank-step2').find('input[name="TankForm[name]"]').val('');
					$('#tank-step2').find('textarea[name="TankForm[text]"]').val('');

					$("html, body").animate({ scrollTop: 0 }, "slow");
				} else {
					for(var result in res) {
						$('#tank-step2')
							.find('input[name="TankForm['+result+']"], textarea[name="TankForm['+res[result]+']"]')
							.addClass('active');
						$('#tank-step2')
							.find('div.error-'+result)
							.text(res[result][0]);
					}
				}
			}
		);*/
	});
	$('#tank-step3').find('.social-btn').on('click', function () {
		var share_btn = $(this).attr('data-share');
		console.log(share_btn);
		Share[share_btn]();
	});

	$('#prize-step1').find('input[type="radio"]').eq(0).attr('checked', true);

	$('input[type="tel"]').on('focus', function () {
		$('.error-phone').text('');
	});
	$('input, textarea').on('focus', function () {
		$(this).parent().find('.error-msg').text('');
	});

	Share = {
		app_id: 799191360227615,
		url_tank: location.protocol+'//'+location.hostname,
		url: location.protocol+'//'+location.hostname,
		title_main: 'Обменивайте баллы «МТС Бонус» на золото, дни премиум-аккаунта или инвайт-код для WoT!',
		title_tank: 'Хочу вместо банальных подарков танк для World of Tanks!',
		title_prize: 'Обменивайте баллы «МТС Бонус» на золото, дни премиум-аккаунта или инвайт-код для WoT!',

		name_prize: 'Медаль за #БоевыеПодарки от МТС и WoT!',
		name_fb: '#БоевыеПодарки МТС',

		vk_main: function() {
			url  = 'http://vkontakte.ru/share.php?';
			url += 'url='          + encodeURIComponent(this.url_tank);
			url += '&title='          + encodeURIComponent(this.name_fb);
			url += '&description='       + encodeURIComponent(this.title_main);
			url += '&image='       + this.url+'/img/share/1_5.jpg';
			url += '&noparse=true&clear=123';
			Share.popup(url);
		},
		vk_tank: function() {
			var newUrl = this.url_tank + '/#post-' + Tank.user_id;

			url  = 'http://vkontakte.ru/share.php?';
			url += 'url='          + encodeURIComponent(newUrl);
			url += '&title='          + encodeURIComponent(this.name_fb);
			url += '&description='       + encodeURIComponent(this.title_tank);
			url += '&image='       + this.url+'/img/share/2_5.jpg';
			url += '&noparse=true';
			Share.popup(url);
		},
		vk_prize: function() {
			url  = 'http://vkontakte.ru/share.php?';
			url += 'url='          + encodeURIComponent(this.url);
			url += '&title='          + encodeURIComponent(this.name_prize);
			url += '&description='       + encodeURIComponent(this.title_prize);
			url += '&image='       + this.url+'/img/share/3_5.jpg';
			url += '&noparse=true';
			Share.popup(url);
		},
		fb_main: function() {
			url  = 'https://www.facebook.com/dialog/feed?';
			url += 'app_id='     + this.app_id;
			url += '&description='     + encodeURIComponent(this.title_main);
			url += '&link='       + encodeURIComponent(this.url);
			url += '&name='       + encodeURIComponent(this.name_fb);
			url +=  '&redirect_uri=http://facebook.com/';
			url +=  '&display=popup&clear=123';
			url += '&picture=' + this.url+'/img/share/1_1.jpg';
			Share.popup(url);
		},
		fb_tank: function() {
			var newUrl = this.url_tank + '/#post-' + Tank.user_id;

			url  = 'https://www.facebook.com/dialog/feed?';
			url += 'app_id='     + this.app_id;
			url += '&description='     + encodeURIComponent(this.title_tank);
			url += '&link='       + encodeURIComponent(newUrl);
			url += '&name='       + encodeURIComponent(this.name_fb);
			url +=  '&redirect_uri=http://facebook.com/';
			url +=  '&display=popup';
			url += '&picture=' + this.url+'/img/share/2_1.jpg';
			Share.popup(url);
		},
		fb_prize: function() {
			url  = 'https://www.facebook.com/dialog/feed?';
			url += 'app_id='     + this.app_id;
			url += '&description='     + encodeURIComponent(this.title_prize);
			url += '&link='       + encodeURIComponent(this.url);
			url += '&name='       + encodeURIComponent(this.name_prize);
			url +=  '&redirect_uri=http://facebook.com/';
			url +=  '&display=popup';
			url += '&picture=' + this.url+'/img/share/3_1.jpg';
			Share.popup(url);
		},
		tw_main: function() {
			url  = 'http://twitter.com/share?';
			url += 'text='      + encodeURIComponent(this.title_main);
			url += '&url='      + encodeURIComponent(this.url);
			Share.popup(url);
		},

		popup: function(url) {
			window.open(url,'','toolbar=0,status=0,width=626,height=436');
		}
	};


	$('.fancy-close').on('click', function () {
		$('.error-msg').text('');
	});

	$('.socials a').on('click', function () {
		var share_btn = $(this).attr('data-share');

		Share[share_btn]();
	})
});

function proccessPhone(phone) {
	var phoneNum = phone.replaceArray(['(', ')', ' ', '-', '-'], ['', '', '', '', '']);
	return phoneNum ? '375' + phoneNum : null;
}

function addParticipant(data, callback) {
	$.post(
		'/addparticipant',
		data,
		function (res) {
			callback(res);

		}
	);
}

String.prototype.replaceArray = function(find, replace) {
	var replaceString = this;
	for (var i = 0; i < find.length; i++) {
		replaceString = replaceString.replace(find[i], replace[i]);
	}
	return replaceString;
};
