<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\components\Date;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

if (isset($this->params['activity']))
	$activity = $this->params['activity'];
if (isset($this->params['presents']))
	$presents = $this->params['presents'];
//var_dump($activity);die;

$controller = Yii::$app->controller;
$default_controller = Yii::$app->defaultRoute;
$isHome = ($controller->id === $default_controller && $controller->action->id === $controller->defaultAction) ? true : false;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" >
<head>
    <meta charset="<?= Yii::$app->charset ?>">
	<meta property="og:title" content="#БоевыеПодарки МТС" />
	<meta property="og:description" content="Обменивайте баллы «МТС Бонус» на золото, дни премиум-аккаунта или инвайт-код для WoT!" />
	<meta property="og:image" content="http://tanki.mts.by/img/share/1_1.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Боевые подарки от МТС</title>
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
				<?php if(!$isHome) { ?><a href="<?= Url::to(['/']); ?>"><?php } ?>
					<img src="img/content/logomts.png" alt="">
				<?php if(!$isHome) { ?></a><?php } ?>
			</div>
			<a href="#" class="menu-btn">
				<span class="burger-icon"></span>
			</a>
			<div class="socials">
				<a href="#" data-share="vk_main" class="socials__item vk"><span></span></a>
				<a href="#" data-share="fb_main" class="socials__item facebook"><span></span></a>
				<a href="#" data-share="tw_main" class="socials__item twitter"><span></span></a>
			</div>
			<nav class="top-nav">
				<a href="#tank-step1" class="top-nav__item popup">Выиграть танк</a>
				<a href="#prize-step1" class="top-nav__item popup">Сделать подарок</a>
				<?= Html::a('МТС Бонус', Url::to(['site/bonus']), ['class' => 'top-nav__item']); ?>
				<?= Html::a('Правила', Url::to(['site/rules']), ['class' => 'top-nav__item']); ?>
			</nav>
		</div>
	</header><!--END HEADER-->
	<div class="page-content <?= $isHome ? 'page-content--index' : null; ?>">
		<?= $content?>
	</div>
</div><!-- END LAYOUT-->


<!-- MOBILE-MENU-->
<div class="menu-right">
	<ul class="menu-right__list">
		<li class="menu-right__item"><a href="#tank-step1" class="popup">Выиграть танк</a></li>
		<li class="menu-right__item"><a href="#prize-step1" class="popup">Сделать подарок</a></li>
		<li class="menu-right__item"><a href="<?= Url::to(['site/bonus']);?>">МТС Бонус</a></li>
		<li class="menu-right__item"><a href="<?= Url::to(['site/rules']);?>">Правила</a></li>
	</ul>
	<div class="socials">
		<a href="#" data-share="vk_main"  class="socials__item vk"><span></span></a>
		<a href="#" data-share="fb_main"  class="socials__item facebook"><span></span></a>
		<a href="#" data-share="tw_main"  class="socials__item twitter"><span></span></a>
	</div>
</div><!--END MOBILE-MENU-->

