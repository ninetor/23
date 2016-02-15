<?php
/**
 * Created by PhpStorm.
 * User: karpovi4
 * Date: 12.02.16
 * Time: 17:20
 */

namespace frontend\models\gift;


use common\models\Gift;
use yii\base\Model;

class Step2 extends Model  {

	public $id;
	public $validation_code;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['id', 'required'],
			['id', 'integer'],
			['validation_code', 'string'],
			['validation_code', 'required', 'message' => 'Введите код подтверждения'],

		];
	}

	/**
	 * @return bool
	 */
	public function checkIdentity () {
		if ($this->validate()) {
			$gift = Gift::findOne(['id' => intval($this->id)]);

			if($this->validation_code == $gift->validation_code) {
				$gift->success = 1;
				$gift->save();

				return true;
			} else {
				$gift->addError('validation_code', 'Код подтверждения неверен');
				return $gift->getErrors();
			}
		} else
			return $this->getErrors();
	}
}