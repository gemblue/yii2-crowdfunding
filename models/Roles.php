<?php

namespace app\models;

use yii\db\ActiveRecord;

class Roles extends ActiveRecord
{
    /**
     * Define table
     */
    public static function tableName()
    {
        return 'auth_item';
    }
}