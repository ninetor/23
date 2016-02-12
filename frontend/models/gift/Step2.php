<?php

namespace frontend\models\gift;

use Yii;
use common\models\Gift;
use yii\base\Model;

class Step2 extends Model {

	public $to;
	public $id;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['to', 'id'], 'required'],
			['id', 'integer'],
			['to', 'string', 'max' => 20],
		];
	}

	public function addPhoneTo () {
		if ($this->validate()) {

			$gift = Gift::findOne(['id' => intval($this->id)]);
			$gift->setAttributes($this->getAttributes());

			if($gift->save())
				return true;
		}
		return false;
	}
}