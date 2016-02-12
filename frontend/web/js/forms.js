$(document).ready(function() {
	var giftObject = {}

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
		var phoneNumber = $('#prize-step2').find('input[name="Step2[to]"]').val();

		data['Step2[id]'] = giftObject.id;
		data['Step2[to]'] = proccessPhone(phoneNumber);

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
});

function proccessPhone(phone) {
	var phoneNum = phone.replaceArray(['(', ')', ' ', '-', '-'], ['', '', '', '', '']);
	return phoneNum ? '+375' + phoneNum : null;
}

String.prototype.replaceArray = function(find, replace) {
	var replaceString = this;
	for (var i = 0; i < find.length; i++) {
		replaceString = replaceString.replace(find[i], replace[i]);
	}
	return replaceString;
};
