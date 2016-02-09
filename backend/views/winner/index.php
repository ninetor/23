<?php

use common\models\Participant;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Winners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

	        [
		        'attribute' => 'date',
		        'label' => 'Date',
		        'value' => function (Participant  $model) {
					return (new \DateTime)->createFromFormat('Y-m-d H:i:s',$model->date)->format('F, d');
		        }
	        ],
            'name',
            'phone',
            'text',
        ],
    ]); ?>

</div>
