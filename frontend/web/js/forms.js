$(document).ready(function() {
	var giftObject = {};

	$('#prize-step1').find('.btn-wrap span').on('click', function () {
		var data = {};
		var phoneNumber = $('#prize-step1').find('input[name="Step1[from]"]').val();

		data['Step1[gift_code]'] = $('#prize-step1').find('input[name="Step1[gift_code]"]:checked').val();
		data['Step1[from]'] = proccessPhone(phoneNumber);

		$.post(
			'/gift_step1',
			data,
			function (res) {
				if(res) {
					giftObject.id = parseInt(res);
					$('#toStep2').click();
				}
			}
		);
	});
	$('#prize-step2').find('.btn-wrap span').on('click', function () {
		var data = {};

		data['Step2[id]'] = giftObject.id;
		data['Step2[validation_code]'] = $('#prize-step2').find('input[name="Step2[validation_code]"]').val();

		$.post(
			'/gift_step2',
			data,
			function (res) {
				if(res) {
					$('#toStep3').click();
				}
			}
		);
	});
	$('#prize-step3').find('.btn-wrap span').on('click', function () {
		var data = {};
		var phoneNumber = $('#prize-step3').find('input[name="Step3[to]"]').val();

		data['Step3[id]'] = giftObject.id;
		data['Step3[to]'] = proccessPhone(phoneNumber);

		$.post(
			'/gift_step3',
			data,
			function (res) {
				if(res) {
					$('#toStep4').click();
				}
			}
		);
	});

	$('#tank-step2').find('a.other').on('click', function () {
		var data = {};
		data.id = $('#tank-step2').find('.current_activity').val();

		$.post(
			'/changeactivity',
			data,
			function (res) {
				if (res) {
					$('#tank-step2').find('.current_activity').val(res.id);
					$('#tank-step2').find('.prize-task').val(res.text);


				}
			}
		);
	})
	$('#tank-step2').find('span.social-btn').on('click', function () {
		var data = {};
		var phoneNumber = $('#tank-step2').find('input[name="TankForm[phone]"]').val();

		data['TankForm[activity]'] = $('#tank-step2').find('input[name="TankForm[activity]"]').val();
		data['TankForm[name]'] = $('#tank-step2').find('input[name="TankForm[name]"]').val();
		data['TankForm[phone]'] = proccessPhone(phoneNumber);
		data['TankForm[text]'] = $('#tank-step2').find('textarea[name="TankForm[text]"]').val();

		$.post(
			'/addparticipant',
			data,
			function (res) {
				if (res) {
					console.log(res);
					$('#tank_toStep3').click();
				}
			}
		);
	});

	Share = {
		url: location.protocol+'//'+location.hostname,
		title_main: 'Обменивайте баллы «МТС Бонус» на золото, дни премиум-аккаунта или инвайт-код для WoT!',

		vk_main: function() {
			url  = 'http://vkontakte.ru/share.php?';
			url += 'url='          + encodeURIComponent(this.url);
			url += '&title='       + encodeURIComponent(this.title_main);
			url += '&image='       + this.url+'/img/share/1_5.jpg';
			url += '&noparse=true';
			Share.popup(url);
		},
		fb_main: function() {
			url  = 'https://www.facebook.com/dialog/feed?';
			url += 'caption='     + encodeURIComponent(this.title_main);
			url += '&link='       + encodeURIComponent(this.url);
			url += '&picture=' + this.url+'/img/share/1_1.jpg';
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

	$('.socials a').on('click', function () {
		var share_btn = $(this).attr('data-share');

		Share[share_btn]();
	})
});

function proccessPhone(phone) {
	var phoneNum = phone.replaceArray(['(', ')', ' ', '-', '-'], ['', '', '', '', '']);
	return phoneNum ? '375' + phoneNum : null;
}

String.prototype.replaceArray = function(find, replace) {
	var replaceString = this;
	for (var i = 0; i < find.length; i++) {
		replaceString = replaceString.replace(find[i], replace[i]);
	}
	return replaceString;
};
