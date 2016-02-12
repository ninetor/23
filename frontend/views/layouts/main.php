<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

if (isset($this->params['activity']))
	$activity = $this->params['activity'];
if (isset($this->params['presents']))
	$presents = $this->params['presents'];
//var_dump($activity);die;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>
<?php $this->beginBody() ?>


<div class="bgblock1"></div>
<div class="bgblock2"></div>

<!--LAYOUT-->
<div class="layout">
	<!--HEADER-->
	<header class="page-header">
		<div class="container">
			<div class="top-logo">
				<img src="img/content/logomts.png" alt="">
			</div>
			<a href="#" class="menu-btn">
				<span class="burger-icon"></span>
			</a>
			<div class="socials">
				<a href="#" class="socials__item vk"><span></span></a>
				<a href="#" class="socials__item facebook"><span></span></a>
				<a href="#" class="socials__item twitter"><span></span></a>
			</div>
			<nav class="top-nav">
				<a href="#tank-step1" class="top-nav__item popup">Выиграть танк</a>
				<a href="#prize-step1" class="top-nav__item popup">Сделать подарок</a>
				<?= Html::a('Мтс бонус', Url::to(['site/bonus']), ['class' => 'top-nav__item']); ?>
				<?= Html::a('Правила', Url::to(['site/rules']), ['class' => 'top-nav__item']); ?>
			</nav>
		</div>
	</header><!--END HEADER-->
	<div class="page-content">
		<?= $content?>
	</div>
</div><!-- END LAYOUT-->


<!-- MOBILE-MENU-->
<div class="menu-right">
	<ul class="menu-right__list">
		<li class="menu-right__item"><a href="#">Выиграть танк</a></li>
		<li class="menu-right__item"><a href="#">Сделать подарок</a></li>
		<li class="menu-right__item"><a href="#">Мтс бонус</a></li>
		<li class="menu-right__item"><a href="#">Правила</a></li>
	</ul>
	<div class="socials">
		<a href="#" class="socials__item vk"><span></span></a>
		<a href="#" class="socials__item facebook"><span></span></a>
		<a href="#" class="socials__item twitter"><span></span></a>
	</div>
</div><!--END MOBILE-MENU-->

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
					<a href="#members" class="popup members">Участники</a>
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

	<div id="members">
		<div class="steps-wrap--members">
			<ul class="tabs">
				<li><a href="#tab1">Участники</a></li>
				<li><a href="#tab2">Победители</a></li>
			</ul>
			<div class="tab_container">
				<div id="tab1" class="tab_content">
					<div class="member-list">
						<div class="member-item">
							<div class="member-item__name">
								Игорь Селиверстов
								<span class="member-item__date">27 ноября</span>
							</div>
							<div class="member-item__info">
								Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана.
							</div>
						</div>
						<div class="member-item">
							<div class="member-item__name">
								Андрей Волосюк
								<span class="member-item__date">27 ноября</span>
							</div>
							<div class="member-item__info">
								Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот.
							</div>
						</div>
						<div class="member-item">
							<div class="member-item__name">
								Алексей Синкевич
								<span class="member-item__date">27 ноября</span>
							</div>
							<div class="member-item__info">
								Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.
							</div>
						</div>
						<div class="member-item">
							<div class="member-item__name">
								Игорь Селиверстов
								<span class="member-item__date">27 ноября</span>
							</div>
							<div class="member-item__info">
								Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана.
							</div>
						</div>
					</div>
					<div class="paging">
						<a href="#">Пред</a>
						<a href="#">1</a>
						<span class="active">2</span>
						<a href="#">3</a>
						<span class="etc">...</span>
						<a href="#">15</a>
						<a href="#">След</a>
					</div>
				</div>
				<div id="tab2" class="tab_content">
					<div class="members-list">
						<div class="member-item">
							<div class="member-item__name">
								Андрей Волосюк
								<span class="member-item__date">27 ноября</span>
							</div>
							<div class="member-item__info">
								Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот.
							</div>
						</div>
						<div class="member-item">
							<div class="member-item__name">
								Алексей Синкевич
								<span class="member-item__date">27 ноября</span>
							</div>
							<div class="member-item__info">
								Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку.
							</div>
						</div>
						<div class="member-item">
							<div class="member-item__name">
								Игорь Селиверстов
								<span class="member-item__date">27 ноября</span>
							</div>
							<div class="member-item__info">
								Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана.
							</div>
						</div>
					</div>
					<div class="paging">
						<a href="#">Пред</a>
						<a href="#">1</a>
						<span class="active">2</span>
						<a href="#">3</a>
						<span class="etc">...</span>
						<a href="#">15</a>
						<a href="#">След</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END POPUP-->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
