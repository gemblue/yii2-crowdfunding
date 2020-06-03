<?php

/**
 * Dashboard
 *  
 * @author Gemblue
 */

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

class DashboardController extends Controller
{
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