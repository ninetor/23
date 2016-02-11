$(document).ready(function() {

	$('#prize-step1').find('.btn-wrap').on('click', function () {
		var data = {};
		var csrfToken = $('#prize-step1').find('input[name="_csrf"]').val();
		data['_csrf'] = csrfToken;
		data['Step1[from]'] = $('#prize-step1').find('input[name="Step1[from]"]').val();
		data['Step1[gift_code]'] = $('#prize-step1').find('input[name="Step1[gift_code]"]:checked').val();
		$.post(
			'/gift_step1',
			data,
			function (res) {
				if(res && res === true)
					show2step();
			}
		);
	});
});