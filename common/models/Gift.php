<?php

namespace common\models;

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
            [['from', 'gift_code'], 'required'],
            [['from', 'to', 'gift_code'], 'string', 'max' => 255]
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
        ];
    }
}
