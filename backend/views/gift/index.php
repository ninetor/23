<?php

use common\models\Gift;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gifts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gift-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

	        [
		        'attribute' => 'date',
		        'label' => 'Date',
		        'value' => function ($model) {
			        return (new \DateTime)->createFromFormat('Y-m-d H:i:s',$model->date)->format('F, d');
		        }
	        ],
            'from',
            'to',
            'gift_code',
            'order_id',
        ],
    ]); ?>

</div>
