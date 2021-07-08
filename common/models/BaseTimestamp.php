<?php


namespace common\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class BaseTimestamp extends ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }
}