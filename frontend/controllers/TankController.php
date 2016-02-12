<?php

namespace frontend\controllers;

use common\models\Activity;
use frontend\models\TankForm;
use Yii;
use yii\web\Response;

class TankController extends BaseController {

	/**
	 * @return array|bool
	 */
	public function actionChangeactivity() {
		if (Yii::$app->request->isAjax) {
			Yii::$app->response->format = Response::FORMAT_JSON;

			$id = intval(Yii::$app->request->post('id'));
			if($id) {
				$new_activity = Activity::find()
					->where('id != :id', ['id' => $id])
					->orderBy('RAND()')
					->one();
				return ['id' => $new_activity->id, 'text' => $new_activity->text];
			}
		}
		return false;
	}

	public  function actionAddparticipant() {
		if (Yii::$app->request->isAjax) {
			Yii::$app->response->format = Response::FORMAT_JSON;

			$model = new TankForm();
			if ($model->load(Yii::$app->request->post()) && $model->addParticipant())
				return true;
		}

		return false;
	}
}