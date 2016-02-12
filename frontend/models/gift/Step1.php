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
			// name, email, subject and body are required
			[['gift_code', 'from'], 'required'],
			// email has to be a valid email address
			['gift_code', 'integer'],
			// verifyCode needs to be entered correctly
			['from', 'string', 'max' => 20],
		];
	}

	public function addGift () {
		if ($this->validate()) {

			$gift = new Gift();
			$gift->setAttributes($this->getAttributes());

			if($gift->save())
				return Yii::$app->db->getLastInsertID() ;
		}
		return false;
	}
}