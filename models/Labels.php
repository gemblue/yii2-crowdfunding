<?php

/**
 * Labels.
 * 
 * Label model.
 * 
 * @author Gemblue
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Labels extends ActiveRecord
{
    /**
     * Define table name
     * 
     * @return string
     */
    public static function tableName()
    {
        return 'labels';
    }
    
    /**
     * Define behaviours
     * 
     * @return array
     */
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
}