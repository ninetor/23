<?php

use common\models\Activity;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Participant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'activity')->dropDownList(
	    ArrayHelper::map(
		    Activity::find()->where(['id' => $model->activity])->all(),
		    'id',
		    'text'
	    ),
	    ['readonly' => true])
    ?>

    <?= $form->field($model, 'text')->textarea(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'winner')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
