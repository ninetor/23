<?php
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
				<div class="task">
					<label for="tank-task">Задание</label>
					<div class="input-wrap">
						<input type="text" id="tank-task" value="<?= $activity->text; ?>" class="prize-task input-bold">
						<input type="hidden" class="current_activity" name="TankForm[activity]" value="<?= $activity->id;?>">
						<a href="#" class="other">Другое</a>
					</div>
					<label for="tank-message">Напишите, почему хотите получить танк, а не носки:</label>
					<textarea id="tank-message" name="TankForm[text]" placeholder="Например: «У меня столько носков, что я могу построить из них крепость!»"></textarea>
					<label for="tank-name">Ваше имя и номер телефона:</label>

					<div class="input-wrap">
						<input type="text" id="tank-name" class="input-half" name="TankForm[name]" placeholder="Имя">
						<div class="phone-code">
							<input type="text" id="tank-phone" name="TankForm[phone]" class="input-half user_phone" placeholder="">
						</div>
					</div>
					<span class="clarification">Номер телефона будет использован для связи с победителем и не будет опубликован на сайте</span>
				</div>
				<div class="btn-wrap">
					<div class="btn-wrap__title">Поделитесь своим вариантом в социальной сети</div>

					<a href="#tank-step3" id="tank_toStep3" class="popup popup-btn" style="display: none"></a>
					<span class="social-btn social-btn--vk"><i></i>Вконтакте</span><!--class popup убираем с кнопки-->
					<span class="social-btn social-btn--fb"><i></i>Facebook</span><!--class popup убираем с кнопки-->
				</div>
			</div>
		</div>

		<div id="tank-step3">
			<div class="steps-wrap--tanks">
				<div class="final-popup">
					<div class="popup-content__title">Спасибо за участие!</div>
					<div class="popup-content__info">
						Для абонентов МТС &#8212; уникальная возможность:<br>
						обменяйте баллы  &#171;МТС Бонус&#187; на золото, премиум аккаунт<br>
						или инвайт-код World of Tanks
						<strong>Сделайте подарок себе или другу!</strong>
						<a href="#">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
	</form>

	<form action="#" method="post">
		<div id="prize-step1">
			<div class="steps-wrap">
				<div class="popup-content__title">Сделать подарок</div>
				<div class="popup-content__info">
					Игровое золото, премиум-аккаунт или инвайт-код &#8212; сделайте подарок поклоннику World of Tanks!
					<strong>Подарок вы можете оплатить вашими баллами &#171;МТС Бонус&#187;</strong>
				</div>
				<ol class="steps-list">
					<li class="steps-list__item steps-list__item--active"><div class="item">Выберите подарок и введите свой номер телефона</div></li>
					<li class="steps-list__item"><div class="item">Введите номер, на который нужно отправить подарок</div></li>
					<li class="steps-list__item"><div class="item">Введите код для подтверждения</div></li>
					<li class="steps-list__item"><div class="item">SMS-поздравление c подарком отправлено!</div></li>
				</ol>

				<div class="steps-cost-wrap">
					<div class="steps-cost">
						<div class="steps-cost--row">
							<div class="steps-cost--column"><span class="title">Выберите подарок</span></div>
							<div class="steps-cost--column"><span class="title">Стоимость</span></div>
						</div>
						<?php if(count($presents)) { ?>
							<?php foreach ($presents as $present_key => $present) { ?>
								<div class="steps-cost--row">
									<div class="steps-cost--column">
										<input type="radio" value="<?= $present_key; ?>" id="prize<?= $present_key; ?>" name="Step1[gift_code]" class="radio">
										<label for="prize<?= $present_key; ?>">
											<?= $present['name']; ?>
											<?= isset($present['description']) ? $present['description'] : null; ?>
										</label>
									</div>
									<div class="steps-cost--column"><?= $present['price']; ?> баллов МТС Бонус</div>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
					<div class="steps-cost--number">
						<span class="title">Введите свой номер МТС для обмена баллов на выбранный подарок</span>
						<div class="steps-cost--number-wrap">
							<div class="phone-code">
								<input class="user_phone" type="text" name="Step1[from]">
							</div>
						</div>
						<a href="#">Как узнать сколько у меня баллов &#171;МТС Бонус&#187; ?</a>
					</div>
				</div>
				<div class="btn-wrap">
					<span class="popup-btn">Продолжить</span>
					<a href="#prize-step2" id="toStep2" class="popup popup-btn" style="display: none"></a>
				</div>
			</div>
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
					<li class="steps-list__item steps-list__item--active"><div class="item">Введите номер, на который нужно отправить подарок</div></li>
					<li class="steps-list__item"><div class="item">Введите код для подтверждения</div></li>
					<li class="steps-list__item"><div class="item">SMS-поздравление c подарком отправлено!</div></li>
				</ol>
				<div class="password-wrap">
					<span class="title">Введите номер телефона, на который хотите отправить подарок</span>
					На данный номер будет отправлено SMS-поздравление с уникальным кодом для игры  World  of Tanks
					<div class="steps-cost--number-wrap">
						<div class="phone-code">
							<input class="user_phone" type="text" name="Step2[to]">
						</div>
					</div>
					<div class="btn-wrap">
						<span class="popup-btn">Продолжить</span>
						<a href="#prize-step3" id="toStep3" class="popup popup-btn" style="display: none"></a>
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
					<li class="steps-list__item"><div class="item">Введите номер, на который нужно отправить подарок</div></li>
					<li class="steps-list__item steps-list__item--active"><div class="item">Введите код для подтверждения</div></li>
					<li class="steps-list__item"><div class="item">SMS-поздравление c подарком отправлено!</div></li>
				</ol>
				<div class="password-wrap">
					<span class="title">Введите код, полученный в SMS</span>
					на номер <i>+375 (29) 123-45-67</i>
					<div class="steps-cost--number-wrap">
						<input type="password">
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
					<li class="steps-list__item"><div class="item">Введите номер, на который нужно отправить подарок</div></li>
					<li class="steps-list__item"><div class="item">Введите код для подтверждения</div></li>
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
