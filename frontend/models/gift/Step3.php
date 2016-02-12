<?php

namespace frontend\models\gift;

use Yii;
use common\models\Gift;
use yii\base\Model;

class Step3 extends Model {

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
			['to', 'string', 'length' => 12],
		];
	}

	/**
	 * @return bool
	 */
	public function addPhoneTo () {
		if ($this->validate()) {
			$gift = Gift::findOne(['id' => intval($this->id)]);
			$gift->setAttributes($this->getAttributes());
			$gift->sendGiftResult();

			if($gift->success && $gift->send_success) {
				$gift->save();
				return true;
			}
		}
		return false;
	}
}