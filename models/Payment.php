<?php

/**
 * Payment
 * 
 * Payment model
 * 
 * @author Gemblue
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Payment extends ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Join with user ..
     * 
     * @return Object
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
    
    /**
     * Join with campaign ..
     * 
     * @return Object
     */
    public function getCampaign()
    {
        return $this->hasOne(Campaign::className(), ['id' => 'campaign_id']);
    }

    /**
     * Join with bank ..
     * 
     * @return Object
     */
    public function getBank()
    {
        return $this->hasOne(Bank::className(), ['id' => 'source']);
    }
}