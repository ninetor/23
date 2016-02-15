<?php

namespace common\models;

use frontend\components\Soap;
use Yii;

/**
 * This is the model class for table "gift".
 *
 * @property integer $id
 * @property string $date
 * @property string $from
 * @property string $to
 * @property string $gift_code
 */
class Gift extends \yii\db\ActiveRecord
{

	const REQUEST_METHOD_CODE = 'MTS_SendCode';
	const REQUEST_METHOD_GIFT = 'MTS_CreateOrder';
	const SOURCEID = 185;
	const SOURCE_ID = 185;
	const ACTION = 1;
	const PRODUCT = 200;

	public $send_success = false;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gift';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['from', 'gift_code', 'validation_code'], 'required'],
            [['gift_code', 'order_id'], 'string', 'max' => 255],
            [['from', 'to'], 'string', 'length' => 12],
            ['validation_code', 'string', 'length' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'from' => 'From',
            'to' => 'To',
            'gift_code' => 'Gift Code',
	        'order_id' => 'Order id'
        ];
    }

	/**
	 * @return mixed
	 */
	public function sendValidationCode() {
		$soapConfig = [
			['Name' => 'sourceid', 'Value' => self::SOURCEID],
			['Name' => 'customer', 'Value' => $this->from],
			['Name' => 'code', 'Value' => $this->validation_code],
		];
		return (new Soap)->sendRequest(self::REQUEST_METHOD_CODE, $soapConfig);
	}


	/**
	 * @return bool
	 */
	public function sendGiftResult() {
		if (!$this->order_id) {
			$response = $this->_sendGiftRequest();
			if (is_array($response) && count($response)) {
				foreach($response as $resp_msg) {
					switch ($resp_msg->Name) {
						case 'order_id':
							$order = $resp_msg->Value;
							break;
						case 'result_code':
							$this->send_success = (int)$resp_msg->Value == 1  ? true : false;
							break;
					}
				}

				$this->order_id = $order;
			}

		}
		return false;
	}

	private function _sendGiftRequest() {
		$add_param = 'MSISDN='.$this->to.';GIFT_ID='.$this->gift_code;

		$soapConfig = [
			['Name' => 'ident', 'Value' => $this->from],
			['Name' => 'product', 'Value' => self::PRODUCT],
			['Name' => 'action', 'Value' => self::ACTION],
			['Name' => 'source_id', 'Value' => self::SOURCE_ID],
			['Name' => 'add_param', 'Value' => $add_param],
		];
		return (new Soap)->sendRequest(self::REQUEST_METHOD_GIFT, $soapConfig);
	}

}
