<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;

$this->title = 'My Yii Application';
?>


<div class="container">
	<div class="wot-info">
		<div class="wot-info__left">
			<div class="wot-info__logo">
				<img src="img/content/logowot.png" alt="">
			</div>
			<div class="wot-info__title">Боевые подарки!</div>
		</div>
		<div class="wot-info__right">
			<p>Пена для бритья, носки или блокнот ― одни и те же подарки на каждый праздник?</p>
			<p>Выбирайте подарки, которые порадуют: выиграйте танк или обменяйте баллы «МТС Бонус» на <strong>золото, дни премиум-аккаунта</strong> или <strong>инвайт-код</strong> для игры World of Tanks</p>
			<p>Поделись ссылкой на проект &#8212; подскажите, что вам подарить!</p>
		</div>
	</div>
	<div class="wot-select">
		<a href="#tank-step1" class="wot-select__item popup">
			<div class="wot-select__item-img wot-select__item-img--tank">
				<div class="wot-select__item-img-wrap">
					<img src="img/content/tank.png" alt="">
					<div class="wot-select__item-img__info">
						<div class="wot-select__item-img__info-center">
							<span><strong>Золото, премиум-аккаунт</strong> или</span>
							<span><strong>инвайт-код</strong> World of Tanks &#8212; дарите</span>
							<span>боевые подарки с «МТС Бонус»!</span>
						</div>
					</div>
				</div>
			</div>
			<span class="select-btn select-btn--tank">Выиграть танк</span>
		</a>
		<a href="#prize-step1" class="wot-select__item popup">
			<div class="wot-select__item-img wot-select__item-img--prize">
				<div class="wot-select__item-img-wrap">
					<img src="img/content/present.png" alt="">
					<div class="wot-select__item-img__info">
						<div class="wot-select__item-img__info-center">
							<span class="advert">Участвуйте в конкурсе</span>
							<span>Призы</span>
							<span>50 танков Т-34-85-М</span>
							<span>+ 5 дней премиум-аккаунта для<br> игры World of Tanks</span>
						</div>
					</div>
				</div>
			</div>
			<span class="select-btn select-btn--prize">Сделать подарок</span>
		</a>
	</div>
</div>

