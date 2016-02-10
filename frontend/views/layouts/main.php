<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
				<a href="#" class="top-nav__item">Выиграть танк</a>
				<a href="#" class="top-nav__item">Сделать подарок</a>
				<a href="#" class="top-nav__item">Мтс бонус</a>
				<a href="#" class="top-nav__item">Правила</a>
			</nav>
		</div>
	</header><!--END HEADER-->
	<div class="page-content">
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
				<a href="#" class="wot-select__item popup">
					<div class="wot-select__item-img wot-select__item-img--tank">
						<img src="img/content/tank.png" alt="">
					</div>
					<span class="select-btn select-btn--tank">Выиграть танк</span>
				</a>
				<a href="#step1" class="wot-select__item popup">
					<div class="wot-select__item-img wot-select__item-img--prize">
						<img src="img/content/present.png" alt="">
					</div>
					<span class="select-btn select-btn--prize">Сделать подарок</span>
				</a>
			</div>
		</div>
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
	<form action="" method="post">
		<div id="step1">
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
								<input type="radio" id="prize1" name="prizes" class="radio">
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
								<input type="text">
							</div>
						</div>
						<a href="#">Как узнать сколько у меня баллов &#171;МТС Бонус&#187; ?</a>
					</div>
				</div>
				<div class="btn-wrap">
					<a href="#step2" class="popup popup-btn">Продолжить</a>
				</div>
			</div>
		</div>
		<div id="step2">
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
						<a href="#step3" class="popup popup-btn">Продолжить</a>
					</div>
				</div>
			</div>
		</div>
		<div id="step3">
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
						<a href="#step4" class="popup popup-btn">Продолжить</a>
					</div>
				</div>
			</div>
		</div>
		<div id="step4">
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
						<a href="#" class="social-btn"><i></i>Вконтакте</a>
						<a href="#" class="social-btn"><i></i>Facebook</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- END POPUP-->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
