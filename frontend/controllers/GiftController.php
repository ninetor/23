<?php
/**
 * Created by PhpStorm.
 * User: karpovi4
 * Date: 11.02.16
 * Time: 13:43
 */

namespace frontend\controllers;

use frontend\models\gift\Step2;
use Yii;
use frontend\models\gift\Step1;
use yii\web\Response;

class GiftController extends BaseController {


	/**
	 * @return bool|string
	 */
	public function actionStep1 () {
		if (Yii::$app->request->isAjax) {
			Yii::$app->response->format = Response::FORMAT_JSON;

			$step1 = new Step1();
			if($step1->load(Yii::$app->request->post())) {
				if ($res = $step1->addGift())
				return $res;
			}
		}
		return false;
	}

	/**
	 * @return bool|string
	 */
	public function actionStep2 () {
		if (Yii::$app->request->isAjax) {
			Yii::$app->response->format = Response::FORMAT_JSON;

			$step2 = new Step2();
			if($step2->load(Yii::$app->request->post())) {
				if ($res = $step2->addPhoneTo())
				return $res;
			}
		}
		return false;
	}
}