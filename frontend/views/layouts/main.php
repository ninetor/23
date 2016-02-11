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


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
