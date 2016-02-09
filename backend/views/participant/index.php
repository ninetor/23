<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \common\models\Participant;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Participants';
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
	        [
		        'attribute' => 'activity',
		        'label' => 'Activity',
		        'format' => 'text',
		        'content' => function (Participant $model) {
					return $model->activity0->text;
		        }
	        ],
	        'text',
	        [
		        'attribute' => 'Winner',
		        'value' => function(Participant $model) {
			        return $model->winner ? '✔' : '✗';
		        },
		        'contentOptions'=> function(Participant $model) {
			        return ['class' => $model->winner ? 'in-bm' : 'non-bm'];
		        },
	        ],

	        [
		        'header'=>'Action',
		        'class' => 'yii\grid\ActionColumn',
		        'template' => '{update} {delete}',
	        ],
        ],
    ]); ?>

</div>
