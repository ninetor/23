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
			['id', 'required'],
			['to', 'required', 'message' => 'Введите номер телефона'],
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
			} else {
				$gift->addError('to', 'Информация отправлена в SMS на ваш номер телефона');
				return $gift->getErrors();
			}
		} else
			return $this->getErrors();
	}
}