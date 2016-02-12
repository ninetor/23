<?php
	use \yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="container">
	<div class="page404">
		<div class="page404__img">
			<img src="img/content/404.png" alt="">
		</div>
		<div class="page404__text">
			<div class="one_more">
				К сожалению страница не найдена. Попробуйте еще раз
			</div>
			<?= Html::a('Вернуться на главную', Url::to(['site/index']))?></a>
		</div>
	</div>
</div>