<!-- POPUP-->
<div class="popup-content">
	<form action="#" method="post">
		<div id="tank-step1">
			<div class="steps-wrap--tanks">
				<div class="popup-content__title">Выиграйте танк</div>
				<div class="popup-content__info">
					Для себя или в подарок &#8212; участвуйте в творческом конкурсе и выиграйте:
					<strong>1 из 50 танков Т-34-85М + 5 дней премиум-аккаунта</strong>
					<span class="clarification">Зовите участвовать друзей: чем больше завок, тем больше шансов!</span>
				</div>
				<div class="tank-steps-list">
					<ul>
						<li class="tank-steps-list__item">
							<div class="tank-steps-list__inner">
								<div class="tank-steps-list__inner-img">
									<img src="img/content/tank-step1.png" alt="">
								</div>
								<div class="tank-steps-list__inner-info">
									Напишите, почему хотите получить<br> танк, а не банальный подарок
								</div>
							</div>
						</li>
						<li class="tank-steps-list__item">
							<div class="tank-steps-list__inner">
								<div class="tank-steps-list__inner-img">
									<img src="img/content/tank-step2.png" alt="">
								</div>
								<div class="tank-steps-list__inner-info">
									Поделитесь своим вариантом в соцсети<br>
									<i class="vk"></i> Вконтакте <i class="fb"></i> Facebook
								</div>
							</div>
						</li>
						<li class="tank-steps-list__item">
							<div class="tank-steps-list__inner">
								<div class="tank-steps-list__inner-img">
									<img src="img/content/tank-step3.png" alt="">
								</div>
								<div class="tank-steps-list__inner-info">
									Получите шанс выиграть Т-34-85М<br> + 5 дней премиум-аккаунта
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="btn-wrap">
					<a href="#tank-step2" class="popup popup-btn">Выиграть танк</a>
					<a href="#" class="members">Участники</a>
				</div>
			</div>
		</div>

		<div id="tank-step2">
			<div class="steps-wrap--tanks">
				<div class="popup-content__title">Задание для конкурса</div>
			</div>
		</div>
	</form>

	<form action="#" method="post">
		<div id="prize-step1">
			<?php $step1_form = ActiveForm::begin([
				'id' => 'step1',
				'validateOnBlur' => false,
				'fieldConfig' => [
					'template' => "{input}"
				],
			]); ?>
			<div class="steps-wrap">
				<div class="popup-content__title">Сделать подарок</div>
				<div class="popup-content__info">
					Игровое золото, премиум-аккаунт или инвайт-код &#8212; сделайте подарок поклоннику World of Tanks!
					<strong>Подарок вы можете оплатить вашими баллами &#171;МТС Бонус&#187;</strong>
				</div>
				<ol class="steps-list">
					<li class="steps-list__item steps-list__item--active"><div class="item">Выберите подарок и введите свой номер телефона</div></li>
					<li class="steps-list__item"><div class="item">Введите код для подтверждения</div></li>
					<li class="steps-list__item"><div class="item">Введите номер, на который нужно отправить подарок</div></li>
					<li class="steps-list__item"><div class="item">SMS-поздравление c подарком отправлено!</div></li>
				</ol>

				<div class="steps-cost-wrap">
					<div class="steps-cost">
						<div class="steps-cost--row">
							<div class="steps-cost--column"><span class="title">Выберите подарок</span></div>
							<div class="steps-cost--column"><span class="title">Стоимость</span></div>
						</div>
						<div class="steps-cost--row">
							<div class="steps-cost--column">
								<input type="radio" value="456" id="prize1" name="Step1[gift_code]" class="radio">
								<label for="prize1">50 игрового золота</label>
							</div>
							<div class="steps-cost--column">200 баллов МТС Бонус</div>
						</div>
						<div class="steps-cost--row">
							<div class="steps-cost--column">
								<input type="radio" id="prize2" name="prizes" class="radio">
								<label for="prize2">100 игрового золота</label>
							</div>
							<div class="steps-cost--column">350 баллов МТС Бонус</div>
						</div>
						<div class="steps-cost--row">
							<div class="steps-cost--column">
								<input type="radio" id="prize3" name="prizes" class="radio">
								<label for="prize3">250 игрового золота</label>
							</div>
							<div class="steps-cost--column">800 баллов МТС Бонус</div>
						</div>
						<div class="steps-cost--row">
							<div class="steps-cost--column">
								<input type="radio" id="prize4" name="prizes" class="radio">
								<label for="prize4">1 день премиум-аккаунта</label>
							</div>
							<div class="steps-cost--column">800 баллов МТС Бонус</div>
						</div>
						<div class="steps-cost--row">
							<div class="steps-cost--column">
								<input type="radio" id="prize5" name="prizes" class="radio">
								<label for="prize5">Инвайт-код (для новых игроков):<br> премиум танк T-127 + 3 дня<br> премиум-аккаунта</label>
							</div>
							<div class="steps-cost--column">100 баллов МТС Бонус</div>
						</div>
					</div>
					<div class="steps-cost--number">
						<span class="title">Введите свой номер МТС для обмена баллов на выбранный подарок</span>
						<div class="steps-cost--number-wrap">
							<div class="phone-code">
								<?= $step1_form->field($step1, 'from')->textInput()?>
							</div>
						</div>
						<a href="#">Как узнать сколько у меня баллов &#171;МТС Бонус&#187; ?</a>
					</div>
				</div>
				<div class="btn-wrap">
					<a href="#prize-step2" class="popup-btn">Продолжить</a>
				</div>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
		<div id="prize-step2">
			<div class="steps-wrap">
				<div class="popup-content__title">Сделать подарок</div>
				<div class="popup-content__info">
					Игровое золото, премиум-аккаунт или инвайт-код &#8212; сделайте подарок поклоннику World of Tanks!
					<strong>Подарок вы можете оплатить вашими баллами &#171;МТС Бонус&#187;</strong>
				</div>
				<ol class="steps-list">
					<li class="steps-list__item"><div class="item">Выберите подарок и введите свой номер телефона</div></li>
					<li class="steps-list__item steps-list__item--active"><div class="item">Введите код для подтверждения</div></li>
					<li class="steps-list__item"><div class="item">Введите номер, на который нужно отправить подарок</div></li>
					<li class="steps-list__item"><div class="item">SMS-поздравление c подарком отправлено!</div></li>
				</ol>
				<div class="password-wrap">
					<span class="title">Введите код, полученный в SMS</span>
					на номер <i>+375 (29) 123-45-67</i>
					<div class="steps-cost--number-wrap">
						<input type="password">
					</div>
					<div class="btn-wrap">
						<a href="#prize-step3" class="popup popup-btn">Продолжить</a>
					</div>
				</div>
			</div>
		</div>
		<div id="prize-step3">
			<div class="steps-wrap">
				<div class="popup-content__title">Сделать подарок</div>
				<div class="popup-content__info">
					Игровое золото, премиум-аккаунт или инвайт-код &#8212; сделайте подарок поклоннику World of Tanks!
					<strong>Подарок вы можете оплатить вашими баллами &#171;МТС Бонус&#187;</strong>
				</div>
				<ol class="steps-list">
					<li class="steps-list__item"><div class="item">Выберите подарок и введите свой номер телефона</div></li>
					<li class="steps-list__item"><div class="item">Введите код для подтверждения</div></li>
					<li class="steps-list__item steps-list__item--active"><div class="item">Введите номер, на который нужно отправить подарок</div></li>
					<li class="steps-list__item"><div class="item">SMS-поздравление c подарком отправлено!</div></li>
				</ol>
				<div class="password-wrap">
					<span class="title">Введите номер телефона, на который хотите отправить подарок</span>
					На данный номер будет отправлено SMS-поздравление с уникальным кодом для игры  World  of Tanks
					<div class="steps-cost--number-wrap">
						<div class="phone-code">
							<input type="text">
						</div>
					</div>
					<div class="btn-wrap">
						<a href="#prize-step4" class="popup popup-btn">Продолжить</a>
					</div>
				</div>
			</div>
		</div>
		<div id="prize-step4">
			<div class="steps-wrap">
				<div class="popup-content__title">Сделать подарок</div>
				<div class="popup-content__info">
					Игровое золото, премиум-аккаунт или инвайт-код &#8212; сделайте подарок поклоннику World of Tanks!
					<strong>Подарок вы можете оплатить вашими баллами &#171;МТС Бонус&#187;</strong>
				</div>
				<ol class="steps-list">
					<li class="steps-list__item"><div class="item">Выберите подарок и введите свой номер телефона</div></li>
					<li class="steps-list__item"><div class="item">Введите код для подтверждения</div></li>
					<li class="steps-list__item"><div class="item">Введите номер, на который нужно отправить подарок</div></li>
					<li class="steps-list__item steps-list__item--active"><div class="item">SMS-поздравление c подарком отправлено!</div></li>
				</ol>
				<div class="password-wrap">
					<span class="title">SMS-поздравление с подарком отправлено! Спасибо за участие!</span>
					<div class="medal">
						<img src="img/content/medal.png" alt="">
					</div>
					<div class="medal-message">
						Вам &#8212; медаль за боевой подарок! Заберите себе на стену:
					</div>
					<div class="btn-wrap">
						<a href="#" class="social-btn social-btn--vk"><i></i>Вконтакте</a>
						<a href="#" class="social-btn social-btn--fb"><i></i>Facebook</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- END POPUP-->
