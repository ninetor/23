<?php
/**
 * Created by PhpStorm.
 * User: karpovi4
 * Date: 11.02.16
 * Time: 13:43
 */

namespace frontend\controllers;

use Yii;
use frontend\models\gift\Step1;
use yii\web\Controller;
use yii\web\Response;

class GiftController extends Controller {


	public function actionStep1 () {
		if (Yii::$app->request->isAjax) {
			Yii::$app->response->format = Response::FORMAT_JSON;

			$step1 = new Step1();
			if($step1->load(Yii::$app->request->post()) && $step1->addGift()) {
				return true;
			}
		}
		return false;
	}
}