<!-- POPUP-->
<div class="popup-content">
	<form action="#" method="post">
		<div id="tank-step1">
			<a href="#" class="fancy-close"></a>
			<div class="steps-wrap--tanks">
				<div class="popup-content__title">Выиграйте танк</div>
				<div class="popup-content__info">
					Для себя или в подарок &#8212; участвуйте в творческом конкурсе и выиграйте:
					<strong>1 из 50 танков Т-34-85М + 7 дней премиум-аккаунта</strong>
					<span class="clarification">Зовите участвовать друзей: чем больше заявок, тем больше шансов!</span>
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
									Получите шанс выиграть Т-34-85М<br> + 7 дней премиум-аккаунта
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="btn-wrap">
					<a href="#tank-step2" class="popup popup-btn">Выиграть танк</a>
					<div class="members-wrap">
						<a href="#members" class="popup members">Участники</a>
					</div>
				</div>
			</div>
		</div>
		<div id="tank-step2">
			<a href="#" class="fancy-close"></a>
			<div class="steps-wrap--tanks">
				<div class="popup-content__title">Задание для конкурса</div>
				<div class="task">
					<label for="tank-task"><a href="#" class="other">Другое</a>Задание</label>
					<div class="input-wrap">
						<input type="text" readonly id="tank-task" value="<?= $activity->text; ?>" class="prize-task input-bold">
						<input type="hidden" class="current_activity" name="TankForm[activity]" value="<?= $activity->id;?>">
						<a href="#" class="other">Другое</a>
					</div>
					<label class="tank-cause" for="tank-message"><?= $activity->cause; ?></label>
					<div class="error-wrap">
						<textarea id="tank-message" name="TankForm[text]" placeholder="<?= $activity->example ?>"></textarea>
						<div class="error-msg error-text"></div>
					</div>
					<label for="tank-name">Ваше имя и номер телефона:</label>

					<div class="input-wrap">
						<div class="error-wrap input-half">
							<input type="text" id="tank-name" name="TankForm[name]" placeholder="Имя">
							<div class="error-msg error-name"></div>
						</div>
						<div class="error-wrap input-half">
							<div class="phone-code">
								<input type="tel" id="tank-phone" name="TankForm[phone]" class="user_phone" placeholder="">
							</div>
							<div class="error-msg error-phone"></div>
						</div>
					</div>
					<span class="clarification">Номер телефона будет использован для связи с победителем и не будет опубликован на сайте</span>
				</div>
				<div class="btn-wrap">
					<span class="popup-btn">Продолжить</span>
					<a href="#prize-step4" id="toStep4" class="popup popup-btn" style="display: none"></a>
				</div>
			</div>
		</div>
		<div id="tank-step3">
			<a href="#" class="fancy-close"></a>
			<div class="steps-wrap--tanks">
				<div class="popup-content__title">Спасибо за участие!</div>
				<div class="btn-wrap">
					<div class="btn-wrap__title">Поделитесь своим вариантом в социальной сети</div>
					<a href="#tank-step3" id="tank_toStep3" class="popup popup-btn" style="display: none"></a>
					<div class="social-btn-wrap">
						<span class="social-btn social-btn--vk" data-share="vk_tank"><i></i>Вконтакте</span>
					</div>
					<div class="social-btn-wrap">
						<span class="social-btn social-btn--fb" data-share="fb_tank"><i></i>Facebook</span>
					</div>
				</div>
				<div class="final-popup">
					<div class="popup-content__info">
						Для абонентов МТС &#8212; уникальная возможность:<br>
						обменяйте баллы  &#171;МТС Бонус&#187; на золото, премиум аккаунт<br>
						или инвайт-код World of Tanks
						<strong>Сделайте подарок себе или другу!</strong>
						<a href="<?= Url::to(['/', '#' => 'prize-step1'])?>" target="_blank">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
	</form>

	<form action="#" method="post">
		<div id="prize-step1">
			<a href="#" class="fancy-close"></a>
			<div class="preloader-wrap" id="loadersoc">
				<div class="preloader">
					<div class="circ1"></div>
					<div class="circ2"></div>
					<div class="circ3"></div>
					<div class="circ4"></div>
				</div>
			</div>
			<div class="steps-wrap">
				<div class="popup-content__title">Сделать подарок</div>
				<div class="popup-content__info">
					Игровое золото, премиум-аккаунт или инвайт-код &#8212; сделайте подарок поклоннику World of Tanks!
					<strong>Подарок вы можете оплатить вашими баллами &#171;МТС Бонус&#187;</strong>
				</div>
				<ul class="steps-list-mobile">
					<li>Шаг 1 из 4</li>
				</ul>
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
						<?php if(count($presents)) { ?>
							<?php foreach ($presents as $present_key => $present) { ?>
								<div class="steps-cost--row">
									<div class="steps-cost--column">
										<input type="radio" value="<?= $present_key; ?>" id="prize<?= $present_key; ?>" name="Step1[gift_code]" class="radio">
										<label for="prize<?= $present_key; ?>">
											<?= $present['name']; ?>
											<?= isset($present['description']) ? $present['description'] : null; ?>
										</label>
										<strong class="mobile-sum"> - <?= $present['price']; ?> баллов</strong>
									</div>
									<div class="steps-cost--column"><?= $present['price']; ?> баллов МТС Бонус</div>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
					<div class="steps-cost--number">
						<span class="title">Введите свой номер МТС для обмена баллов на выбранный подарок</span>
						<div class="steps-cost--number-wrap">
							<div class="error-wrap">
								<div class="phone-code">
									<input class="user_phone" type="tel" name="Step1[from]">
								</div>
								<div class="error-msg error-phone"></div>
							</div>
						</div>
						<a href="<?= Url::to(['site/bonus', '#' => 'get_to_know_points']);?>" target="_blank">Как узнать сколько у меня баллов &#171;МТС Бонус&#187; ?</a>
					</div>
				</div>
				<div class="btn-wrap">
					<span class="popup-btn">Продолжить</span>
					<a href="#prize-step2" id="toStep2" class="popup popup-btn" style="display: none"></a>
				</div>
			</div>
		</div>
		<div id="prize-step2">
			<a href="#" class="fancy-close"></a>
			<div class="preloader-wrap" id="loadersoc">
				<div class="preloader">
					<div class="circ1"></div>
					<div class="circ2"></div>
					<div class="circ3"></div>
					<div class="circ4"></div>
				</div>
			</div>
			<div class="steps-wrap">
				<div class="popup-content__title">Сделать подарок</div>
				<div class="popup-content__info">
					Игровое золото, премиум-аккаунт или инвайт-код &#8212; сделайте подарок поклоннику World of Tanks!
					<strong>Подарок вы можете оплатить вашими баллами &#171;МТС Бонус&#187;</strong>
				</div>
				<ul class="steps-list-mobile">
					<li>Шаг 2 из 4</li>
				</ul>
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
						<div class="error-wrap error-wrap--short">
							<input type="text" name="Step2[validation_code]">
							<div class="error-msg"></div>
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
			<a href="#" class="fancy-close"></a>
			<div class="preloader-wrap" id="loadersoc">
				<div class="preloader">
					<div class="circ1"></div>
					<div class="circ2"></div>
					<div class="circ3"></div>
					<div class="circ4"></div>
				</div>
			</div>
			<div class="steps-wrap">
				<div class="popup-content__title">Сделать подарок</div>
				<div class="popup-content__info">
					Игровое золото, премиум-аккаунт или инвайт-код &#8212; сделайте подарок поклоннику World of Tanks!
					<strong>Подарок вы можете оплатить вашими баллами &#171;МТС Бонус&#187;</strong>
				</div>
				<ul class="steps-list-mobile">
					<li>Шаг 3 из 4</li>
				</ul>
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
							<div class="error-wrap error-wrap--short">
								<div class="phone-code">
									<input class="user_phone" type="tel" name="Step3[to]">
								</div>
							<div class="error-msg error-phone"></div>
						</div>
					</div>
					<div class="btn-wrap">
						<span class="popup-btn">Продолжить</span>
						<a href="#prize-step4" id="toStep4" class="popup popup-btn" style="display: none"></a>
					</div>
				</div>
			</div>
		</div>
		<div id="prize-step4">
			<a href="#" class="fancy-close"></a>
			<div class="steps-wrap">
				<div class="popup-content__title">Сделать подарок</div>
				<div class="popup-content__info">
					Игровое золото, премиум-аккаунт или инвайт-код &#8212; сделайте подарок поклоннику World of Tanks!
					<strong>Подарок вы можете оплатить вашими баллами &#171;МТС Бонус&#187;</strong>
				</div>
				<ul class="steps-list-mobile">
					<li>Шаг 4 из 4</li>
				</ul>
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
						<a href="#" class="social-btn social-btn--vk" data-share="vk_prize"><i></i>Вконтакте</a>
						<a href="#" class="social-btn social-btn--fb" data-share="fb_prize"><i></i>Facebook</a>
					</div>
				</div>
			</div>
		</div>
	</form>
	<div id="members">
		<a href="#" class="fancy-close"></a>
		<div class="steps-wrap--members">
			<ul class="tabs">
				<li><a href="#tab1">Участники</a></li>
				<li><a href="#tab2">Победители</a></li>
			</ul>
			<div class="tab_container">
				<div id="tab1" class="tab_content">
					<?php  Pjax::begin([
						'linkSelector' => '.listing-page li a',
						'enablePushState' => false,
					]);
					?>
					<div class="member-list">
						<?php foreach ($this->params['participants'] as $participant) { ?>
							<div class="member-item">
								<div class="member-item__name">
									<?= $participant->name; ?>
									<span class="member-item__date"><?= Date::DateMonth($participant->date); ?></span>
								</div>
								<div class="member-item__info">
									<?= $participant->text ?>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="paging">
						<?=
						LinkPager::widget([
							'pagination' => $this->params['participants_pages'],
							'options' => ['class' => 'listing-page'],
							'registerLinkTags' => true,
							'nextPageLabel' => 'След',
							'prevPageLabel' => 'Пред',
							'nextPageCssClass' => 'listing-arrow',
							'prevPageCssClass' => 'listing-arrow',
							'hideOnSinglePage' => true,
							'maxButtonCount' => 5,
						]);
						?>
					</div>
					<?php Pjax::end(); ?>
				</div>
				<div id="tab2" class="tab_content">
					<?php if(isset($this->params['winners']) && count($this->params['winners']) > 0) { ?>

					<?php } else {?>
						<div class="no-winners">Объявление первых 30 победителей ー 23 февраля!</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<a href="#member" class="popup member_click" style="display: none"></a>
	<div id="member">
		<a href="#" class="fancy-close"></a>
		<div class="steps-wrap--member">
			<div class="member-item">
				<div class="member-item__name">
					<span class="member-item__n"></span>
					<span class="member-item__date">16 фераля</span>
				</div>
				<div class="member-item__info">
					Я хочу танк
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END POPUP-->
<div class="footer">
	© 2002—2016 СООО «Мобильные ТелеСистемы». 220043, г. Минск пр. Независимости, 95 Лицензия МСиИ РБ №926 от 30.04.2004, действительна до 30.04.2022 УНП 800013732
</div>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-71496303-2', 'auto');
	ga('send', 'pageview');
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
