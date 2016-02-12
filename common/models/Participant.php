<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "participant".
 *
 * @property integer $id
 * @property string $date
 * @property string $name
 * @property string $phone
 * @property integer $activity
 * @property string $text
 * @property integer $winner
 *
 * @property Activity $activity0
 */
class Participant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'participant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['name', 'phone', 'activity', 'text'], 'required'],
            [['activity', 'winner'], 'integer'],
            [['text'], 'string', 'max' => 200],
            ['name', 'string', 'max' => 255],
            ['phone', 'string', 'length' => 12]
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
            'name' => 'Name',
            'phone' => 'Phone',
            'activity' => 'Activity',
            'text' => 'Text',
            'winner' => 'Winner',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity0()
    {
        return $this->hasOne(Activity::className(), ['id' => 'activity']);
    }
}
