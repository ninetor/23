<?php

namespace frontend\models\gift;

use Yii;
use common\models\Gift;
use yii\base\Model;

class Step1 extends Model {

	public $gift_code;
	public $from;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['gift_code', 'required'],
			['from', 'required', 'message' => 'Введите номер телефона'],
			['gift_code', 'integer'],
			['from', 'string', 'length' => 12],
		];
	}

	/**
	 * @return bool|string
	 */
	public function addGift () {
		if ($this->validate()) {

			$gift = new Gift();
			$gift->setAttributes($this->getAttributes());
			$gift->validation_code = $this->_setValidationCode();

			if($gift->save()) {
				$gift->sendValidationCode();
				return $gift->id;
			}
		} else {
			return $this->getErrors();
		}

	}

	/**
	 * @return string
	 */
	private function _setValidationCode() {
		return Yii::$app->security->generateRandomString(6);
	}
}