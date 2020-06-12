<?php

/**
 * Dashboard
 *  
 * @author Gemblue
 */

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class DashboardController extends Controller
{
    /**
     * Define behavior.
     * 
     * @return array
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['indexDashboard'],
                    ]
                ],
                'denyCallback' => function () {
                    throw new \yii\web\HttpException(401, 'You have no privilege to access this page.');
                }
            ],
        ];
    }
    
    /**
     * Show index.
     * 
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}