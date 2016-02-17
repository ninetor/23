<?php

namespace frontend\controllers;

use common\models\Activity;
use common\models\Participant;
use frontend\components\Date;
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
				return $new_activity;
			}
		}
		return false;
	}

	/**
	 * @return bool
	 */
	public  function actionAddparticipant() {
		if (Yii::$app->request->isAjax) {
			Yii::$app->response->format = Response::FORMAT_JSON;

			$model = new TankForm();
			if ($model->load(Yii::$app->request->post()))
				$res = $model->addParticipant();
				return $res;
		}

		return false;
	}

	/**
	 * @return array|bool|null|\yii\db\ActiveRecord
	 */
	public function actionGetpostdata() {
		if (Yii::$app->request->isAjax) {
			Yii::$app->response->format = Response::FORMAT_JSON;

			$id = intval(Yii::$app->request->post('id'));

			$participant = Participant::find()
				->select(['date', 'name', 'text'])
				->where(['id' => $id])
				->one();

			if($participant) {
				$participant->date = Date::DateMonth($participant->date);

				return $participant;
			}
		}

		return false;
	}
}