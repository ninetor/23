<?php
/**
 * Created by PhpStorm.
 * User: karpovi4
 * Date: 11.02.16
 * Time: 20:25
 */

namespace frontend\models;


use common\models\Participant;
use yii\base\Model;

class TankForm extends Model {

	public $activity;
	public $name;
	public $phone;
	public $text;

	public function rules()
	{
		return [
			[['activity', 'name', 'text', 'phone'], 'required'],

			['activity', 'integer'],

			[['text', 'name'], 'string'],

			['phone', 'string', 'length' => 12]
		];
	}

	/**
	 * @return bool
	 */
	public function addParticipant() {
		if ($this->validate()) {
			$participant = new Participant();
			$participant->setAttributes($this->getAttributes());

			if ($participant->save())
				return true;
		}
		return false;
	}
}