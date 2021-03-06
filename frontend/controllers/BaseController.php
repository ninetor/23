<?php
/**
 * Created by PhpStorm.
 * User: karpovi4
 * Date: 12.02.16
 * Time: 13:46
 */

namespace frontend\controllers;

use common\models\Activity;
use common\models\Participant;
use frontend\models\Present;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;


class BaseController extends Controller {

	public function init() {
//		$presents = (new Present())->presents;
		$presents = (new Present())->getPresentsList();
		$activity = Activity::find()->orderBy('RAND()')->one();

		$query = Participant::find()->orderBy(['id' => SORT_DESC]);
		$countQuery = clone $query;
		$p_pages = new Pagination(['totalCount' => $countQuery->count()]);
		$p_pages->pageSize = 10;
		$models = $query->offset($p_pages->offset)
			->limit($p_pages->limit)
			->all();

		$winners = Participant::find()->where(['winner' => 1])->all();

		$this->getView()->params = [
			'participants' => $models,
			'participants_pages' => $p_pages,
			'presents' => $presents,
			'activity' => $activity,
			'winners' => $winners,
		];
		parent::init(); // TODO: Change the autogenerated stub
	}
}