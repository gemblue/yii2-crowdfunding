<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;

/**
 * Module
 * 
 * Module admin
 * 
 * @author Gemblue
 */

class Module extends \yii\base\Module
{
    /**
     * Define behaviour
     */
    public function behaviors()
    { 
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback' => function () {
                    throw new \yii\web\HttpException(401, 'You have no privilege to access this page.');
                },
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';
    
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }
}
