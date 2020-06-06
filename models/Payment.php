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

class Payment extends ActiveRecord
{
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
}